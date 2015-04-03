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


namespace :composer do
  desc 'Composer update'
  task :update do
    on roles(:app) do
      execute "cd #{release_path}/ && composer update"
    end
  end
end
