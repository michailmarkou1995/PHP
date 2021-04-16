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
        
        <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        <input placeholder="Title" type="text" name="movieTitle" required>
                        <input type="file" name="movieImg" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="form-btn">Add trailer</button>
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