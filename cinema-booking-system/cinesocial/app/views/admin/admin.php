<?php
require_once '../../../system/classes/Admin.php';
require_once '../../../system/classes/Booking.php';
require '../../../system/classes/Updatehandling.php';

$admincon = new Admin();
//echo $_SESSION['usernamea'] to $username ferni root apo database name login!
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../../../web/images/logo.png">
    <link rel="stylesheet" href="../../../web/css/style-main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>
    <?php
    $bookTable = new Booking();
    ?>
    <div class="admin-section-header">
        <div class="admin-logo">
            CineSocial
        </div>
        <div class="admin-login-info">
            <i class="far fa-bell admin-notification-button"></i>
            <i class="far fa-comment-alt"></i>
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
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                        <h2 style="color: #cf4545"><?php echo $bookTable->getBookingNo() ?></h2>
                        <h3>Bookings</h3>
                    </div>
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
                    <div class="admin-section-stats-panel" style="border: none">
                        <i class="fas fa-envelope" style="background-color: #3cbb6c"></i>
                        <h2 style="color: #3cbb6c"><?php echo $bookTable->getMessageNo() ?></h2>
                        <h3>Messages</h3>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Bookings (recents Last 5)</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        $bookTable->handleBookingsTop();
                        ?>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input placeholder="Title" type="text" name="movieTitle" required>
                        <input placeholder="Genre" type="text" name="movieGenre" required>
                        <input placeholder="Duration" type="number" name="movieDuration" required>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <input placeholder="Director" type="text" name="movieDirector" required>
                        <input placeholder="Actors" type="text" name="movieActors" required>
                        <input placeholder="youtube url end e.g. vM-Bja2Gy04" type="text" name="url" required>
                        
                    <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Cover Movie(up in front page)</h2>             
                    </div>
                        <!--<div>Movie Cover</div>-->
                        <input type="file" name="movieImgCover" accept="image/*" required >
                        </div>
                    
                        <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Preview Movie(down in front-page)</h2>             
                    </div>
                        <!--<label for="files">Select file</label>
                        <div><br>Movie Preview</div>-->
                        <input type="file" name="movieImgPrev" accept="image/*" required ><!--front-end check-->
                        </div>
                   
                        <button type="submit" value="submit" name="submitval" class="form-btn">Add Movie</button>
                        <?php
                            //$bookTable->addMovie();
                            UpdateHandlings::addMovie();
                        ?>
                    </form>
                </div>
            </div>
            <div class="admin-section-column">
            <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Portal instructions</h2>
                        <i class="fas fa-list-ol" style="background-color: #cf4545"></i>
                    </div>
                    <div style="color: red"><b>Admin portal is fully dynamic for Front-end page you can literraly manage from here EVERYTHING!</b></div>
                    <br>
                    <p>in</p> <div style="color: red">Add movies</div> <div>Sections you get a YouTube URL in Format of https://www.youtube.com/watch?v=Z1BCujX3pw8 AND you extract the v=Z1BCujX3pw8 part this is what you put in the Url field</div>
                </div>
                <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Schedule</h2>
                        <i class="fas fa-clock" style="background-color: #3cbb6c"></i>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel5">
                    <div class="admin-panel-section-header">
                        <h2>To-do List</h2>
                        <i class="fas fa-list-ol" style="background-color: #bb3c95"></i>
                    </div>
                    <div class="admin-panel-section-content"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../../../web/js/script.js "></script>
</body>

</html>