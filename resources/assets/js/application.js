angular.module('falcon', [
    'ngStorage',
    'ui.router',
    'falcon.controllers',
    'falcon.services'
])
.constant('url', {
    base: 'https://falconfrag.com',
    api: 'https://falconfrag.com/api/v1'
})
.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', '$httpProvider', function($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider) {
    // Known routes when missing /
    $urlRouterProvider.when('', '/');

    // Any unknown URLs (404)
    $urlRouterProvider.otherwise(function($injector, $location) {
        var state = $injector.get('$state');
        state.go('404');
        return $location.path();
    });

    $stateProvider
        .state('root', {
            views: {
                app: {
                    templateUrl: '/templates/layout/index.html'
                }
            }
        })
        .state('static:home', {
            url: '/',
            parent: 'root',
            views: {
                'app:view': {
                    controller: 'HomeController',
                    controllerAs: '$vm',
                    templateUrl: '/templates/views/home/index.html'
                }
            },
            data: {
                title: 'Falcon Frag Networks - Coming Soon',
                description: 'Whether you need a game server, dedicated server, voice server or other hosting service, we got you covered. We offer affordable and reliable hosting services on premium networks. Check us out today!'
            }
        })
        .state('users:login', {
            url: '/login',
            parent: 'root',
            views: {
                'app:view': {
                    controller: 'UserLoginController',
                    controllerAs: '$vm',
                    templateUrl: '/templates/views/users/login.html'
                }
            },
            data: {
                title: 'Falcon Frag - Login',
                description: 'Sign in to access your Falcon Frag account.'
            }
        })
        .state('404', {
            controller: '404Controller',
            templateUrl: '/templates/404.html'
        });

    // "Pretty" routes
    $locationProvider.html5Mode(true);

    // Route requires login
    $httpProvider.interceptors.push('TokenInterceptor');
}]);