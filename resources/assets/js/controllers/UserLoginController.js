angular.module('falcon.controllers')
    .controller('UserLoginController', ['$rootScope', '$scope', '$state', '$location', '$localStorage', 'Auth',
        function($rootScope, $scope, $state, $location, $localStorage, Auth) {
            $rootScope.rdata = $state.data;
        }]);