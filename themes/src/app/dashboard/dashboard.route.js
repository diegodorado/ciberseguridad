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
