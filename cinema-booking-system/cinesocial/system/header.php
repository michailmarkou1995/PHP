<?php 
require_once 'classes/User.php';
require_once 'classes/Movies.php';
require_once 'moviesObj.php';
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.4/angular-datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->

    <!-- <link rel="stylesheet" href="assets/css/bootstrap-4-5-2-modified.css"> -->

<div class="navbar-brand"> 
    <a href="home.php">
        <h1 class="navbar-heading">CineSocial</h1>
    </a>
</div>
<div class="navbar-container" >
    <nav class="navbar">
        <ul class="navbar-menu m-hide-small">
            <li><a href="home.php">Home</a></li>
            <li><a href="schedule.php">Schedule</a></li>       
            <li><a href="contact-us.php">Contact</a></li>
           <li><a href="profile.php">
           <?php
            echo $user['first_name'] . " " . $user['last_name'] . " Profile";
            ?>
            </a></li>
        </ul>

        <ul class="navbar-menu1">
        <div id="myLinks">
        <a href="home.php">Home</a>
        <a href="schedule.php">Schedule</a>
        <a href="contact-us.php">Contact</a>
        <a href="profile.php"><?php
            echo $user['first_name'] . " " . $user['last_name'] . " Profile";
            ?></a>
        </div>
        <a href ="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars fa-3x"></i>
            </a>
        </ul>
        <script>
        $(document).ready(function(){
          $("a.icon").hover(function(){
            $(this).css("background-color", "white");
            }, function(){
            $(this).css("transform", "scale(1)");
          });
        });
        </script>

        <script>
        $(document).ready(function(){
          $(".icon:after").click(function(){
            $(this).css("animation-play-state", "paused");         
          });
        });
        </script>
  </nav>
</div>
        <script>
        function myFunction() {
          var x = document.getElementById("myLinks");
          if (x.style.display === "block") {
            x.style.display = "none";
          } else {
            x.style.display = "block";
          }
        }
        </script>