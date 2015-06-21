angular.module('falcon.controllers')
    .controller('HomeController', ['$rootScope', '$scope', '$state', '$location', '$localStorage', 'Auth',
        function($rootScope, $scope, $state, $location, $localStorage, Auth) {
            $rootScope.rdata = $state.data;

            function authSuccess(res) {
                //Auth.isAuthed = true;
                $localStorage.token = res.token;
                $location.path('/');
            }

            $scope.login = function() {
                var formData = {
                    _token: $rootScope.csrf_token,
                    email: $scope.email,
                    password: $scope.password
                };

                Auth.login(formData, authSuccess, function() {
                    $rootScope.error = 'Login failed.';
                });
            };

            $scope.register = function() {
                var formData = {
                    name: $scope.name,
                    email: $scope.email,
                    password: $scope.password
                };

                Auth.register(formData, authSuccess, function(res) {
                    $rootScope.error = res.error || 'Registration failed, please try again later.';
                });
            };

            $scope.logout = function() {
                Auth.logout(function() {
                    $location.path('/');
                });
            };

            $scope.token = $localStorage.token;
            $scope.tokenClaims = Auth.getTokenClaims();
        }]);