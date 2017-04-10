// JAVASCRIPTS FOR ADDRESS BOOK

'use-strict';

var app = angular.module("addressBookApp",[]);

app.controller("contactsController", function ($scope){
$scope.collection = [
  {firstName: "Paul", lastName: "Jones", number: "6468897228", email: "paul.jones@gmail.com"},
  {firstName: "Jane", lastName: "Watson", number: "2035187984", email: "jane.watson@yahoo.com"},
  {firstName: "Greg", lastName: "McCaine", number: "2126039954", email: "greg-mccaine@aol.com"},
  {firstName: "Lisa", lastName: "Prescott", number: "9735548128", email: "lisaprescott@msn.com"}
];

// PUSH TYPED DATA into TABLE and CLEAR INPUT FEILDS

  $scope.addEntry = function () {
     $scope.collection.push($scope.newData);
     $scope.newData = '';
  };

});

