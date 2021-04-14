<!DOCTYPE html>
<html lang="en">
<?php 
    require 'includes/classes/Booking.php';
    require 'moviesObj.php';
    $moviesTable->initBooking();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Book <?php $moviesTable->initMovieTitle(); ?> Now</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body style="background-color:#2676ab;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                    $moviesTable->initMovieImg();
                    ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php $moviesTable->initMovieTitle(); ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENGRE</td>
                        <td><?php $moviesTable->initMovieGenre(); ?></td>
                    </tr>
                    <tr>
                        <td>DURATION</td>
                        <td><?php $moviesTable->initMovieDuartion(); ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php $moviesTable->initMovieRelDate(); ?></td>
                    </tr>
                    <tr>
                        <td>DIRECTOR</td>
                        <td><?php $moviesTable->initMovieDirector(); ?></td>
                    </tr>
                    <tr>
                        <td>ACTORS</td>
                        <td><?php $moviesTable->initMovieActors(); ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="" method="POST">

                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall </option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3">June 12,2019</option>
                        <option value="13-3">June 13,2019</option>
                        <option value="14-3">June 14,2019</option>
                        <option value="15-3">June 15,2019</option>
                        <option value="16-3">June 16,2019</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>
                    <!--instead of hardcoreded SEAT NUMBER we could create admin Theatre Setup Seats availability methods so the hardcoded seats would be another 
                    function fetching the Seat deployed by admin but this is not supported in this project maybe in future
                    something like <option value="1" instead php code<option value=seatNumberByFunction and all the other hardcoded parameters as well-->
                    <?php $books= new Booking(); ?>
                    <select name="seat" required>
                       <option value="" disabled selected>Seat</option>
                        <option value="1" <?php if ($books->isReserved(1,$moviesTable->getMovieTitle())) echo "disabled" ?>>1 
                            <?php $books->getSeats(1,$moviesTable->getMovieTitle()); 
                        ?></option>
                        <option value="2" <?php if ($books->isReserved(2,$moviesTable->getMovieTitle())) echo "disabled" ?>>2 
                            <?php $books->getSeats(2,$moviesTable->getMovieTitle())
                        ?> </option>
                        <option value="3"<?php if ($books->isReserved(3,$moviesTable->getMovieTitle())) echo "disabled" ?>>3 
                            <?php $books->getSeats(3,$moviesTable->getMovieTitle())
                        ?></option>
                        <option value="4"<?php if ($books->isReserved(4,$moviesTable->getMovieTitle())) echo "disabled" ?>>4 
                            <?php $books->getSeats(4,$moviesTable->getMovieTitle())
                        ?></option>
                        <option value="5"<?php if ($books->isReserved(5,$moviesTable->getMovieTitle())) echo "disabled" ?>>5 
                            <?php $books->getSeats(5,$moviesTable->getMovieTitle())
                        ?></option>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName">

                    <input placeholder="Phone Number" type="text" name="pNumber" required>

                    <button type="submit" value="submit" name="submit" class="form-btn">Book a Seat</button>
                    <?php
                        $moviesTable->initMovieSubmit();
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.min.js "></script>
    <script src="assets/js/script.js "></script>
</body>

</html>
