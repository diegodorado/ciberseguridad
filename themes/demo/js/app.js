(function() {

    'use strict';

    angular.module('app', [
        /* Shared modules */
        'app.core',

        /* Feature areas */
        'app.dashboard',
        'app.map',
        'app.layout'
    ]);

})();

(function() {
    'use strict';

    angular
        .module('app.core', [
            /* Angular modules */
            'ngAnimate',
            'ngSanitize',
            /* Cross-app modules */
            'blocks.exception',
            'blocks.logger',
            'blocks.router',
            /* 3rd-party modules */
            'ui.router'
        ]);

})();

(function() {
    'use strict';

    angular.module('app.dashboard', [
        'app.core'
    ]);

})();

(function() {
    'use strict';

    angular.module('app.layout', ['app.core']);
})();

(function() {
    'use strict';

    angular.module('app.map', [
        'app.core'
    ]);

})();

(function() {
    'use strict';

    angular.module('blocks.exception', ['blocks.logger']);
})();

(function() {
    'use strict';

    angular.module('blocks.logger', []);
})();

(function() {
    'use strict';

    angular.module('blocks.router', [
        'ui.router',
        'blocks.logger'
    ]);
})();

/*
 * Application
 */

(function($) {
    'use strict';

    $(document).tooltip({
        selector: '[data-toggle=tooltip]'
    });

}(jQuery));

(function() {
    'use strict';

    var core = angular.module('app.core');

    core.run(
      ['$rootScope', '$state', '$stateParams',
        function ($rootScope,   $state,   $stateParams) {
            // It's very handy to add references to $state and $stateParams to the $rootScope
            // so that you can access them from any scope within your applications.For example,
            // <li ng-class="{ active: $state.includes('contacts.list') }"> will set the <li>
            // to active whenever 'contacts.list' or one of its decendents is active.
            $rootScope.$state = $state;
            $rootScope.$stateParams = $stateParams;
        }
      ]
    );

    var config = {
        appErrorPrefix: '[GulpPatterns Error] ', //Configure the exceptionHandler decorator
        appTitle: 'Gulp Patterns Demo',
        imageBasePath: '/images/photos/',
        unknownPersonImageSource: 'unknown_person.jpg'
    };

    core.value('config', config);

    core.config(configure);

    configure.$inject = ['$compileProvider', '$logProvider',
                         'routerHelperProvider', 'exceptionHandlerProvider'];
    /* @ngInject */
    function configure ($compileProvider, $logProvider,
                         routerHelperProvider, exceptionHandlerProvider) {
        $compileProvider.debugInfoEnabled(false);

        // turn debugging off/on (no info or warn)
        if ($logProvider.debugEnabled) {
            $logProvider.debugEnabled(true);
        }
        exceptionHandlerProvider.configure(config.appErrorPrefix);
        configureStateHelper();

        ////////////////

        function configureStateHelper() {
            var resolveAlways = {
                ready: ready
            };

            ready.$inject = ['dataservice'];
            /* @ngInject */
            function ready(dataservice) {
                return dataservice.ready();
            }

            routerHelperProvider.configure({
                docTitle: 'CiberSeguridad: ',
                resolveAlways: resolveAlways
            });
        }
    }
})();

(function() {
    'use strict';

    angular
        .module('app.core')
        .factory('dataservice', dataservice);

    dataservice.$inject = ['$http', '$location', '$q', 'exception', 'logger'];
    /* @ngInject */
    function dataservice($http, $location, $q, exception, logger) {
        var readyPromise;

        var service = {
            getData: getData,
            ready: ready
        };

        return service;

        function getData() {
            return $http.get('/api/all')
                .then(getDataComplete)
                .catch(function(message) {
                    exception.catcher('XHR Failed for getCustomers')(message);
                    $location.url('/');
                });

            function getDataComplete(data, status, headers, config) {
                return data.data;
            }
        }

        function getReady() {
            if (!readyPromise) {
                // Apps often pre-fetch session data ("prime the app")
                // before showing the first view.
                // This app doesn't need priming but we add a
                // no-op implementation to show how it would work.
                logger.info('Primed the app data');
                readyPromise = $q.when(service);
            }
            return readyPromise;
        }

        function ready(promisesArray) {
            return getReady()
                .then(function() {
                    return promisesArray ? $q.all(promisesArray) : readyPromise;
                })
                .catch(exception.catcher('"ready" function failed'));
        }
    }
})();

