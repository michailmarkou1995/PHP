<!DOCTYPE html>
<html lang="en">

<?php
require '../../system/header.php';
require '../../system/fheaderinfo.php';
//require '../../system/classes/Booking.php';
//require '../../system/moviesObj.php';
require '../../system/meta.php';
?>

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Contact Us</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
</head> -->

<body ng-app="crudUserBookingsApp1" ng-controller="crudUserBookingsController1" ng-init="user_profile='<?php echo $user['email']; ?>'">
<?php 
        
?>
    <header ></header>
    <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48454.26034000993!2d22.91100785662127!3d40.62125236032583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a838f41428e0ed%3A0x9bae715b8d574a9!2zzpjOtc-Dz4POsc67zr_Ovc6vzrrOtw!5e0!3m2!1sel!2sgr!4v1616851370020!5m2!1sel!2sgr" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    <div class="contact-us-container"ng-init="checkcolor()">
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
                    $moviesTable->getFeedback($user);
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
    <!-- <script src="assets/js/jquery-3.3.1.min.js "></script> -->
    <!-- <script src="assets/js/owl.carousel.min.js "></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../../web/js/script.js "></script>
</body>

</html>
<script>
 var userBookingsApp = angular.module('crudUserBookingsApp1', [
    'datatables', 
    ]);
    userBookingsApp.controller('crudUserBookingsController1', ['$scope', '$q', 'DTOptionsBuilder', 'DTColumnBuilder', 'DTColumnDefBuilder', '$http', function($scope, $q, DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder, $http) {

        $scope.changeTheme = function (colortheme){
    //console.log('works');
    //console.log($scope.colortheme);
    //$scope.colortheme='#000';
if(colortheme == '#18191A'){
    $scope.colortheme = '#FFF';
    //$scope.checkcolor();
      $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'color':$scope.colortheme,'action':'setcolor'}
            }).then(function(response) {
                console.log(response.data);
                console.log('changed to WHITE');
                console.log($scope.user_profile);
                console.log($scope.colortheme);
            })

} else if (colortheme == '#FFF') {
    $scope.colortheme = '#18191A';
    //$scope.checkcolor();
      $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'color':$scope.colortheme,'action':'setcolor'}
            }).then(function(response) {
                console.log(response.data);
                console.log('changed to DARK');
                console.log($scope.user_profile);
                console.log($scope.colortheme);
            })
}
 //else $scope.checkcolor();
}

$scope.checkcolor = function (){
    console.log('duh');
    $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'action':'getcolor'}
            }).then(function(response) {
                //console.log(response.data);
               $scope.colortheme = response.data.toString();
               document.body.style.background = $scope.colortheme;
               // console.log($scope.colortheme.toString());
            })
}

    }]);
</script>