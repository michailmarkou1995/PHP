var adminContactApp = angular.module('crudAdminContactApp', [
    'datatables',
]);
adminContactApp.controller('crudAdminContactController', ['$scope', '$q', 'DTOptionsBuilder', 'DTColumnBuilder', 'DTColumnDefBuilder', '$http', function ($scope, $q, DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder, $http) {

    $scope.changeTheme = function (colortheme) {
        if (colortheme == '#18191A') {
            $scope.colortheme = '#FFF';
            $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {
                    'user_profile': $scope.user_profile,
                    'color': $scope.colortheme,
                    'action': 'setcolor'
                }
            }).then(function (response) {
            })

        } else if (colortheme == '#FFF') {
            $scope.colortheme = '#18191A';
            $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {
                    'user_profile': $scope.user_profile,
                    'color': $scope.colortheme,
                    'action': 'setcolor'
                }
            }).then(function (response) {
            })
        }
    }

    $scope.checkcolor = function () {
        $http({
            method: "POST",
            url: "../models/fetch_data_user_colortheme.php",
            data: {
                'user_profile': $scope.user_profile,
                'action': 'getcolor'
            }
        }).then(function (response) {
            $scope.colortheme = response.data.toString();
            document.body.style.background = $scope.colortheme;
        })
    }

}]);