(function() {
    'use strict';

    angular
        .module('app.dashboard')
        .controller('Dashboard', Dashboard);

    Dashboard.$inject = ['$state', 'dataservice', 'logger', '$rootScope'];
    function Dashboard($state, dataservice, logger, $rootScope) {
        var vm = this;
        vm.countries = [];
        vm.dimensions = [];
        vm.title = 'Dashboard';

        activate();

        function activate() {
            return getData().then(function() {
                logger.info('Activated Dashboard');
            });
        }

        function getData() {
            return dataservice.getData().then(function(data) {
                vm.countries = data.countries;
                vm.dimensions = data.dimensions;
                $rootScope.locale = data.locale;
                return vm.allData;
            });
        }

    }
})();

(function() {
    'use strict';

    angular
        .module('app.dashboard')
        .run(appRun);

    appRun.$inject = ['routerHelper'];
    /* @ngInject */
    function appRun(routerHelper) {
        routerHelper.configureStates(getStates(), '/');
    }

    function getStates() {
        return [
            {
                state: 'dashboard',
                config: {
                    url: '/',
                    templateUrl: 'app/dashboard/dashboard.html',
                    controller: 'Dashboard',
                    controllerAs: 'vm',
                    title: 'Home',
                    settings: {
                        nav: 1,
                        content: '<i class="fa fa-dashboard"></i> Dashboard'
                    }
                }
            },
            {
                state: 'about',
                config: {
                    url: '/about-it',
                    template: '<p class="lead">Welcome to the UI-Router Demo</p>' +
                                '<p>Use the menu above to navigate. ' +
                                'Pay attention to the  values below.</p>' +
                                '<p>Click these links—<a href="#/c?id=1">Alice</a> or ' +
                                '<a href="#/user/42">Bob</a>—to see a url redirect in action.</p>',
                    title: 'Customer Detail'
                }
            },
            {
                state: 'demo',
                config: {
                    url: '/about-demo',
                    templateUrl: '/demo.html',
                    title: 'Demo'
                }
            }
        ];
    }
})();

(function() {
    'use strict';

    angular
        .module('app.layout')
        .controller('Header', Header);

    Header.$inject = ['$state', 'routerHelper', '$http', '$window'];
    /* @ngInject */
    function Header($state, routerHelpe, $http, $window) {
        var vm = this;
        vm.changeLocale = changeLocale;
        function changeLocale(locale) {
            $http.get('/api/locale/' + locale).success(successCallback).error(errorCallback);
        }
        function successCallback(arg) {
            $window.location.reload();
        }
        function errorCallback(arg) {
            console.log('error setting locale');
        }

    }

})();

(function() {
    'use strict';

    angular
        .module('app.layout')
        .controller('Shell', Shell);

    Shell.$inject = ['$timeout', 'config', 'logger'];
    /* @ngInject */
    function Shell($timeout, config, logger) {
        var vm = this;

        vm.title = config.appTitle;
        vm.busyMessage = 'Please wait ...';
        vm.isBusy = true;
        vm.showSplash = true;
        vm.tagline = {
            text: 'Created by John Papa',
            link: 'http://twitter.com/john_papa'
        };

        activate();

        function activate() {
            logger.success(config.appTitle + ' loaded!', null);
            hideSplash();
        }

        function hideSplash() {
            //Force a 1 second delay so we can see the splash.
            $timeout(function() {
                vm.showSplash = false;
            }, 1000);
        }
    }
})();

(function() {
    'use strict';

    angular
        .module('app.map')
        .controller('Map', Map);

    Map.$inject = ['$state', 'dataservice', 'logger'];
    function Map($state, dataservice, logger) {
        var vm = this;
        vm.title = 'Map';
    }
})();

(function() {
    'use strict';

    angular
        .module('app.map')
        .run(appRun);

    appRun.$inject = ['routerHelper'];
    /* @ngInject */
    function appRun(routerHelper) {
        routerHelper.configureStates(getStates());
    }

    function getStates() {
        return [
            {
                state: 'map',
                config: {
                    url: '/about-map',
                    templateUrl: 'app/map/map.html',
                    title: 'Map'
                }
            }
        ];
    }
})();

