angular.module('myApp', ['ngRoute'])
	.config( ['$routeProvider', function($routeProvider) {
		$routeProvider
		.when('/first', {
				template: 'Hello bitch welcome'
			})
			.when('/second', {
				template: 'Welcome again'
			})
			.otherwise({
				redirectTo: '/'
			});
	}]);


	