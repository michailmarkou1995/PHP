<?php
require_once '../includes/classes/Admin.php';
require_once '../includes/classes/Booking.php';
require_once '../includes/classes/Updatehandling.php';
$admincon = new Admin();//theli remove? include prev page?
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Trailer Setup</title>
    <link rel="icon" type="image/png" href="../assets/images/logo.png">
    <link rel="stylesheet" href="../assets/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
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
            <a href="../includes/handlers/logoutadmin.php">logout here</a>
            <img class="admin-user-avatar" src="../assets/images/avatar.png" alt="">
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
    
                <!--here populate with SEARCH FIELD -->
                <div class=" admin-section-panel3">
                <form action="" method="POST">
                        <input placeholder="Search Bookings" type="text" name="search-db" required>
                        <button type="submit" value="submit" name="submitSearch" class="form-btn">Search</button>
                        <button type="submit" value="submit" name="submitAll" class="form-btn">Show All</button>
                        <?php
                             //Admin::getResMsg(); just testing never mind
                        ?>
                    </form>
                    </div>
                </div>

                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Movies List</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        //$bookTable->handleBookings();
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
                        <input type="file" name="movieImgCover" accept="image/*">
                        </div>
                    
                        <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Preview Movie(down in front-page)</h2>             
                    </div>
                        <!--<label for="files">Select file</label>
                        <div><br>Movie Preview</div>-->
                        <input type="file" name="movieImgPrev" accept="image/*"><!--front-end check-->
                        </div>
                   
                        <button type="submit" value="submit" name="submitval" class="form-btn">Add Movie</button>
                        <?php
                            $bookTable->addMovie();
                        ?>
                    </form>
                </div>
            </div>
    <script src="../assets/js/jquery-3.3.1.min.js "></script>
    <script src="../assets/js/owl.carousel.min.js "></script>
    <script src="../assets/js/script.js "></script>
</body>

</html>