// Include in index.html so that app level exceptions are handled.
// Exclude from testRunner.html which should run exactly what it wants to run
(function() {
    'use strict';

    angular
        .module('blocks.exception')
        .provider('exceptionHandler', exceptionHandlerProvider)
        .config(config);

    /**
     * Must configure the exception handling
     * @return {[type]}
     */
    function exceptionHandlerProvider() {
        /* jshint validthis:true */
        this.config = {
            appErrorPrefix: undefined
        };

        this.configure = function (appErrorPrefix) {
            this.config.appErrorPrefix = appErrorPrefix;
        };

        this.$get = function() {
            return {config: this.config};
        };
    }

    config.$inject = ['$provide'];
    /**
     * Configure by setting an optional string value for appErrorPrefix.
     * Accessible via config.appErrorPrefix (via config value).
     * @param  {[type]} $provide
     * @return {[type]}
     * @ngInject
     */
    function config($provide) {
        $provide.decorator('$exceptionHandler', extendExceptionHandler);
    }

    /**
     * Extend the $exceptionHandler service to also display a toast.
     * @param  {Object} $delegate
     * @param  {Object} exceptionHandler
     * @param  {Object} logger
     * @return {Function} the decorated $exceptionHandler service
     */
    extendExceptionHandler.$inject = ['$delegate', 'exceptionHandler', 'logger'];
    /* @ngInject */
    function extendExceptionHandler($delegate, exceptionHandler, logger) {
        return function(exception, cause) {
            var appErrorPrefix = exceptionHandler.config.appErrorPrefix || '';
            var errorData = {exception: exception, cause: cause};
            exception.message = appErrorPrefix + exception.message;
            $delegate(exception, cause);
            /**
             * Could add the error to a service's collection,
             * add errors to $rootScope, log errors to remote web server,
             * or log locally. Or throw hard. It is entirely up to you.
             * throw exception;
             *
             * @example
             *     throw { message: 'error message we added' };
             */
            logger.error(exception.message, errorData);
        };
    }
})();

(function() {
    'use strict';

    angular
        .module('blocks.exception')
        .factory('exception', exception);

    exception.$inject = ['logger'];
    /* @ngInject */
    function exception(logger) {
        var service = {
            catcher: catcher
        };
        return service;

        function catcher(message) {
            return function(reason) {
                logger.error(message, reason);
            };
        }
    }
})();

(function() {
    'use strict';

    angular
        .module('blocks.logger')
        .factory('logger', logger);

    logger.$inject = ['$log'];
    /* @ngInject */
    function logger($log) {
        var service = {
            error   : error,
            info    : info,
            success : success,
            warning : warning,

            // straight to console; bypass toastr
            log     : $log.log
        };

        return service;
        /////////////////////

        function error(message, data, title) {
            $log.error('Error: ' + message, data);
        }

        function info(message, data, title) {
            $log.info('Info: ' + message, data);
        }

        function success(message, data, title) {
            $log.info('Success: ' + message, data);
        }

        function warning(message, data, title) {
            $log.warn('Warning: ' + message, data);
        }
    }
}());

/* Help configure the state-base ui.router */
(function() {
    'use strict';

    angular
        .module('blocks.router')
        .provider('routerHelper', routerHelperProvider);

    routerHelperProvider.$inject = ['$locationProvider', '$stateProvider', '$urlRouterProvider'];
    /* @ngInject */
    function routerHelperProvider($locationProvider, $stateProvider, $urlRouterProvider) {
        /* jshint validthis:true */
        var config = {
            docTitle: undefined,
            resolveAlways: {}
        };

        $locationProvider.html5Mode(false);

        this.configure = function(cfg) {
            angular.extend(config, cfg);
        };

        this.$get = RouterHelper;
        RouterHelper.$inject = ['$location', '$rootScope', '$state', 'logger'];
        /* @ngInject */
        function RouterHelper($location, $rootScope, $state, logger) {
            var handlingStateChangeError = false;
            var hasOtherwise = false;
            var stateCounts = {
                errors: 0,
                changes: 0
            };

            var service = {
                configureStates: configureStates,
                getStates: getStates,
                stateCounts: stateCounts
            };

            init();

            return service;

            ///////////////

            function configureStates(states, otherwisePath) {
                states.forEach(function(state) {
                    state.config.resolve =
                        angular.extend(state.config.resolve || {}, config.resolveAlways);
                    $stateProvider.state(state.state, state.config);
                });
                if (otherwisePath && !hasOtherwise) {
                    hasOtherwise = true;
                    $urlRouterProvider.otherwise(otherwisePath);
                }
            }

            function handleRoutingErrors() {
                // Route cancellation:
                // On routing error, go to the dashboard.
                // Provide an exit clause if it tries to do it twice.
                $rootScope.$on('$stateChangeError',
                    function(event, toState, toParams, fromState, fromParams, error) {
                        if (handlingStateChangeError) {
                            return;
                        }
                        stateCounts.errors++;
                        handlingStateChangeError = true;
                        var msg = formatErrorMessage(error);
                        logger.warning(msg, [toState]);
                        $location.path('/');

                        function formatErrorMessage(error) {
                            var dest = (toState && (toState.title || toState.name ||
                                                    toState.loadedTemplateUrl)) || 'unknown target';
                            return 'Error routing to ' + dest + '. ' +
                                error.message || error.data || '' +
                                '. <br/>' + (error.statusText || '') +
                                ': ' + (error.status || '');
                        }
                    }
                );
            }

            function init() {
                handleRoutingErrors();
                updateDocTitle();
            }

            function getStates() { return $state.get(); }

            function updateDocTitle() {
                $rootScope.$on('$stateChangeSuccess',
                    function(event, toState, toParams, fromState, fromParams) {
                        stateCounts.changes++;
                        handlingStateChangeError = false;
                        var title = config.docTitle + ' ' + (toState.title || '');
                        $rootScope.title = title; // data bind to <title>
                    }
                );
            }
        }
    }
})();

