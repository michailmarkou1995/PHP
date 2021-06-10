var userBookingsApp = angular.module('crudUserBookingsApp', [
    'datatables',
]);
userBookingsApp.controller('crudUserBookingsController', ['$scope', '$q', 'DTOptionsBuilder', 'DTColumnBuilder', 'DTColumnDefBuilder', '$http', function ($scope, $q, DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder, $http) {
    $scope.colortheme = '#18191A';
    $scope.dd = "bbbbbb";

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
        }).catch(function () {
            alert('ll');
        })
    }

}]);