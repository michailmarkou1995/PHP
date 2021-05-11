<!DOCTYPE html>
<html lang="en">
<?php
require '../../system/classes/Booking.php';
require '../../system/moviesObj.php';
require '../../system/meta1.php';

$moviesTable->initBooking();
?>

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style-main.css">
    <title>Book <?php $moviesTable->initMovieTitle(); ?> Now</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <link rel="stylesheet" href="movie-seat-booking/style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>

</head> -->
<!-- <link rel="stylesheet" href="../../movie-seat-booking/style.css" /> -->

<body style="background-color:#2676ab;" ng-app="liveBookingApp" ng-controller="liveBookingController">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                $moviesTable->initMovieImg();
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php $moviesTable->initMovieTitle(); ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENGRE</td>
                        <td><?php $moviesTable->initMovieGenre(); ?></td>
                    </tr>
                    <tr>
                        <td>DURATION</td>
                        <td><?php $moviesTable->initMovieDuartion(); ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php $moviesTable->initMovieRelDate(); ?></td>
                    </tr>
                    <tr>
                        <td>DIRECTOR</td>
                        <td><?php $moviesTable->initMovieDirector(); ?></td>
                    </tr>
                    <tr>
                        <td>ACTORS</td>
                        <td><?php $moviesTable->initMovieActors(); ?></td>
                    </tr>
                </table>
            </div>
            <td><?php ?><input type="hidden" ng-model="emailUser='<?php echo $user['email']; ?>'"></td>
            <div class="booking-form-container" ng-model="movieTitle='<?php $moviesTable->initMovieTitle(); ?>'">
                <div ng-init="isNotScheduled() ? null : fetchData()" ng-if="isAvailable == false">We are really Sorry
                    Movie Is Not Scheduled yet! </div>
                <form ng-submit="submitBookForm(first_name, last_name, phone_number)" ng-if="isAvailable">

                    <select ng-model="date_play_is" ng-change="updateDate(date_play_is)" ng-options="key.date_play_fk for key in list_D_3" required>
                        <option value="" disabled selected>DATE</option>
                    </select>

                    <select ng-model="time_play_is" ng-change="updateTimePlay(time_play_is)" ng-options="key.time_play for key in list_TP_5" required>
                        <option value="" disabled selected>TIME</option>
                    </select>

                    <select ng-model="theatre_name_is" ng-change="updateTheatre(theatre_name_is)" data-ng-options="key.theatre_name_fk for key in list_TN_1" required>
                        <option value="" disabled selected>THEATRE</option>
                    </select>

                    <select data-ng-model="hall_name_is" data-ng-options="key.hall_name_fk for key in list_HN_2" ng-change="updateHall(hall_name_is)" required>
                        <option value="" disabled selected>HALL NAME</option>
                    </select>

                    <select ng-model="hall_type_is" ng-change="updateHallType(hall_type_is)" ng-options="key.hall_type_fk for key in list_HT_4" required>
                        <option value="" disabled selected>TYPE</option>
                    </select>

                    <select ng-model="seat_is" ng-change="updateSeats(seat_is)" data-ng-options="key for key in list_S_6" required>
                        <!--join-->
                        <option value="" disabled selected>Seats "Please Select All other Fields FIRST!"</option>
                    </select>

                    <input type="text" placeholder="First Name" name="fname" ng-model="first_name" required />

                    <input placeholder="Last Name" type="text" name="lname" ng-model="last_name" required />

                    <input placeholder="Phone Number" type="text" name="pnumber" ng-model="phone_number" required />

                    <button type="submit" name="submit" id="submit" class="form-btn" value="submit">Book a Seat</button>
                </form>

                <div class="container">
                    <ul class="showcase">
                        <li>
                            <div class="seat"></div>
                            <small>N/A</small>
                        </li>
                        <li>
                            <div class="seat selected"></div>
                            <small>Selected</small>
                        </li>
                        <li>
                            <div class="seat occupied"></div>
                            <small>Occupied</small>
                        </li>
                    </ul>
                    <div class="screen">
                        <p align="center" style="color:red">Screen</p>
                    </div>

                    <div ng-repeat="row_s in list_css" ng-change="updateSeatsCss(rowS)" ng-model="row_s" class="row">
                        <div ng-init="number = countInit()" ng-repeat="x in [].constructor(8) track by $index" class="{{isRes(number) ? 'seat occupied' : checked(number)}}" id="{{number}}">
                            <p style="color:red">{{number}}</p>
                        </div>
                    </div>
                </div>

                <p class="text">
                    You have selected <span id="count">0</span> seats for a price of $<span id="price">0</span>
                </p>
            </div>
        </div>
        <div style="height:50px">
            <div>
                <ul>
                    <li ng-repeat="d in dataa">
                        <ul>
                            <li ng-repeat="item in d">{{item.seatP}} : {{item.seatsAvailable}}</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <script src="../../web/js/script.js "></script>
</body>

</html>
<script src="../controllers/liveBookingApp.js"></script>