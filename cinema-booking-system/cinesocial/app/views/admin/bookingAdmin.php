<?php
require_once '../../../system/classes/Admin.php';
require_once '../../../system/classes/Booking.php';
require_once '../../../system/classes/Updatehandling.php';
$admincon = new Admin(); //theli remove? include prev page?
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Trailer Setup</title>
    <link rel="icon" type="image/png" href="../../../web/images/logo.png">
    <link rel="stylesheet" href="../../../web/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.4/angular-datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../web/css/bootstrap-4-5-2-modified.css">

    <script src="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


</head>

<body ng-app="crudBookingApp" ng-controller="crudBookingController">
    <?php
    $bookTable = new Booking();
    //UpdateHandlings::conDb();
    ?>


    <div class="admin-section-header">
        <div class="admin-logo">
            CineSocial
        </div>
        <div class="admin-login-info">
            <a href="../../../system/handlers/logoutadmin.php">logout here</a>
            <img class="admin-user-avatar" src="../../../web/images/avatar.png" alt="">
        </div>
    </div>
    <div class="admin-container">
        <?php UpdateHandlings::getAdminSideBar(); ?>

        <div class="admin-section admin-section2">
            <div class="admin-section-column-table">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                        <h2 style="color: #cf4545"><?php echo $bookTable->getBookingNo() ?></h2>
                        <h3>Bookings</h3>
                    </div>

                    <?php $query = "SELECT user1.first_name, user1.last_name, user2.first_name, user2.last_name FROM meetings m JOIN users user1 ON m.user1_id = user1.id JOIN users user2 ON m.user2_id = user2.id WHERE meeting_id = "


                    ?>

                    <!--here populate with SEARCH FIELD -->
                    <div class=" admin-section-panel3">
                        <form action="" method="POST">
                            <input placeholder="Search Bookings" type="text" name="search-db" required>
                            <button type="submit" value="submit" name="submit" class="form-btn">Search</button>
                            <?php
                            //Admin::getResMsg(); just testing never mind
                            ?>
                        </form>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Bookings Results</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <div>
                            <?php
                            //$bookTable->handleBookings(); //add limit by scrolling? des social pws ekane o allos to site
                            $admincon->getSearch();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>All Bookings</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">

                        <div class="admin-panel-section-content" ng-init="fetchData()">
                            <?php //$bookTable->bookingTable(); 
                            ?>
                            <div class="modal fade" tabindex="-1" role="dialog" id="crudmodal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" ng-submit="submitForm()">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">{{modalTitle}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger alert-dismissible" ng-show="error">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{errorMessage}}
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter First Name</label>
                                                    <input type="text" name="first_name" ng-model="first_name" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter Last Name</label>
                                                    <input type="text" name="last_name" ng-model="last_name" class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Movie Name</label>
                                                    <select class="form-control" ng-model="movie_names" ng-options="movie_names for movie_names in movie_name" ng-change="updateMovie(movie_names)" required>
                                                        <option value="" disabled selected>Movies List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_movie}} -> NEW: {{movie_names}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Date</label>
                                                    <select class="form-control" ng-model="date" ng-options="date for date in date_play" ng-change="updateDate(date)" required>
                                                        <option value="" disabled selected>Date List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_date}} -> NEW: {{date}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Time</label>
                                                    <select class="form-control" ng-model="time" ng-options="time for time in time_play" ng-change="updateTime(time)" required>
                                                        <option value="" disabled selected>Time List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_time}} -> NEW: {{time}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Theatre</label>
                                                    <select class="form-control" ng-model="theatre" ng-options="theatre for theatre in theatre_name" ng-change="updateTheatre(theatre)" required>
                                                        <option value="" disabled selected>Theatre List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_theatre}} -> NEW: {{theatre}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Hall Name</label>
                                                    <select class="form-control" ng-model="hall_name" ng-options="hall_name for hall_name in hall_name_theatre" ng-change="updateHallName(hall_name)" required>
                                                        <option value="" disabled selected>Hall List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_hall_type}} -> NEW: {{hall_name}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Hall type</label>
                                                    <select class="form-control" ng-model="hall_type" ng-options="hall_type for hall_type in booking_type_Hall" ng-change="updateHallType(hall_type)" required>
                                                        <option value="" disabled selected>Hall Type</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_booking_type}} -> NEW: {{hall_type}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Seat No</label>
                                                    <select class="form-control" ng-model="seatp" ng-options="seatp for seatp in listName_S" ng-change="updateSeats(seatp)" placeholder="Please fill all other field first" required>
                                                        <option value="" disabled selected>Seat List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_seatp}} -> NEW: {{seatp}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter phone</label>
                                                    <input type="text" name="phone_number" ng-model="phone_number" class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Account</label>
                                                    <input type="text" name="account" ng-model="account" ng-model-options='{ debounce: 1000 }' ng-change="searchAccount(account)" class="form-control" />
                                                    <pre>Search Results: {{accountText}}</pre>
                                                    {{listName_movie}} - {{listName_Time}} -- {{listName_theatre}} -- {{listName_hall}} -- {{listName_hall_type}} -- {{listName_S_selected}} {{listName_date}}
                                                </div>{{account}}

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                                <input type="submit" name="submit" id="submit" class="btn btn-info" value="{{submit_button}}" />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>





                            <div class="modal fade" tabindex="-1" role="dialog" id="crudmodal1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" ng-submit="submitForm()">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">{{modalTitle}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger alert-dismissible" ng-show="error">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{errorMessage}}
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter First Name</label>
                                                    <input type="text" name="first_name" ng-model="first_name" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter Last Name</label>
                                                    <input type="text" name="last_name" ng-model="last_name" class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Movie Name</label>
                                                    <select class="form-control" ng-model="movie_names" ng-options="movie_names for movie_names in movie_name" ng-change="updateMovie(movie_names)" required>
                                                        <option value="" disabled selected>Movies List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_movie}} -> NEW: {{movie_names}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Date</label>
                                                    <select class="form-control" ng-model="date" ng-options="date for date in date_play" ng-change="updateDate(date)" required>
                                                        <option value="" disabled selected>Date List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_date}} -> NEW: {{date}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Time</label>
                                                    <select class="form-control" ng-model="time" ng-options="time for time in time_play" ng-change="updateTime(time)" required>
                                                        <option value="" disabled selected>Time List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_time}} -> NEW: {{time}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Theatre</label>
                                                    <select class="form-control" ng-model="theatre" ng-options="theatre for theatre in theatre_name" ng-change="updateTheatre(theatre)" required>
                                                        <option value="" disabled selected>Theatre List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_theatre}} -> NEW: {{theatre}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Hall Name</label>
                                                    <select class="form-control" ng-model="hall_name" ng-options="hall_name for hall_name in hall_name_theatre" ng-change="updateHallName(hall_name)" required>
                                                        <option value="" disabled selected>Hall List</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_hall_type}} -> NEW: {{hall_name}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Hall type</label>
                                                    <select class="form-control" ng-model="hall_type" ng-options="hall_type for hall_type in booking_type_Hall" ng-change="updateHallType_edit(hall_type)" required>
                                                        <option value="" disabled selected>Hall Type</option>
                                                    </select>
                                                    <pre ng-if="show_Old">OLD: {{old_booking_type}} -> NEW: {{hall_type}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Seat No</label>
                                                    <input type="text" name="seatp" ng-model="seatp" ng-model-options='{ debounce: 1000 }' ng-change="searchAccountSeat(seatp)" class="form-control" />
                                                    <pre>Search Results: {{seatText}}</pre>
                                                    <pre ng-if="show_Old">OLD: {{old_seatp}} -> NEW: {{seatp}}</pre>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter phone</label>
                                                    <input type="text" name="phone_number" ng-model="phone_number" class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Account</label>
                                                    <input type="text" name="account" ng-model="account" ng-model-options='{ debounce: 1000 }' ng-change="searchAccount(account)" class="form-control" />
                                                    <pre>Search Results: {{accountText}}</pre>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                                <input type="submit" name="submit" id="submit" class="btn btn-info" value="{{submit_button}}" />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div align="right">
                                <button type="button" name="add_button" ng-click="addData()" class="btn btn-success">Add</button>
                            </div>
                            <div class="table-responsive" style="overflow-x: unset; overflow:scroll;">
                                <table datatable="ng" dt-options="dtOptions" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>bookingID</th>
                                            <th>movieName_fk</th>
                                            <th>bookingTheatre_fk</th>
                                            <th>bookingTheatreHall_fk</th>
                                            <th>bookingType_fk</th>
                                            <th>bookingDate_fk</th>
                                            <th>bookingTime_fk</th>
                                            <th>bookingFName</th>
                                            <th>bookingLName</th>
                                            <th>bookingPNumber</th>
                                            <th>bookingAccount_fk</th>
                                            <th>seat No</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr ng-repeat="name in namesData">
                                            <td>{{name.bookingID}}</td>
                                            <td>{{name.movieName_fk}}</td>
                                            <td>{{name.bookingTheatre_fk}}</td>
                                            <td>{{name.bookingTheatreHall_fk}}</td>
                                            <td>{{name.bookingType_fk}}</td>
                                            <td>{{name.bookingDate_fk}}</td>
                                            <td>{{name.bookingTime_fk}}</td>
                                            <td>{{name.bookingFName}}</td>
                                            <td>{{name.bookingLName}}</td>
                                            <td>{{name.bookingPNumber}}</td>
                                            <td>{{name.bookingAccount_fk}}</td>
                                            <td>{{name.seatP}}</td>
                                            <td><button type="button" ng-click="fetchSingleData(name.bookingID)" class="btn btn-warning btn-xs">Edit</button></td>
                                            <td><button type="button" ng-click="deleteData(name.bookingID)" class="btn btn-danger btn-xs">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- AUTO EDW TO DIV parousiazi to overflow: scroll not working sto ALl bookings !!!! des pu kani match sto container? ADMIN SECTION COLUMN !!!!parent-->
        </div>
    <script>
        $(document).ready(function() {
            $('#information').DataTable({
                stateSave: true
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../../../web/js/script.js "></script>
</body>

</html>
<script src="../../controllers/crudAdminBookingApp.js"></script>
