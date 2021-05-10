<?php
include("../../system/classes/Updatehandling.php") 
?>

<!DOCTYPE html>
<html lang="en">
<?php 
        include("../../system/fheaderinfo.php");
        include("../../system/header.php");
        require '../../system/meta.php';
        ?>

<header></header>

<body ng-app="liveScheduleApp" ng-controller="liveScheduleController" ng-init="fetchData()">

    <div class="schedule-section"ng-init="user_profile='<?php echo $user['email']; ?>'">
        <h1>Schedule</h1>
        <div class="schedule-dates" ng-init="checkcolor()">
        <!--<form action="" method="POST">-->
        <button type="submit" class="schedule-item" ng-repeat="(key, value) in namesDate track by $index" ng-model="namesDate[value]" ng-click="showData(value)" value="{{value}}" name="{{value}}" data-id={{value}}>{{value}}</button>
        <div ng-bind-html="ll"></div>
        </div>
        <div ng-repeat="x in [].constructor(times-1) track by $index">
{{infomov[$index].movie_play_fk}}
{{infomov[$index].date_play}}
        <div class="schedule-table">
            <table>
                <tr>
                    <th>SHOW</th>
                    <th>SCHEDULE IN CINEMA</th>
                </tr>
 <tr class="fade-scroll">
                          <td>
                              <h2>{{infomov[$index].movie_play_fk}}</h2>
                              <i class="far fa-clock"></i> {{infomov[$index].duration_play_fk}}m <i class="fas fa-desktop"></i> {{infomov[$index].hall_type_fk}}
                              <h3>SYNOPSIS</h3>
                              <p>{{infomov[$index].movie_synopsis}}
                              </p>
                              <div class="schedule-item"> Book Now edw name apo func ama available or reserverd all seats or not scheduled</a>
                              <div class="schedule-item"> DETAILS</a>
                              </div>
                          </td>
                          <td>
                              <div class="hall-type">
                                  <h3>{{infomov[$index].hall_name_fk}}</h3>
                                  <div>
                                      <div class="schedule-item"><i class="far fa-clock"></i></div>
                                      <div class="schedule-item">09:00 AM</div>
                                      <div class="schedule-item">11:30 AM</div>
                                      <div class="schedule-item">06:00 PM</div>
                                  </div>
                              </div>
                              <div class="hall-type">
                                  <h3>Main Hall</h3>
                                  <div>
                                      <div class="schedule-item"><i class="far fa-clock"></i></div>
                                      <div class="schedule-item">09:00 AM</div>
                                      <div class="schedule-item">11:30 AM</div>
                                      <div class="schedule-item">06:00 PM</div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                              </table>
        </div>


    </div></div>
    <footer></footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/script.js "></script>
</body>

</html>
<script>
    var scheduleUpdateView = angular.module('liveScheduleApp', ['datatables']);//ngSanitize des pws works!
    scheduleUpdateView.controller('liveScheduleController', function($scope, $http){
        $scope.textt="hi";
        $scope.isPressed = false;
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData = function(){
  $http.get('../models/fetch_data_schedule_view.php').then(function(response){
   $scope.namesDates = response.data;
  }),$http.get('../models/fetch_data_schedule_dates.php').then(function(response){
   $scope.namesDate = response.data;
  });
};
$scope.showData = function(value){
   $http({
    method:"POST",
    url:"../models/fetch_scheduleTable.php",
    data:{'id':value, 'action':value}
   }).then(function(response){
     
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

 $scope.checkcolor = function (){
    console.log('duh');
    $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'action':'getcolor'}
            }).then(function(response) {
               $scope.colortheme = response.data.toString();
               document.body.style.background = $scope.colortheme;
            })
}

}); 
    </script>