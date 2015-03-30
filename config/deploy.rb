set :application, 'ciberseguridad'
set :repo_url, 'git@github.com:diegodorado/ciberseguridad.git'

# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

set :scm, :git

# set :format, :pretty
# set :log_level, :debug
# set :pty, true

# set :linked_files, %w{config/database.yml}
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# set :default_env, { path: "/opt/ruby/bin:$PATH" }
set :keep_releases, 3

set :file_permissions_paths, [
  'storage/app',
  'storage/cms',
  'storage/logs',
  'storage/framework',
  'storage/temp',
]

namespace :deploy do

  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :touch, release_path.join('tmp/restart.txt')
    end
  end

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

  after :finishing, 'deploy:cleanup'


  namespace :set_permissions do
    desc "** overriden ** Set user/group permissions on configured paths with setfacl"
    Rake::Task["deploy:set_permissions:acl"].clear_actions
    task :acl => [:check] do
      invoke 'deploy:set_permissions:chmod'
    end
  end

end

set :linked_dirs, %w{bin log tmp/backup tmp/pids tmp/cache tmp/sockets vendor/bundle}
set :linked_dirs, fetch(:linked_dirs) + %w{public/system}

namespace :config do

  desc 'Upload .env'
  task :upload do
    on roles(:app) do
      file = File.open('/config/database.yml')
      upload! file, '/opt/my_project/shared/database.yml'
    end
  end
end



namespace :composer do
    before 'install', 'composer_update'

    desc 'Composer update'
    task :composer_update do
        on roles(:app) do
            execute "cd #{release_path}/ && composer update"
        end
    end
end










namespace :deploy do
  desc 'Updates shared/config/*.yml files with the proper ones for environment'
  task :upload_shared_config_files do
    config_files = {}

    run_locally do
      # Order matters!
      local_config_directories = [
        "config/deploy/config/#{fetch(:stage)}",
        "config/deploy/config"
      ]

      # Environment specific files first
      local_config_directories.each do |directory|
        Dir.chdir(directory) do
          Dir.glob("*.yml") do |file_name|
            # Skip this file if we've already uploaded a env. specific one
            next if config_files.keys.include? file_name

            cksum = capture "cksum", File.join(Dir.pwd, file_name)
            config_files[file_name] = cksum
          end
        end
      end
    end

    on roles(:all) do
      config_path = File.join shared_path, "config"
      execute "mkdir -p #{config_path}"

      config_files.each do |file_name, local_cksum|
        remote_file_name = "#{config_path}/#{file_name}"

        # Get the
        lsum, lsize, lpath = local_cksum.split

        if test("[ -f #{remote_file_name} ]")
          remote_cksum = capture "cksum", remote_file_name
          rsum, rsize, rpath = remote_cksum.split

          if lsum != rsum
            upload! lpath, remote_file_name
            info "Replaced #{file_name} -> #{remote_file_name}"
          end
        else
          upload! lpath, remote_file_name
          info "Upload new #{file_name} -> #{remote_file_name}"
        end
      end
    end
  end

  before :check, :upload_shared_config_files
end
