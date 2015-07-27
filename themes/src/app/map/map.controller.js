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
