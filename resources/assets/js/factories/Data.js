angular.module('falcon.services')
    .factory('Data', ['$http', 'url', function($http, url) {
        return {
            getRestrictedData: function(success, error) {
                $http.get(url.base + '/dashboard').success(success).error(error)
            },

            getApiData: function(success, error) {
                $http.post(url.api + '/users').success(success).error(error)
            }
        };
    }]);