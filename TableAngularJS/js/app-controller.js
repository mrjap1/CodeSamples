myApp=angular.module('myApp', []);
myApp.controller('myController', function($scope, $http){
    $http.get('json/appData.json').success(function(response){
        $scope.appData = response;
    });
});