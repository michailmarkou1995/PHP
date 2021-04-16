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
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                        <h2 style="color: #cf4545"><?php echo $bookTable->getBookingNo() ?></h2>
                        <h3>Bookings</h3>
                    </div>
    
                <!--here populate with SEARCH FIELD -->
                <div class=" admin-section-panel3">
                <form action="" method="POST">
                        <input placeholder="Search Bookings" type="text" name="search-db" required>
                        <button type="submit" value="submit" name="submit" class="form-btn">Search</button>
                        <button type="submit" value="submit" name="submitShowAll" class="form-btn">Show All</button>
                        <?php
                             //Admin::getResMsg(); just testing never mind
                        ?>
                    </form>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Bookings  (recents first) Results</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        //$bookTable->handleBookings(); //add limit by scrolling? des social pws ekane o allos to site
                        $admincon->getSearch();
                        ?>
                    </div>
                </div>
                
    <script src="../assets/js/jquery-3.3.1.min.js "></script>
    <script src="../assets/js/owl.carousel.min.js "></script>
    <script src="../assets/js/script.js "></script>
</body>

</html>