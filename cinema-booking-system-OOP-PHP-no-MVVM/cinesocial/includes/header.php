<?php 
require_once 'includes/classes/User.php';
require_once 'includes/classes/Movies.php';
require_once 'moviesObj.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="navbar-brand"> <!-- make not clicable with same as below new classes css max min +++ make ICONS BOOK NOW also ena katw ap to allo!-->
    <a href="index.php">
        <h1 class="navbar-heading">CineSocial</h1>
    </a>
</div>
<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu m-hide-small">
            <li><a href="index.php">Home</a></li>
            <li><a href="schedule.php">Schedule</a></li>       
            <li><a href="contact-us.php">Contact</a></li>
            <li><a href="includes/handlers/logout.php"><?php
            echo $user['first_name'] . " " . $user['last_name'] . " Profile";
            ?>
            </a></li>
        </ul>

        <!--small nav bar /*humberger*/ --> 
        <ul class="navbar-menu1">
        <div id="myLinks">
        <a href="index.php">Home</a>
        <a href="schedule.php">Schedule</a>
        <a href="contact-us.php">Contact</a>
        <a href="includes/handlers/logout.php"><?php
            echo $user['first_name'] . " " . $user['last_name'] . " Profile";
            ?></a>
        </div>
        <!--style="background-color: #FFFFFF;" for inline css ahref-->
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
