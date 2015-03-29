set :stage, :staging

set :deploy_to, '/home/deploy/staging/'

# Simple Role Syntax
# ==================
# Supports bulk-adding hosts to roles, the primary
# server in each group is considered to be the first
# unless any hosts have the primary property set.
role :app, %w{deploy@185.67.0.172}
role :web, %w{deploy@185.67.0.172}
role :db,  %w{deploy@185.67.0.172}


set :laravel_roles, :all
set :laravel_artisan_flags, "--env=production"
set :laravel_server_user, "www-data"

# Extended Server Syntax
# ======================
# This can be used to drop a more detailed server
# definition into the server list. The second argument
# something that quacks like a hash can be used to set
# extended properties on the server.
server '185.67.0.172', user: 'deploy', roles: %w{web app}, release_roles: %w{web app}, my_property: :my_value
