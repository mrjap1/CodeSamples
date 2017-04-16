'use strict';

// JAVASCRIPT FOR STAFF DIRECTORY Create Read Use Delete = CRUD

angular.module('Angular.StaffMember', [])
.controller('StaffCtrl', ['$scope', function ($scope) {
    //Array to hold our data
    $scope.model = [];
    //To show/hide the form
    $scope.showForm = false;
    //To be used for new entry or edit an existing entry in an array
    $scope.newData = {
        Staff: {}
    };

    //Method to show/hide th form
    $scope.IsShowForm = function (IsShow) {
        $scope.showForm = IsShow;
        $scope.newData.Staff = {};
    }

    //Method to add a new entry or edit an existing entry in an array
    $scope.add = function () {

        var index = $scope.model.indexOf($scope.newData.Staff);
        if (index == -1) {
            $scope.model.push($scope.newData.Staff);
        }
        else {
            $scope.model[index] = $scope.newData.Staff;
        }
        $scope.showForm = false;
        $scope.newData.Staff = {};
    }

    //Method to fill up the existing entry in the form to be edited
    $scope.edit = function (item) {
        $scope.newData.Staff = item;
        $scope.showForm = true;
    }

    //Method to delete an entry
    $scope.delete = function (item) {
        var index = $scope.model.indexOf(item);
        $scope.model.splice(index, 1);
    }
}]);
