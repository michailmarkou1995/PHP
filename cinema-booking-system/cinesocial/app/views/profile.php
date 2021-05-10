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
<script>
    var userBookingsApp = angular.module('crudUserBookingsApp', [
    'datatables', 
    ]);
    userBookingsApp.controller('crudUserBookingsController', ['$scope', '$q', 'DTOptionsBuilder', 'DTColumnBuilder', 'DTColumnDefBuilder', '$http', function($scope, $q, DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder, $http) {
        $scope.success = false;
        $scope.error = false;
        $scope.rerun=true;

        $scope.movie_name=[];
        $scope.list_css=[];
        $scope.times_seats_call;
        $scope.listName;
        $scope.listHall;
        $scope.listDate;
        $scope.listHallType;
        $scope.listTimePlay;
        $scope.listSeats;
        $scope.arraySeats;
        $scope.keepcountcss=0;
        $scope.totalCount = 1;
        $scope.total;
        $scope.noresyet=false;
        $scope.colortheme='#18191A';
        $scope.dd='bbbbbbbbbbbbbbbbbbbbbbb';
        $scope.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('stateSave', true)
            //.withPaginationType("simple_numbers")
            //.withDisplayLength(25)
    .withOption('responsive', true)
    .withOption('scrollX', true)
    .withOption('scrollCollapse', true)
    .withOption('autoWidth', true)
            .withOption("retrieve", true)
            .withOption('order', [0, 'desc']);

            $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).notSortable(),
        DTColumnDefBuilder.newColumnDef(2).notSortable(),
        DTColumnDefBuilder.newColumnDef(3).notSortable().withOption('width', '20%')
     
    ];
    DTColumnDefBuilder
 .newColumnDef(8)
 .notSortable()
 .withClass('td-small')

        $scope.fetchData = function() {
            console.log($scope.user_profile);
        $http({
                method: "POST",
                url: "../models/fetch_data_user_ticket.php",
                data: {'user_profile':$scope.user_profile}
            }).then(function(response) {
                console.log(response.data);
                if(response.data['notickets'] != 'yes'){
                $scope.bookData = response.data;
                $scope.noresyet=false;
            }
                else $scope.noresyet=true;
            })
        };
        $scope.openModal = function() {
            var modal_popup = angular.element('#crudmodal');
            modal_popup.modal('show');
        };

        $scope.closeModal = function() {
            var modal_popup = angular.element('#crudmodal');
            modal_popup.modal('hide');
        };

        $scope.openModalInfo = function() {
            var modal_popup = angular.element('#info_user');
            modal_popup.modal('show');
        };

        $scope.closeModalInfo = function() {
            var modal_popup = angular.element('#info_user');
            modal_popup.modal('hide');
        };

        $scope.fetchSingleDataUser = function(bookingID) {
            $scope.list_css=[];
            $scope.UserSeat='';
            $q.all([$http({
                method: "POST",
                url: "../models/fetch_user_ticket_info.php",
                data: {
                    'id': bookingID,
                    'action': 'fetch_single_dataUser'
                }
            }).then(function(response) {
                $scope.fname = response.data['first_name'];
                $scope.lname = response.data['last_name'];
                $scope.movie_res = response.data['movie_name'];
                $scope.theatre_res = response.data['theatre'];
                $scope.hn_res = response.data['hall_type'];
                $scope.ht_res = response.data['booking_type'];
                $scope.date_res = response.data['date'];
                $scope.time_res = response.data['time'];
                $scope.seat_res = response.data['seatp'];
                $scope.pnumber = response.data['phone_number'];
                $scope.acc_email = response.data['account'];
                $scope.hidden_id = bookingID;
                $scope.modalTitle = 'Information Ticket';
             }), 
        ]).then(function(responses) {

                $http({
                method: "POST",
                url: "../models/fetch_user_ticket_info.php",
                data: {
                    'id': bookingID,
                    'fname': $scope.fname,
                    'lname': $scope.lname,
                    'movie_n': $scope.movie_res,
                    'theatre_name': $scope.theatre_res,
                    'hall_name': $scope.hn_res,
                    'hall_type': $scope.ht_res,
                    'date': $scope.date_res,
                    'time': $scope.time_res,
                    'seat_res': $scope.seat_res,
                    'phone_number': $scope.pnumber,
                    'account': $scope.acc_email,
                    'action': 'fetch_single_dataSeat'
                }
            }).then(function(response) {
                $scope.pins=[response.data];
                $scope.SeatReserved=[];
                var i=0;
                for(const p in response.data) {//anti length katw for kanis auto to FOR !!!
    ////console.log (p, response.data[p]);
    //console.log('pass\n');
    if (p != 'userseat'){
        //console.log(i++); //egrafa $i tosi WRA PHP se JAVASCRIPT OMG
        //console.log('pass\n');
                     $scope.SeatReserved[i++]=response.data[p];
                    }//else continue;
                     
                   
}
                $scope.UserSeat=response.data['userseat'];
                console.log(response.data['userseat']);
                console.log(response.data);

                $http({
                method: "POST",
                url: "../models/fetch_user_ticket_info.php",
                data: {
                    'id': bookingID,
                    'movie_n': $scope.movie_res,
                    'theatre_name': $scope.theatre_res,
                    'hall_name': $scope.hn_res,
                    'hall_type': $scope.ht_res,
                    'date': $scope.date_res,
                    'time': $scope.time_res,
                    'action': 'fetch_single_dataFSeat'
                }
            }).then(function(response){

                $scope.totalSeats=parseInt(response.data['seatsAvailable']);
                $scope.indexSeatsSub=[];

                for(i=0;i<$scope.SeatReserved.length; i++)//thes length ton reserved theseon!
                    {//if no result DONT run
                    $scope.indexSeatsSub.push(parseInt($scope.SeatReserved[i]));
                    }

                $scope.list_css=[];
                $scope.arraySeats=[];
                $scope.list_S_6=[];
                    for (i=1; i<=parseInt(response.data['seatsAvailable']); i++)
                    {
                        $scope.list_S_6.push(i);
                    }
 
                $scope.times_seats_call= Math.ceil(parseInt(response.data['seatsAvailable'])/8);

                $scope.rerun=true;
                for (i=1; i<=$scope.times_seats_call; i++)
                {
                    $scope.list_css.push(i);
                }

                $scope.list_S_6= $scope.list_S_6
                .filter(x => !$scope.indexSeatsSub.includes(x))
                .concat($scope.indexSeatsSub.filter(x => !$scope.list_S_6.includes(x)))
            })
            })
                $scope.openModalInfo();
            });
        };

        $scope.submitForm = function() {
            console.log($scope.first_name);
            console.log($scope.last_name);
            console.log($scope.listName_movie);
            console.log($scope.listName_theatre);
            console.log($scope.listName_hall);
            console.log($scope.listName_hall_type);
            console.log($scope.listName_date);
            console.log($scope.listName_Time);
            console.log($scope.seatp);
            console.log($scope.phone_number);


            $http({
                method: "POST",
                url: "../models/insert_bookings.php",
                data: {
                    'first_name': $scope.first_name,
                    'last_name': $scope.last_name,
                    'movie_name': [$scope.listName_movie],
                    'theatre': $scope.listName_theatre,
                    'hall_type': $scope.listName_hall,
                    'booking_type': $scope.listName_hall_type,
                    'date': [$scope.listName_date],
                    'time': $scope.listName_Time,
                    'seatp': $scope.seatp,
                    'phone_number': $scope.phone_number,
                    'account': $scope.user_profile,
                    'action': $scope.submit_button,
                    'id': $scope.hidden_id
                }
            }).then(function(response) {
console.log(response.data);
                if (response.data.error != '')
                //if(response.data['error'] != '')
                {
                    $scope.success = false;
                    $scope.error = true;
                    $scope.errorMessage = response.data.error; //response.data['error'];//response.data.error;
                } else {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = response.data.message;
                    $scope.form_data = {};
                    $scope.closeModal();
                    $scope.fetchData();
                }
            })
            // } else confirm("Account not Ok");
        };
        $scope.fetchSingleData = function(bookingID) {
            $q.all([$http({
                method: "POST",
                url: "../models/insert_bookings.php",
                data: {
                    'id': bookingID,
                    'action': 'fetch_single_data'
                }
            }).then(function(response) {
                $scope.first_name = response.data.first_name;
                $scope.last_name = response.data.last_name;
                $scope.phone_number = response.data.phone_number;
                console.log('done');
             }), 
        ]).then(function(response) {
            $http({
                method: "POST",
                url: "../models/insert_bookings.php",
                data: {
                    'id': bookingID,
                    'action': 'fetch_single_data_user_edit'
                }
            }).then(function(response) {
                //let uniqueItems = [...new Set($scope.rest_info_general)];
            console.log(response.data);
                $scope.rest_info_general = response.data['rest_info_general'];
   
                let unique = response.data['rest_info_general']
                for(p in response.data['rest_info_general'])
                {
                    //let unique = [...new Set(response.data['rest_info_general'][p][0][1])];
                   // console.log(unique);
                    $scope.movie_name.push(response.data['rest_info_general'][p][0][1]);
                }
                $scope.movie_name = [...new Set($scope.movie_name)];

                $scope.hidden_id = bookingID;
                $scope.modalTitle = 'Edit Data';
                $scope.submit_button = 'Edit';
                $scope.openModal();
            });
        })
            
        };

        $scope.deleteData = function(bookingID) {
            if (confirm("Are you sure you want to remove it?")) {
                $http({
                    method: "POST",
                    url: "../models/insert_bookings.php",
                    data: {
                        'id': bookingID,
                        'action': 'Delete'
                    }
                }).then(function(response) {
                    console.log(response.data);
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = response.data['message'];
                    $scope.fetchData();
                });
            }
        };

        $scope.countInit = function() {
        if($scope.rerun==true){
        $scope.totalCount = 1;
        $scope.number=1;
        }
        $scope.rerun=false;
       return $scope.totalCount++;
    }

    $scope.isRes = function(id){
        $scope.total= 1;
        $scope.total= $scope.keepcountcss +1;
   
        for (i=0; i< $scope.indexSeatsSub.length; i++) {

        if (id== $scope.indexSeatsSub[i]) { 
            return true;}
        }
        return false;
    }
    $scope.checked = function(id){
            if (id > $scope.totalSeats){
                return 'seat occupied1';}
                if(id == $scope.UserSeat){
                return 'seat selected';
            }
            for(p in $scope.indexSeatsSub){

                if (id == $scope.indexSeatsSub[p]) {

                    return 'seat occupied1';
                }
            }
            return 'seat';
    }

        // $scope.deleteData = function(id) {
        //     if (confirm("Are you sure you want to remove it?")) {
        //         $http({
        //             method: "POST",
        //             url: "delete_usert_ticket.php",
        //             data: {
        //                 'id': id,
        //                 'action': 'Delete'
        //             }
        //         }).then(function(response) {
        //             $scope.success = true;
        //             $scope.error = false;
        //             $scope.successMessage = response.data.message;
        //             $scope.fetchData();
        //         });
        //     }
        // };


        // $scope.movie_name = [...new Set($scope.movie_name)];
        // if (id == $scope.rest_info_general[i][0][1] && isCheck_M_D == false)

        $scope.updateMovie = function(id) {
            var length = Object.keys($scope.rest_info_general).length - 1;
            var isCheck_M_D = 0;
            $scope.date_play = []; //initiates array for pushing
          console.log('edw katw');
          console.log($scope.movie_name);
console.log($scope.rest_info_general);
            $scope.listName_movie = id; //get selected movie Name
             for (i = 0; i <= length; i++) {
                 //console.log($scope.rest_info_general[i][0][1])
                if (id == $scope.movie_name[i] && isCheck_M_D == false) { //ama dropbox(db fetched) isodinami rest info db fetch kane match!
                    console.log('match');
                    $http({
                        method: "POST",
                        url: "../models/insert_bookings.php",
                        data: {
                            'movie_name': [id],
                            'action': 'movie_based'
                        }
                    }).then(function(response) {
                        isCheck_M_D = true;
                        for (k = 0; k < response.data.length; k++) {
                            $scope.date_play.push([response.data[k].date_play_fk]);
                            console.log($scope.date_play);
                        }

                        $scope.time_play = []; //ta prwta 3 paidia kai xwris auta katharizan pws??
                        $scope.listName_theatre = [];
                        $scope.hall_name_theatre = [];
                        $scope.booking_type_Hall = [];
                        $scope.listName_S = [];
                    })
                }
            }
            if ($scope.listName_movie != '') {
                $scope.generalMovie = true;
            } else {
                $scope.generalmovie = false;
            }
        }

         // $scope.movie_name = [...new Set($scope.movie_name)];

        $scope.updateDate = function(id) { 
            $scope.time_play = []; 
            var length = Object.keys($scope.rest_info_general).length - 1;
            console.log($scope.rest_info_general);
            var isCheck_D_D = 0;
            $scope.listName_date = id[0];
            console.log($scope.listName_date);
            $scope.theatre_name = [];
            $scope.time_play = []; //initiates array for pushing
            for (i = 0; i <= length; i++) {
                if (id == $scope.rest_info_general[i][0][2] && isCheck_D_D == false) { console.log('hi');
                    $http({
                        method: "POST",
                        url: "../models/insert_bookings.php",
                        data: {
                            'movie_name': [$scope.listName_movie],
                            'date_play': id,
                            'action': 'date_based'
                        }
                    }).then(function(response) {
                        //console.log(response.data);
                        //isCheck_D_D=true;
                        if (isCheck_D_D == false) { //here like DB ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) because no access to db entires anymore
                            for (k = 0; k < response.data.length; k++) {
                                $scope.time_play.push([response.data[k].time_play]);
                                //console.log($scope.time_play);
                                //console.log('lol');
                                //alert(k);
                                isCheck_D_D = true;
                                // alert(isCheck_D_D);
                                
                            }
                        }
                        console.log($scope.time_play);

                        $scope.listName_theatre = [];
                        $scope.hall_name_theatre = [];
                        $scope.booking_type_Hall = [];
                        $scope.listName_S = [];
                    })
                }
            }
            if ($scope.listName_date != '') {
                $scope.generalDate = true;
            } else {
                $scope.generalDate = false;
            }
        }

        $scope.updateTime = function(id) {
            $scope.listName_theatre = [];
            var length = Object.keys($scope.rest_info_general).length - 1;
            var isCheck_T_TN = 0;
            $scope.listName_Time = id;
            console.log($scope.listName_Time);
            for (i = 0; i <= length; i++) {
                if (id == $scope.rest_info_general[i][0][3] && isCheck_T_TN == false) { //alert($scope.listName_date);
                    // console.log('id works?');
                    // console.log(id);
                    $http({
                        method: "POST",
                        url: "../models/insert_bookings.php",
                        data: {
                            'time_play': id,
                            'movie_name': [$scope.listName_movie],
                            'date_play': [$scope.listName_date],
                            'action': 'time_based'
                        }
                    }).then(function(response) {
                        // console.log(response.data);
                        //isCheck_D_D=true;
                        if (isCheck_T_TN == false) { //here like DB ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) because no access to db entires anymore
                            for (k = 0; k < response.data.length; k++) {
                                $scope.theatre_name.push([response.data[k].theatre_name_fk]);
                                isCheck_T_TN = true;
                            }
                        }

                        $scope.hall_name_theatre = [];
                        $scope.booking_type_Hall = [];
                        $scope.listName_S = [];
                    })
                }
            }
            if ($scope.listName_Time != '') {
                $scope.generalTime = true;
            } else {
                $scope.generalTime = false;
            }
        }

        $scope.updateTheatre = function(id) {

            $scope.hall_name_theatre = [];
            var length = Object.keys($scope.rest_info_general).length - 1;
            var isCheck_TΝ_ΗΤ = 0;
            $scope.listName_theatre = id;
console.log($scope.listName_theatre);
            for (i = 0; i <= length; i++) {
                /* console.log(id);//4 lines of DEBUG MUST!!!
                 console.log($scope.rest_info_general.length);
                 console.log($scope.rest_info_general);
                 console.log($scope.rest_info_general[i][0].theatre_name_fk);*/
                if (id == $scope.rest_info_general[i][0][5] && isCheck_TΝ_ΗΤ == false) {
                    // console.log([$scope.listName_Time]);
                    // console.log([$scope.listName_movie]);
                    // console.log([$scope.listName_date]);
                    // console.log(id);
                    //console.log('wra');
                    //console.log($scope.listName_Time);
                    $http({
                        method: "POST",
                        url: "../models/insert_bookings.php",
                        data: {
                            'theatre': id,
                            'time_play': $scope.listName_Time,
                            'movie_name': [$scope.listName_movie],
                            'date_play': [$scope.listName_date],
                            'action': 'theatre_based'
                        }
                    }).then(function(response) {
                        console.log(response.data);
                        //console.log(response.data);
                        //isCheck_D_D=true;
                        if (isCheck_TΝ_ΗΤ == false) { //here like DB ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) because no access to db entires anymore
                            for (k = 0; k < response.data.length; k++) {
                                $scope.hall_name_theatre.push([response.data[k].hall_name_fk]);
                                //console.log('lol');
                                //alert(k);
                                isCheck_TΝ_ΗΤ = true;
                                // alert(isCheck_TΝ_ΗΤ);
                            }
                        }
console.log($scope.hall_name_theatre);
                        //$scope.movie_names="";
                        //$scope.listName_movie="";
                        //$scope.time_play=[];
                        //$scope.theatre_play=[];
                        //$scope.hall_name_play=[];
                        //$scope.hall_type_play=[];
                        //$scope.list_S_play=[];


                        $scope.booking_type_Hall = [];
                        $scope.listName_S = [];
                    })
                }
            }
            if ($scope.listName_theatre != '') {
                $scope.generalTheatre = true;
            } else {
                $scope.generalTheatre = false;
            }
        }

        $scope.updateHallName = function(id) {
            /* $scope.booking_type_Hall=[];
             $scope.listName_S=[];*/
            //hall_name_theatre ng-options
            $scope.booking_type_Hall = [];
            var length = Object.keys($scope.rest_info_general).length - 1;
            var isCheck_H_HT = 0;
            $scope.listName_hall = id;
            for (i = 0; i <= length; i++) {
                /* console.log(id);//4 lines of DEBUG MUST!!!
                 console.log($scope.rest_info_general.length);
                 console.log($scope.rest_info_general);
                 console.log($scope.rest_info_general[i][0].hall_name_fk + 'hi');//edw ferni vip artemis omos den ine IF match apla dixni to LAST RESULT!!! ine OK ARA katw to IF theli CHECK undefined output $output logo sql field properti same name twice !*/
                //console.log(id);

                  console.log([$scope.listName_Time]);
                    console.log([$scope.listName_movie]);
                    console.log([$scope.listName_date]);
                    console.log([$scope.listName_theatre]);
                    console.log($scope.listName_theatre);
                    console.log(id);
                    console.log('wra');

                if (id == $scope.rest_info_general[i][0][6]&& isCheck_H_HT == false) {
                    $http({
                        method: "POST",
                        url: "../models/insert_bookings.php",
                        data: {
                            'hall_name': id,
                            'theatre': $scope.listName_theatre,
                            'time_play': $scope.listName_Time,
                            'movie_name': [$scope.listName_movie],
                            'date_play': [$scope.listName_date],
                            'action': 'hall_based'
                        }
                    }).then(function(response) {
                        console.log(response.data);
                        if (isCheck_H_HT == false) { //here like DB ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) because no access to db entires anymore
                            for (k = 0; k < response.data.length; k++) {
                                //console.log(response.data[k].hall_type_fk + 'ffffHJIO');
                                $scope.booking_type_Hall.push([response.data[k].hall_type_fk]);
                                //console.log('lol');
                                //alert(k);
                                isCheck_H_HT = true;
                                //alert(isCheck_H_HT);
                            }
                        }
console.log($scope.booking_type_Hall);
                        //$scope.movie_names="";
                        //$scope.listName_movie="";
                        //$scope.time_play=[];
                        //$scope.theatre_play=[];
                        //$scope.hall_name_play=[];
                        // $scope.hall_type_play=[];
                        //$scope.list_S_play=[];


                        $scope.listName_S = [];
                    })
                }
            }
            if ($scope.listName_hall != '') {
                $scope.generalHall = true;
            } else {
                $scope.generalHall = false;
            }
        }

        $scope.promise = function(i) {
            console.log($scope.rest_info_general[i][0].movie_play_fk);
            console.log($scope.rest_info_general[i][0].theatre_name_fk);
            console.log($scope.rest_info_general[i][0].hall_name_fk);
            console.log($scope.rest_info_general[i][0].date_play_fk);
            console.log($scope.rest_info_general[i][0].hall_type_fk);
            console.log($scope.rest_info_general[i][0].time_play);
            return $http({
                method: "POST",
                url: "../models/fetch_data_booking_view_seats_available.php",
                data: {
                    'movie_name': $scope.rest_info_general[i][0].movie_play_fk,
                    'theatre_n': $scope.rest_info_general[i][0].theatre_name_fk,
                    'hall_name_n': $scope.rest_info_general[i][0].hall_name_fk,
                    'date_play_n': $scope.rest_info_general[i][0].date_play_fk,
                    'hall_type_n': $scope.rest_info_general[i][0].hall_type_fk,
                    'time_play_n': $scope.rest_info_general[i][0].time_play
                }
            })
        }
        //to seatSub array epistrefi mia fora to promise me reserved thesis numbers kai to promise 1 me to available 10 omos alles fores dini 0 sto promise kai sto promise 1 25 me time_play 13:00 !!! sto lathos enw sto swsto me 09:00
        $scope.promise1 = function(i) {
            console.log($scope.rest_info_general[i][0].movie_play_fk);
            console.log($scope.rest_info_general[i][0].theatre_name_fk);
            console.log($scope.rest_info_general[i][0].hall_name_fk);
            console.log($scope.rest_info_general[i][0].date_play_fk);
            console.log($scope.rest_info_general[i][0].hall_type_fk);
            console.log($scope.rest_info_general[i][0].time_play);
            return $http({ // edw ebala listName_date ANTI to date_play mou ferni thesis pu nai reserved oxi to anitheto omos!
                method: "POST",
                url: "../models/fetch_data_booking_view_seats.php",
                data: {
                    'movie_name': $scope.rest_info_general[i][0].movie_play_fk,
                    'theatre_n': $scope.rest_info_general[i][0].theatre_name_fk,
                    'hall_name_n': $scope.rest_info_general[i][0].hall_name_fk,
                    'date_play_n': $scope.rest_info_general[i][0].date_play_fk,
                    'hall_type_n': $scope.rest_info_general[i][0].hall_type_fk,
                    'time_play_n': $scope.rest_info_general[i][0].time_play
                }
            })
        }

        $scope.updateHallType = function(id) {
            $scope.listName_S = [];
            //$scope.listName_S=[];
            //booking_type_Hall ng-options
            //seat_available ng-options grapse se kathe DEBUG for it edw ti kanis!
            var length = Object.keys($scope.rest_info_general).length - 1;
            var isCheck_HT_S = 0;
            console.log(length);
            console.log('ftasame');
            $scope.listName_hall_type = id;
            if ($scope.listName_hall_type != '') {
                $scope.generalHallType = true;
            } else {
                $scope.generalHallType = false;
            }
            if ($scope.listName_hall != '') {
                $scope.generalHall = true;
            } else {
                $scope.generalHall = false;
            }
            if ($scope.listName_theatre != '') {
                $scope.generalTheatre = true;
            } else {
                $scope.generalTheatre = false;
            }
            if ($scope.listName_Time != '') {
                $scope.generalTime = true;
            } else {
                $scope.generalTime = false;
            }
            if ($scope.listName_date != '') {
                $scope.generalDate = true;
            } else {
                $scope.generalDate = false;
            }
            if ($scope.listName_movie != '') {
                $scope.generalMovie = true;
            } else {
                $scope.generalmovie = false;
            }
            /*console.log($scope.generalMovie);
            console.log($scope.generalDate);
            console.log($scope.generalTime);
            console.log($scope.generalTheatre);
            console.log($scope.generalHall);
            console.log($scope.generalHallType);*/
            //alert($scope.generalMovie + $scope.generalDate + $scope.generalTime + $scope.generalTheatre + $scope.generalHall + $scope.generalHallType);
            console.log($scope.rest_info_general);
            if ($scope.generalTheatre && $scope.generalHall && $scope.generalHallType && $scope.generalDate && $scope.generalTime && $scope.generalMovie) {
                //alert('mesa'); // kane kai validation pio swsto NaN??? lol to panw alert why?
                for (i = 0; i <= length; i++) {
                    console.log(id + ' ----------id');
                    console.log($scope.listName_Time.toString() + ' ----------aaaaaaaaa');
                    console.log($scope.rest_info_general[i][0].movie_play_fk + ' ----------aaaaaaaaa');
                    if (id == $scope.rest_info_general[i][0].hall_type_fk && $scope.rest_info_general[i][0].time_play == $scope.listName_Time.toString() && $scope.rest_info_general[i][0].movie_play_fk == $scope.listName_movie.toString() && $scope.rest_info_general[i][0].hall_name_fk == $scope.listName_hall.toString() && $scope.rest_info_general[i][0].date_play_fk == $scope.listName_date.toString() && isCheck_HT_S == false) {
                        console.log($scope.rest_info_general[i][0].time_play);
                        console.log('PASSSSSSSSSSSSS');
                        $q.all([$scope.promise(i), $scope.promise1(i)]).then(function(responses) {
                            //promise
                            $scope.SeatsSub = [];
                            $scope.SeatsSub = responses.map((resp) => resp.data);
                            $scope.indexSeatsSub = [];
                            for (i = 0; i < $scope.SeatsSub[0].length; i++) { //if no result DONT run
                                $scope.indexSeatsSub.push(parseInt($scope.SeatsSub[0][i].seatP));
                            }
                            console.log($scope.SeatsSub[0]);
                            console.log('----------1');
                            console.log($scope.SeatsSub[0].length);
                            console.log('----------2');
                            console.log($scope.SeatsSub);
                            console.log('----------3');
                            console.log($scope.indexSeatsSub);
                            console.log('----------4');
                            //promise 1
                            $scope.arraySeats = [];
                            $scope.arraySeats = responses.map((resp) => resp.data);
                            console.log('----------5');
                            console.log($scope.arraySeats);
                            console.log('----------6');
                            $scope.listName_S = [];
                            for (i = 1; i <= $scope.arraySeats[1][0].seatsAvailable; i++) {
                                $scope.listName_S.push(i);
                            }
                            console.log('----------7');
                            console.log($scope.listName_S);
                            console.log('----------8');
                            $scope.listName_S = $scope.listName_S
                                .filter(x => !$scope.indexSeatsSub.includes(x))
                                .concat($scope.indexSeatsSub.filter(x => !$scope.listName_S.includes(x)))
                            console.log($scope.listName_S);
                        })
                    }
                }
            }

            /*for (i=0; i<= length; i++){
        if (id == $scope.rest_info_general[i][0].hall_name_fk && isCheck_HT_S==false){ 
//generalTheatre booleans ACTIVATE pantou idio me to livBookingApp.js
        }
    }*/
        }
$scope.testwe=function(){
    console.log('duh');
    $scope.dd='ccccccccccccccccccccc';
}

$scope.changeTheme = function (colortheme){
    //console.log('works');
    //console.log($scope.colortheme);
    //$scope.colortheme='#000';
if(colortheme == '#18191A'){
    $scope.colortheme = '#FFF';
    //$scope.checkcolor();
      $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'color':$scope.colortheme,'action':'setcolor'}
            }).then(function(response) {
                console.log(response.data);
                console.log('changed to WHITE');
                console.log($scope.user_profile);
                console.log($scope.colortheme);
            })

} else if (colortheme == '#FFF') {
    $scope.colortheme = '#18191A';
    //$scope.checkcolor();
      $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'color':$scope.colortheme,'action':'setcolor'}
            }).then(function(response) {
                console.log(response.data);
                console.log('changed to DARK');
                console.log($scope.user_profile);
                console.log($scope.colortheme);
            })
}
 //else $scope.checkcolor();
}

$scope.checkcolor = function (){
    $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'action':'getcolor'}
            }).then(function(response) {
                //console.log(response.data);
                $scope.colortheme = response.data.toString();
                //document.body.style.background = "#AA0000";//$scope.colortheme;
               // console.log($scope.colortheme.toString());
            })
}
}]);
</script>