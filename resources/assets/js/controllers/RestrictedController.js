angular.module('falcon.controllers')
    .controller('RestrictedController', ['$rootScope', '$scope', 'Data', function($rootScope, $scope, Data) {
        Data.getRestrictedData(function(res) {
            $scope.data = res.data;
        }, function() {
            $rootScope.error = 'Failed to retrieve restricted content.';
        });

        Data.getApiData(function(res) {
            $scope.api = res.data;
        }, function() {
            $rootScope.error = 'Failed to retrieve protected API content.';
        });
    }]);