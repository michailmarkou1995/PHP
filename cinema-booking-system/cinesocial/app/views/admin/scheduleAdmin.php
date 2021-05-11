<?php
require_once '../../../system/classes/Admin.php';
require_once '../../../system/classes/Booking.php';
require_once '../../../system/classes/Updatehandling.php';
$admincon = new Admin();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.4/angular-datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../web/css/bootstrap-4-5-2-modified.css">

    <script src="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


</head>

<body ng-app="crudScheduleApp" ng-controller="crudScheduleController" ng-init="fetchData()">
    <?php
    $bookTable = new Booking();
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
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                        <h2 style="color: #4547cf"><?php echo $bookTable->getMoviesNo() ?></h2>
                        <h3>Movies</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-building" style="background-color: blue"></i>
                        <h2 style="color: blue"><?php echo $bookTable->getTheatreNo() ?></h2>
                        <h3>Theatre</h3>
                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-calendar-alt" style="background-color: purple"></i>
                        <h2 style="color: purple"><?php echo $bookTable->getScheduleNo() ?></h2>
                        <h3>Schedules</h3>
                    </div>
                </div>

                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Step 1) Manage Theatre</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        <input placeholder="Name of Theater" type="text" name="tName" id="tName" required>
                        <input placeholder="Halls number" type="text" name="tHalls" id="tHalls" required>

                        <button type="submit" value="submit" name="submitTheatre" id="submitTheatre" class="form-btn">Create Theatre</button>
                    </form>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Step 2) Manage Halls</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        <select class="form-control" name="tName_fk" id="tName_fk" required>
                            <option value="" disabled selected>Name of Theatre</option>
                            <?php UpdateHandlings::getTheatreList(); ?>
                        </select>
                        <input placeholder="Hall Name" type="text" name="hallName" id="hallName" required>
                        <input placeholder="Hall Type" type="text" name="hallType" id="hallType" required>
                        <input placeholder="Number of Seats" type="text" name="seatsAvailable" id="seatsAvailable" required>

                        <button type="submit" value="submit" name="submitHall" id="submitHall" class="form-btn">Insert Hall</button>
                    </form>
                </div>

                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Step 3) Schedule Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        <input placeholder="Movie Play" type="text" name="movie_play_fk" id="movie_play_fk" required>
                        <input placeholder="date play" type="text" name="date_play_fk" id="date_play_fk" required>
                        <input placeholder="time play" type="text" name="time_play" id="time_play" required>
                        <input placeholder="Duration" type="text" name="duration_play_fk" id="duration_play_fk" required>
                        <input placeholder="Theatre Name" type="text" name="theatre_name_fk" id="theatre_name_fk" required>
                        <input placeholder="Hall Name" type="text" name="hall_name_fk" id="hall_name_fk" required>
                        <input placeholder="Hall Type" type="text" name="hall_type_fk" id="hall_type_fk" required>
                        <input placeholder="Movie Synopsis" type="text" name="movie_synopsis" id="movie_synopsis" required>

                        <button type="submit" value="submit" name="submitMActive" id="submitMActive" class="form-btn">Movie Active</button>
                        <?php
                        UpdateHandlings::addTheatre();
                        UpdateHandlings::addHalls();
                        UpdateHandlings::addScheduleMovies($admincon->getSessionUser());
                        ?>
                    </form>
                </div>
            </div>








            <div class="admin-section-panel">
                <div class="admin-panel-section-header">
                    <h2>All Schedules</h2>
                    <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                </div>
                <div class="admin-panel-section-content1" ng-init="fetchData()">

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
                    <div class="table-responsive" style="overflow-x: unset;">
                        <table datatable="ng" dt-options="dtOptions1" class="table table-striped table-bordered">
                            <p><b>Theatres Created below</b></p>
                            <thead>
                                <tr>
                                    <?php
                                    $sql0 = "DESCRIBE theatretable";
                                    $result0 = mysqli_query(User::getConS(), $sql0);
                                    while ($row = mysqli_fetch_array($result0)) {
                                        $fields0[] = $row['0'];
                                    }
                                    foreach ($fields0 as $value0) {
                                        echo '<th>' . $value0 . '</th>';
                                        echo "\r\n";
                                    }
                                    ?>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr ng-repeat="name in namesData">
                                    <?php
                                    $sql00 = "DESCRIBE theatretable";
                                    $result00 = mysqli_query(User::getConS(), $sql00);
                                    while ($row = mysqli_fetch_array($result00)) {
                                        $fields00[] = $row['0'];
                                    }
                                    foreach ($fields00 as $value00) {
                                        echo '<td>{{name.' . $value00 . '}}</td>';
                                        echo "\r\n";
                                    }
                                    ?>
                                    <td><button type="button" ng-click="deleteData(name.id)" class="btn btn-danger btn-xs">Delete</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="table-responsive" style="overflow-x: unset;">
                    <table datatable="ng" dt-options="dtOptions2" class="table table-striped table-bordered">
                        <thead>
                            <p><b>Halls Created below</b></p>
                            <tr>
                                <?php
                                $sql1 = "DESCRIBE hallstable";
                                $result1 = mysqli_query(User::getConS(), $sql1);
                                while ($row = mysqli_fetch_array($result1)) {
                                    $fields1[] = $row['0'];
                                }
                                foreach ($fields1 as $value1) {
                                    echo '<th>' . $value1 . '</th>';
                                    echo "\r\n";
                                }
                                ?>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr ng-repeat="name1 in namesDatahalltable">
                                <?php
                                $sql11 = "DESCRIBE hallstable";
                                $result11 = mysqli_query(User::getConS(), $sql11);
                                while ($row = mysqli_fetch_array($result11)) {
                                    $fields11[] = $row['0'];
                                }
                                foreach ($fields11 as $value11) {
                                    echo '<td>{{name1.' . $value11 . '}}</td>';
                                    echo "\r\n";
                                }
                                ?>
                                <td><button type="button" ng-click="deleteData1(name1.id)" class="btn btn-danger btn-xs">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="overflow-x: unset;">
                    <table datatable="ng" dt-options="dtOptions" class="table table-striped table-bordered">
                        <thead>
                            <p><b>Scheduled Movies Created below</b></p>
                            <tr>
                                <?php
                                $sql2 = "DESCRIBE scheduletable";
                                $result2 = mysqli_query(User::getConS(), $sql2);
                                while ($row = mysqli_fetch_array($result2)) {
                                    $fields2[] = $row['0'];
                                }
                                foreach ($fields2 as $value2) {
                                    echo '<th>' . $value2 . '</th>';
                                    echo "\r\n";
                                }
                                ?>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr ng-repeat="name2 in namesDataSchedule">
                                <?php
                                $sql22 = "DESCRIBE scheduletable";
                                $result22 = mysqli_query(User::getConS(), $sql22);
                                while ($row = mysqli_fetch_array($result22)) {
                                    $fields22[] = $row['0'];
                                }
                                foreach ($fields22 as $value22) {
                                    echo '<td>{{name2.' . $value22 . '}}</td>';
                                    echo "\r\n";
                                }
                                ?>
                                <td><button type="button" ng-click="deleteData2(name2.id, name2.date_play_fk)" class="btn btn-danger btn-xs">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>





            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <script src="../../../web/js/script.js "></script>
</body>

</html>

<script src="../../controllers/crudAdminScheduleApp.js"></script>