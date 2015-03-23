'use strict';

angular.module('People').controller('list', function($scope, $http, people_model) {
  
  $scope.names = [];
	people_model.get('habil');
 
})
.config(function ($routeProvider) {
  $routeProvider
    .when('/people',{
      templateUrl: 'scripts/people/views/list.html',
      controller: 'list'
    });
});