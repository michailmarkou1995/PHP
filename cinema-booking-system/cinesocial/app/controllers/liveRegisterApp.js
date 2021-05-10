var registerUpdateView = angular.module('liveRegisterApp', ['ngSanitize']);
registerUpdateView.controller('liveRegisterController',['$scope', '$http',function($scope, $http){
	$scope.searchAccount = function (id){
     //alert(id);
     $http({
            method:"POST",
            url:"../models/insert_bookings.php",
            data:{'search':id, 'action':'search_account'}
            }).then(function(response){
				console.log(response.data);
                $scope.accountText = response.data;
                console.log(response.data);
                if ($scope.accountText == 'Exists'){
                    $scope.allowsub=true;
                } else  $scope.allowsub=false;
            }).catch(function(){alert('Error encoutnered');})
 }
}]);