/*******************************************
******** /ANGULAR.js - CONTROLLER\ *********
*******************************************/


var app = angular.module('myApp', []);
app.controller('customersCtrl', function ($scope, $http) {
    $http.get("json/subscribersData.json") // this gets my json data file 
    .then(function (response) { $scope.names = response.data.records; }); // reads the scope and the json file name
});

var app = angular.module('myApp', []);
app.controller('customersCtrl', function ($scope, $http) {
    $http.get("json/subscribersData.json")
    .then(function (response) { $scope.names = response.data.records; });
});