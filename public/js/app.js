(function () {
    'use strict';

    angular.module('app', [
        'ngStorage',
        'ngRoute',
        'angular-loading-bar'd
    ])
        .constant('urls', {
            BASE: 'https://falconfrag.com',
            BASE_API: 'https://falconfrag.com/api/v1'
        })
        .config(['$routeProvider', '$httpProvider', '$locationProvider', function ($routeProvider, $httpProvider, $locationProvider) {
            $routeProvider.
                when('/', {
                    templateUrl: 'tpl/home.html',
                    controller: 'HomeController'
                }).
                when('/login', {
                    templateUrl: 'tpl/login.html',
                    controller: 'HomeController'
                }).
                when('/signup', {
                    templateUrl: 'tpl/signup.html',
                    controller: 'HomeController'
                }).
                when('/restricted', {
                    templateUrl: 'tpl/restricted.html',
                    controller: 'RestrictedController'
                }).
                otherwise({
                    redirectTo: '/'
                });

            $httpProvider.interceptors.push(['$q', '$location', '$localStorage', function ($q, $location, $localStorage) {
                return {
                    'request': function (config) {
                        config.headers = config.headers || {};
                        if ($localStorage.token) {
                            config.headers.Authorization = 'Bearer ' + $localStorage.token;
                        }
                        return config;
                    },
                    'responseError': function (response) {
                        if (response.status === 401 || response.status === 403) {
                            delete $localStorage.token;
                            $location.path('/login');
                        }
                        return $q.reject(response);
                    }
                };
            }]);

            $locationProvider.html5Mode(true);
        }
        ]).run(function($rootScope, $location, $localStorage) {
            $rootScope.$on( "$routeChangeStart", function(event, next) {
                if ($localStorage.token == null) {
                    if ( next.templateUrl === "partials/restricted.html") {
                        $location.path("/login");
                    }
                }
            });
        });
})();