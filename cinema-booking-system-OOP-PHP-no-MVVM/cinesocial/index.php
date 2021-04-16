<!DOCTYPE html>
<html lang="en">

<?php
    include("meta.php");
?>

<body>
    <?php 
            include("includes/header.php"); 
            $sql = $moviesTable->getMovieTable();
    ?>
    <header></header>
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

    <script src="assets/js/jquery-3.3.1.min.js "></script>
    <script src="assets/js/script.js "></script>
    <script src="assets/js/script-play.js "></script>
    
</body>

</html>