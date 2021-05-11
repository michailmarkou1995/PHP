var scheduleApp = angular.module('crudScheduleApp', ['datatables']);
scheduleApp.controller('crudScheduleController', ['$scope', 'DTOptionsBuilder', '$http', function ($scope, DTOptionsBuilder, $http) {
    $scope.success = false;
    $scope.error = false;
    $scope.fetchData = function () {
        $scope.fetch_theatre =
            $http.get('../../models/fetch_data_schedule_theatre.php').then(function (response) {
                $scope.namesData = response.data;
            }), $scope.fetch_halls =
            $http.get('../../models/fetch_data_schedule_hallstable.php').then(function (response) {
                $scope.namesDatahalltable = response.data;
            }), $scope.fetch_schedule =
            $http.get('../../models/fetch_data_schedule_scheduletable.php').then(function (response) {
                $scope.namesDataSchedule = response.data;
            });
    };

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('stateSave', true)
        //.withPaginationType("simple_numbers")
        //.withDisplayLength(25)
        .withOption("retrieve", true)
        .withOption('order', [0, 'desc']);

    $scope.dtOptions1 = DTOptionsBuilder.newOptions()
        .withOption('stateSave', true)
        //.withPaginationType("simple_numbers")
        //.withDisplayLength(10)
        .withOption("retrieve", true)
        .withOption('order', [0, 'desc']);

    $scope.dtOptions2 = DTOptionsBuilder.newOptions()
        .withOption('stateSave', true)
        //.withPaginationType("simple_numbers")
        //.withDisplayLength(10)
        .withOption("retrieve", true)
        .withOption('order', [0, 'desc']);


    $scope.deleteData = function (id) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: "../../models/delete_schedule_theatre.php",
                data: {
                    'id': id,
                    'action': 'Delete'
                }
            }).then(function (response) {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.fetchData();
            });
        }
    };
    $scope.deleteData1 = function (id) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: "../../models/delete_schedule_halls.php",
                data: {
                    'id': id,
                    'action': 'Delete'
                }
            }).then(function (response) {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.fetchData();
            });
        }
    };
    $scope.deleteData2 = function (id, date_play_fk) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: "../../models/delete_schedule_Active_Movies.php",
                data: {
                    'date': date_play_fk,
                    'id': id,
                    'action': 'Delete'
                }
            }).then(function (response) {
                alert(response.data);
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.fetchData();
            });
        }
    };
}]);