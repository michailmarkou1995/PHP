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

    <div class="schedule-section" ng-init="user_profile='<?php echo $user['email']; ?>'">
        <h1>Schedule</h1>
        <div class="schedule-dates" ng-init="checkcolor()">
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


        </div>
    </div>
    <footer></footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/script.js "></script>
</body>

</html>
<script src="../controllers/liveScheduleApp.js"></script>