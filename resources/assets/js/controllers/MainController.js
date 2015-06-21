angular.module('falcon.controllers')
    .controller('MainController', ['$scope', '$state', '$location', '$localStorage', 'Auth',
        function($scope, $state, $location, $localStorage, Auth) {
            $scope.rdata = $state.data;
        }]);

// E = $scope?