angular.module("app.core").run(["$templateCache", function($templateCache) {$templateCache.put("app/dashboard/dashboard.html","<section><div class=container-fluid><div class=row><div class=\"col-xs-12 col-sm-6\"><div class=intro><p class=lead>Este sitio exhibe los resultados del estudio conjunto de la Organización de Estados Americanos (OEA) y el Banco Interamericano de Desarrollo (BID).</p><p class=lead>Permite conocer el <strong>grado de madurez</strong> de cada país en términos de ciberseguridad.</p></div><img src=/themes/demo/images/select.png width=100%></div><div class=\"hidden-xs col-sm-6\"><img src=/themes/demo/images/map.png width=100%></div></div><div class=\"row contries-header\"><div class=\"hidden-xs col-sm-offset-6 col-sm-6\"><img src=/themes/demo/images/compare.png></div></div><div class=row><div class=col-xs-12><div ng-repeat=\"dimension in vm.dimensions\" class=\"dimension dim-{{dimension.id}} clearfix\"><h3><span>{{ dimension.title }}</span></h3><div ng-repeat=\"factor in dimension.factors\" class=\"factor col-xs-12\"><div class=row><h4 class=\"col-xs-10 col-sm-6\">{{factor.title}}</h4></div><div ng-repeat=\"indicator in factor.indicators\" class=\"indicator row\"><h5 class=\"col-xs-10 col-sm-6\">{{indicator.title}}</h5><div class=\"col-xs-2 col-sm-1\"><div class=ml><i></i><i></i><i></i><i></i><i></i></div></div></div></div></div></div></div></div></section>");
$templateCache.put("app/layout/footer.html","<footer><div class=container-fluid><div class=row><div class=\"isologo col-sm-2\"><a href=#><span>Observatorio de la</span> <strong>Ciberseguridad</strong> <span>en latinoamérica y el Caribe</span></a></div><div class=col-sm-10><nav><a href=#>Acerca de</a> <a href=#>Contribuidores</a> <a href=#>Informacion Institucional</a> <a href=#>Contacto</a></nav><p class=copy>© COPYRIGHT 2015</p></div></div></div></footer>");
$templateCache.put("app/layout/header.html","<header ng-controller=\"Header as vm\"><div class=container-fluid><div class=row><h1 class=\"isologo col-xs-4\"><a href=#><span>Observatorio de la</span> <strong>Ciberseguridad</strong> <span>en latinoamérica y el Caribe</span></a></h1><div class=col-xs-8><div class=row><div class=\"col-xs-2 col-sm-offset-2 hidden-xs col-md-offset-4\"><nav class=lang><a ng-class=\"{active: locale==\'en\'}\" href=# ng-click=\"vm.changeLocale(\'en\')\">en</a> <a ng-class=\"{active: locale==\'es\'}\" href=# ng-click=\"vm.changeLocale(\'es\')\">es</a></nav></div><div class=\"col-sm-offset-0 col-sm-4 col-xs-offset-4 col-xs-4 col-md-3\"><a href=# class=oea><img src=/themes/demo/images/oea.png></a></div><div class=\"col-xs-4 col-sm-4 col-md-3\"><a href=# class=bid><img src=/themes/demo/images/bid.png></a></div></div></div></div></div></header>");
$templateCache.put("app/layout/help.html","<pre>\n  \n  $state = {{$state.current.name}}\n  $stateParams = {{$stateParams}}\n  $state full url = {{ $state.$current.url.source }}\n  \n</pre>");
$templateCache.put("app/layout/shell.html","<div ng-controller=\"Shell as vm\"><header class=clearfix><ht-top-nav title=vm.title tagline=vm.tagline></ht-top-nav></header><section id=content class=content><div ui-view></div><a ui-sref=state1>State 1</a> <a ui-sref=state2>State 2</a><div ui-view class=shuffle-animation></div></section></div>");
$templateCache.put("app/map/map.html","<section id=map-view><img src=http://homepages.rootsweb.ancestry.com/~genea/scmap.gif></section>");}]);