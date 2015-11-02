'use strict';

var app = angular.module('myApp',['ngMessages','ngResource']);

app.controller('AppCtrl', function($scope){    
$scope.password = '';
});
 
app.directive("passwordStrength", function(){
    return {        
        restrict: 'A',
        link: function(scope, element, attrs){                    
            scope.$watch(attrs.passwordStrength, function(value) {
                console.log(value);
                if(angular.isDefined(value)){
                    if (value.length > 5) {
                        scope.strength = 'strong';
                    } else if (value.length > 3) {
                        scope.strength = 'medium';
                    } else {
                        scope.strength = 'weak';
                    }
                }
            });
        }
    };
});