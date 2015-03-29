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

end

namespace :composer do
    before 'install', 'composer_update'

    desc 'Composer update'
    task :composer_update do
        on roles(:app) do
          within release_path do
              execute 'composer update'
          end
        end
    end
end