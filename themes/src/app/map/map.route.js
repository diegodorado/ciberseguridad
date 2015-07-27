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
