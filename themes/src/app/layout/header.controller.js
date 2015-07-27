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
