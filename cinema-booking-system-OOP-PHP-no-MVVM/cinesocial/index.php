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
            <div class="trailers-grid-item">
                <img src="assets/images/movie-thumb-1.jpg" alt="Captain Marvel">
                <div class="trailer-item-info" data-video="Z1BCujX3pw8">
                    <h3>Captain Marvel</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="assets/images/movie-thumb-2.jpg" alt="Justice League 2021">
                <div class="trailer-item-info" data-video="vM-Bja2Gy04">
                    <h3>Justice League 2021</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="assets/images/movie-thumb-3.jpg" alt="Avengers infinity war">
                <div class="trailer-item-info" data-video="6ZfuNTqbHE8">
                    <h3>Avengers infinity war</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="assets/images/movie-thumb-4.jpg" alt="Avenger endgame">
                <div class="trailer-item-info" data-video="TcMBFSGVi1c">
                    <h3>Avenger endgame</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="assets/images/movie-thumb-5.jpg" alt="Inception">
                <div class="trailer-item-info" data-video="YoHD9XEInc0">
                    <h3>Inception</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="assets/images/movie-thumb-6.jpg" alt="Interstellar">
                <div class="trailer-item-info" data-video="zSWdZVtXT7E">
                    <h3>Interstellar</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>

    <script src="assets/js/jquery-3.3.1.min.js "></script>
    <script src="assets/js/script.js "></script>
    <script src="assets/js/script-play.js "></script>
    
</body>

</html>