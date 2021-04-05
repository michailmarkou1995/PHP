<!DOCTYPE html>
<html lang="en">

<head>
<!-- Google Tag Manager-->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-xxxxxxxx');</script>
        <!-- End Google Tag Manager -->

        <!-- Primary Meta Tags -->
        <title>CineSocial</title>
        <meta charset="utf-8">
        <meta name="title" content="CineSocial">
        <meta name="description" content="Book and get Great Movies right now!">
        <meta name="google-site-verification" content="ID goes here you get it from Google Search Console Verification" />
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta http-equiv="onion-location" content="http://myexamjognehfweihje7gbzrewxee3vyu6ex37ukyvdw6jm66npakiyd.onion/" />
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://cinesocial.com">
        <meta property="og:title" content="cinesocial">
        <meta property="og:description" content="Book and get Great Movies right now!">
        <meta property="og:image" content="https://cinesocial.com//path//assets//img//archviz.jpg">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://cinesocial.com">
        <meta property="twitter:title" content="cinesocial">
        <meta property="twitter:description" content="Book and get Great Movies right now!">
        <meta property="twitter:image" content="https://cinesocial.com//path//assets//img//archviz.jpg">

        <!--The above is an illustration how to deploy proper Social Media sharing + Search Indexing SEO rankings-->
        
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Person",
        "name": "Michail Markou",
        "url": "https://<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Person",
        "name": "Michail Markou",
        "url": "cinesocial.com",
        "image": "https://scontent.fskg1-2.fna.fbcdn.net/v/t1.0-9/67603228_2838097346205647_8572879676299542528_o.jpg?_nc_cat=106&_nc_sid=174925&_nc_ohc=IadRgoGuMG0AX9prwxB&_nc_ht=scontent.fskg1-2.fna&oh=0fc41eea7e458bb1bc37b312ea612fd5&oe=5F70B16E",
        "sameAs": [
        "https://www.facebook.com/Jotun.Michael",
        "https://www.instagram.com/marcus.jotun",
        "https://www.youtube.com/user/NitrousUp",
        "https://www.linkedin.com/in/michail-markou-27393b168/",
        "https://www.artstation.com/michaeljotun",
        "https://github.com/JotunMichael",
        "https://michailkalinx.blogspot.com/"
        ]  
    }
    </script>

    <link rel="canonical" href="https://www.cinesocial.com" />
    <link rel='dns-prefetch' href='//ajax.googleapis.com' />
    <link rel="stylesheet" href="assets/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

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
    <footer><?php include("includes/footer.php"); ?></footer>

    <script src="assets/js/jquery-3.3.1.min.js "></script>
    <script src="assets/js/script.js "></script>
    <script src="assets/js/script-play.js "></script>
    
</body>

</html>