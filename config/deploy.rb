set :application, 'ciberseguridad'
set :repo_url, 'git@github.com:diegodorado/ciberseguridad.git'

# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

set :scm, :git

# set :format, :pretty
# set :log_level, :debug
# set :pty, true

# set :default_env, { path: "/opt/ruby/bin:$PATH" }
set :keep_releases, 3

set :file_permissions_paths, [
  'themes',
  'storage',
]

set :linked_dirs, %w{
  vendor
  storage
}

set :linked_files, %w{
  .env
}

set :storage_paths, %w{
  storage/app
  storage/cms/cache
  storage/cms/combiner
  storage/cms/twig
  storage/framework/cache
  storage/framework/sessions
  storage/framework/views
  storage/logs
  storage/temp
}

set :file_permissions_paths, fetch(:file_permissions_paths) + fetch(:storage_paths)

set :laravel_artisan_flags, "--env=production --no-interaction"

namespace :deploy do

  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :touch, release_path.join('tmp/restart.txt')
    end
  end

  after :finishing, 'deploy:cleanup'


  namespace :set_permissions do
    desc "** overriden ** Set user/group permissions on configured paths with setfacl"
    Rake::Task["deploy:set_permissions:acl"].clear_actions
    task :acl => [:check] do
      #invoke 'deploy:set_permissions:chmod'
      next unless any? :file_permissions_paths
      on roles fetch(:file_permissions_roles) do |host|
        execute :chmod, "-R", fetch(:file_permissions_chmod_mode), *absolute_writable_paths
      end
    end
  end


end


namespace :october do

  desc "Check setup"
  task :check do
    on roles(:all) do |host|

      fetch(:storage_paths).each do |p|
        execute "mkdir -p #{shared_path.join(p)}"
      end

      invoke 'composer:update'

    end
  end


  desc "Execute php artisan october:down"
  task :down do
    on roles fetch(:laravel_roles) do
      within release_path do
        execute :php, :artisan, "october:down", "--force" , fetch(:laravel_artisan_flags)
      end
    end
  end

  desc "Execute php artisan october:up"
  task :up do
    invoke "laravel:artisan", "october:up"
  end


end

namespace :composer do
  desc 'Composer update'
  task :update do
    on roles(:app) do
      execute "cd #{release_path}/ && composer update"
    end
  end
end
