var scheduleUpdateView = angular.module('liveScheduleApp', ['datatables']);
scheduleUpdateView.controller('liveScheduleController', function ($scope, $http) {
    $scope.textt = "hi";
    $scope.isPressed = false;
    $scope.success = false;
    $scope.error = false;
    $scope.fetchData = function () {
        $http.get('../models/fetch_data_schedule_view.php').then(function (response) {
            $scope.namesDates = response.data;
        }), $http.get('../models/fetch_data_schedule_dates.php').then(function (response) {
            $scope.namesDate = response.data;
        });
    };
    $scope.showData = function (value) {
        $http({
            method: "POST",
            url: "../models/fetch_scheduleTable.php",
            data: { 'id': value, 'action': value }
        }).then(function (response) {

            $scope.infomov = response.data;
            $scope.edw = response.data.date_play;
            $scope.edw3 = response.data.date_play;
            $scope.times = response.data.times;
            $scope.edw2 = response.data.count;
            $scope.movie_play_fk = response.data.movie_play_fk;
            $scope.isPressed = response.data.press;
            $scope.namara = response.data.namara;
            $scope.success = true;
            $scope.error = false;
            $scope.successMessage = response.data.message;
            $scope.fetchData();
        });
    };

    $scope.checkcolor = function () {
        $http({
            method: "POST",
            url: "../models/fetch_data_user_colortheme.php",
            data: { 'user_profile': $scope.user_profile, 'action': 'getcolor' }
        }).then(function (response) {
            $scope.colortheme = response.data.toString();
            document.body.style.background = $scope.colortheme;
        })
    }

});