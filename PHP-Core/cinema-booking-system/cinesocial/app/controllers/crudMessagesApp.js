var crudMessagesApp = angular.module('crudMessagesApp', ['datatables']);
crudMessagesApp.controller('crudMessagesController', function($scope, $http) {
    $scope.success = false;
    $scope.error = false;
    $scope.fetchData = function() {
        $http.get('../../models/fetch_data_messages.php').then(function(response) {
            $scope.namesData = response.data;
        });
    };

    $scope.deleteData = function(msgID) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: "../../models/delete_messages.php",
                data: {
                    'id': msgID,
                    'action': 'Delete'
                }
            }).then(function(response) {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.fetchData();
            });
        }
    };
});