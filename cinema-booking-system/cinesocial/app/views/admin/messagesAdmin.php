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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.4/angular-datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../web/css/bootstrap-4-5-2-modified.css">

    <script src="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <style>
        table {
            table-layout: fixed;
        }

        td {
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
        }

        @media only screen and (max-width: 480px) {

            /* horizontal scrollbar for tables if mobile screen */
            .tablemobile {
                overflow-x: auto;
                display: block;
            }
        }
    </style>
</head>

<body ng-app="crudMessagesApp" ng-controller="crudMessagesController">
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
                        <i class="fas fa-envelope" style="background-color: #3cbb6c"></i>
                        <h2 style="color: #3cbb6c"><?php echo $bookTable->getMessageNo() ?></h2>
                        <h3>Messages</h3>
                    </div>
                </div>


                <div class="admin-section-panel-table">
                    <div class="admin-panel-section-header">
                        <h2>All Messages</h2>
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
                            <table datatable="ng" dt-options="vm.dtOptions" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <?php
                                        $sql = "DESCRIBE feedbacktable";
                                        $result = mysqli_query(User::getConS(), $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $fields[] = $row['0'];
                                        }
                                        foreach ($fields as $value) {
                                            echo '<th>' . $value . '</th>';
                                            echo "\r\n";
                                        }
                                        ?>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr ng-repeat="name in namesData">
                                        <?php
                                        $sql = "DESCRIBE feedbacktable";
                                        $result = mysqli_query(User::getConS(), $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $fields1[] = $row['0'];
                                        }
                                        foreach ($fields1 as $value) {
                                            echo '<td>{{name.' . $value . '}}</td>';
                                            echo "\r\n";
                                        }
                                        ?>
                                        <td><button type="button" ng-click="deleteData(name.msgID)" class="btn btn-danger btn-xs">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../../../web/js/script.js "></script>
</body>

</html>
<script src="../../controllers/crudMessagesApp.js"></script>