'use strict';

angular.module('Home').controller('home', function($scope, $http) {
  
  $scope.names = [ ];
  
	$http.get('../server/models/model.php').success(function(data) {
    $scope.names = eval(data);
    console.log(data)
  })
  .error(function(data) {
    console.log('Error: ' + data);
	});
  
  $scope.addNom = function() {
    $http.post('../server/model.php', { op: 'append', nom: $scope.nom, telefon: $scope.telefon } ).success(function(data) {
      $scope.names = eval(data);
      console.log(data)
    })
    .error(function(data) {
      console.log('Error: ' + data);
    });
    
    $scope.nom="";
    $scope.telefon="";
  }
  
  $scope.delNom = function( nom ) {
    if ( confirm("Seguro?") ) {
      $http.post('../server/model.php', { op: 'delete', nom: nom } ).success(function(data) {
        $scope.names = eval(data);
        console.log(data)
      })
      .error(function(data) {
        console.log('Error: ' + data);
      });
    }
  }
 
})
.config(function ($routeProvider) {
  $routeProvider
    .when('/home',{
      templateUrl: 'scripts/home/views/home.html',
      controller: 'home'
    });
});