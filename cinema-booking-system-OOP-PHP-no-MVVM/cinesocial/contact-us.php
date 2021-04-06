<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body>
<?php 
        include("includes/fheaderinfo.php");
        include("includes/header.php");
?>
    <header></header>
    <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48454.26034000993!2d22.91100785662127!3d40.62125236032583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a838f41428e0ed%3A0x9bae715b8d574a9!2zzpjOtc-Dz4POsc67zr_Ovc6vzrrOtw!5e0!3m2!1sel!2sgr!4v1616851370020!5m2!1sel!2sgr"" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Contact</h1>
            <p>Contact us here </p>
            <form action="" method="POST">
                <input placeholder="First Name" name="fName" required><br>
                <input placeholder="Last Name" name="lName" ><br>
                <input placeholder="E-mail Address" name="eMail" required><br>
                <textarea placeholder="Enter your message !" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit">Send your Message</button>
                <?php
                    $moviesTable->getFeedback();
                    ?>
            </form>
            
        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Address & Info</h1>
            <h3>Phone Numbers</h3>
            <p><a href="tel:1111111111">+30 1111111111</a><br>
                <a href="tel:2222222222">+30 2222222222</a></p>
            <h3>Address</h3>
            <p>Thessaloniki, Greece</p>
            <h3>E-mail</h3>
            <p><a href="mailto:cinesocial@cinesocial.com">cinesocial@cinesocial.com</a></p>
        </div>
    </div>
    <footer></footer>
    <script src="assets/js/jquery-3.3.1.min.js "></script>
    <script src="assets/js/owl.carousel.min.js "></script>
    <script src="assets/js/script.js "></script>
</body>

</html>