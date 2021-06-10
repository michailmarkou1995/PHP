<!DOCTYPE html>
<?php
include("../../system/header.php");
include("../../system/meta.php");
$sql = $moviesTable->getMovieTable();
?>
<html lang="en" ng-app="crudUserBookingsApp" ng-controller="crudUserBookingsController" ng-init="user_profile='<?php echo $user['email']; ?>'">


<body ng-init="checkcolor()">


    <div id="home-section-1" class="movie-show-container">
        <h1>Currently Showing</h1>
        <h3>Book a movie now</h3>

        <div class="movies-container">

            <?php
            $moviesTable->getMovieList();
            ?>
        </div>
    </div>
    <div id="home-section-2" class="services-section">
        <h1>How it works</h1>
        <h3>3 Simple steps to book your favourite movie!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite movie</h2>
                <p>choose the movie you want to watch at our theaters</p>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Pay for your tickets</h2>
                <p>choose the movie you want to watch at our theaters</p>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Pick your seats & Enjoy watching</h2>
                <p>choose the movie you want to watch at our theaters</p>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>

    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title">Explore new movies</h1>
        <h3>Now showing</h3>
        <div class="trailers-grid">
            <?php $moviesTable->addTrailerFront(); ?>
        </div>
    </div>
    <footer></footer>

    <script src="../../web/js/script.js "></script>
    <script src="../../web/js/script-play.js "></script>

</body>

</html>
<script src="../controllers/crudUserBookingApp.js"></script>