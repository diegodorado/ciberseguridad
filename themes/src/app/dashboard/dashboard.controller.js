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
