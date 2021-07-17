<?php
//include("includes/header.php"); 
//require_once 'moviesObj.php';
//$admincon = new Admin();
include("../../system/fheaderinfo.php");
include("../../system/classes/Booking.php");
//include("../../system/meta1.php");
$bookTable = new Booking();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link rel="icon" type="image/png" href="../../web/images/logo.png">
    <link rel="stylesheet" href="../../web/css/style-main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../web/css/style-seats.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.4/angular-datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <link rel="stylesheet" href="../../web/css/bootstrap-4-5-2-modified.css">
<style>.td-small {
  width: 410px;
  max-width: 410px;
}</style>
</head>

<body >
<!-- style="background-color:grey;" -->
    <?php
    ?>
    <div class="admin-section-header">
        <div class="admin-logo">
            CineSocial
        </div>
        <div class="admin-login-info">
            <i class="far fa-bell admin-notification-button"></i>
            <i class="far fa-comment-alt"></i>
            <a href="../../system/handlers/logout.php">logout here</a>
            <img class="admin-user-avatar" src="../../web/images/avatar.png" alt="">
        </div>
    </div>
    <div class="admin-container">
        <div class="admin-section admin-section1 ">
            <ul>
                <li><i class="fas fa-sliders-h"></i><a href="#">Dashboard </a><i class="fas admin-dropdown fa-chevron-right"></i></li>
            </ul>
            <ul>
                <li><i class="fas fa-sliders-h"></i><a href="home.php">Back to Home </a><i class="fas admin-dropdown fa-chevron-right"></i></li>
            </ul>
        </div>

        <div class="admin-section admin-section2" ng-app="crudUserBookingsApp" ng-controller="crudUserBookingsController" ng-init="user_profile='<?php echo $user['email']; ?>'">
            <div class="admin-section-column-table"><!--{{dd}}ng-init="checkcolor()"-->
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">{{papa}}
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                        <h2 style="color: #cf4545"><?php //echo $bookTable->getBookingNo() 
                                                    ?></h2>
                        <h3>Bookings</h3>
                        <?php echo $bookTable->getBookingNoUser($user['email']) ?>
<?php //echo 'HI'. $user['email'];?>

                    </div>
                    <button class="btn btn-info" ng-model="colortheme" ng-click="changeTheme(colortheme)" type="button">Color Theme</button>{{colortheme}}
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Your Bookings</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content" >
                        <?php
                        //$bookTable->handleBookingsTop();
                        ?> 
                        <td><?php ?><input type="hidden" ng-init="fetchData()"></td>
                         <div class="modal fade" tabindex="-1" role="dialog" id="crudmodal" >
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

<style ng-init=checkcolor()>
    body{
        background-color: {{colortheme}};
    }
</style>


                            <div class="modal fade" tabindex="-1" role="dialog" id="info_user" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">{{modalTitle}}</h4>
                                            </div>
                                            <div class="modal-body">
                                
                                                <div class="form-group">
                                                    <label>First Name:</label>
                                                    <b>{{fname}}</b>
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name:</label>
                                                    <b>{{lname}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Movie Name:</label>
                                                    <b>{{movie_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date:</label>
                                                    <b>{{date_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Time:</label>
                                                    <b>{{time_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Theatre:</label>
                                                    <b>{{theatre_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Hall Name:</label>
                                                    <b>{{hn_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Hall type:</label>
                                                    <b>{{ht_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Seat No:</label>
                                                    <b>{{seat_res}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter phone:</label>
                                                    <b>{{pnumber}}</b>
                                                </div>

                                                <div class="form-group">
                                                    <label>Account:</label>
                                                    <b>{{acc_email}}</b>
                                                </div>

                                                
                                               
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
                            <div class="seat occupied1"></div>
                            <small>Occupied</small>
                        </li>
                    </ul>
                    <div style="background-color:black" class="screen">
                        <p align="center" style="color:red">Screen</p>
                    </div>
                    <div ng-repeat="row_s in list_css" ng-change="updateSeatsCss(rowS)" ng-model="row_s" class="row">
                        <div ng-init="number = countInit()" ng-repeat="x in [].constructor(8) track by $index" class="{{isRes(number) ? checked(number) : checked(number)}}" id="{{number}}">
                            <p style="color:red">{{number}}</p>
                        </div>
                    </div></div>   
                                      

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive" style="overflow-x: unset; overflow:scroll;">
                                <table ng-if="noresyet == false" datatable="ng" dt-column-defs="dtColumnDefs" dt-options="dtOptions" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Movie Name</th>
                                            <th>Theatre Name</th>
                                            <th>Date</th>
                                            <th>information</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr ng-repeat="user in bookData track by $index">
                                            <td>{{user.movieName_fk}}</td>
                                            <td>{{user.bookingTheatre_fk}}</td>
                                            <td>{{user.bookingDate_fk}}</td>
                                            <td><button type="button" ng-click="fetchSingleDataUser(user.bookingID)" class="btn btn-info btn-xs">Ticket</button></td>
                                            <td><button type="button" ng-click="fetchSingleData(user.bookingID)" class="btn btn-warning btn-xs">Edit</button></td>
                                            <td><button type="button" ng-click="deleteData(user.bookingID)" class="btn btn-danger btn-xs">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="color:red" ng-if="noresyet == true"><b>Sorry No Tickets Yet !</b></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="admin-panel-section-content"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../../web/js/script.js "></script>
</body>

</html>
<script src="../controllers/crudUserBookingsApp.js"></script>
