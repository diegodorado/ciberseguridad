var path = require('path');

module.exports = function() {

  var config = {
    rsyncOptions: {
      destination: '/home/deploy/staging/current/plugins/fourmi/cybersecurity',
      root: './cybersecurity',
      hostname: 'staging.cybersecurityinlac.com',//'185.67.0.172',
      username: 'deploy',
      incremental: true,
      progress: true,
      relative: true,
      recursive: true,
      clean: true,
      exclude: ['.DS_Store']
    }
  };

  return config;
};
