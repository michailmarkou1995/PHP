<!DOCTYPE html>
<?php 
            include("../../system/header.php"); 
            include("../../system/meta.php");
            $sql = $moviesTable->getMovieTable();
    ?>
<html lang="en"  ng-app="crudUserBookingsApp1" ng-controller="crudUserBookingsController1" ng-init="user_profile='<?php echo $user['email']; ?>'">


<body   ng-init="checkcolor()">


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
<script>
 var userBookingsApp = angular.module('crudUserBookingsApp1', [
    'datatables', 
    ]);
    userBookingsApp.controller('crudUserBookingsController1', ['$scope', '$q', 'DTOptionsBuilder', 'DTColumnBuilder', 'DTColumnDefBuilder', '$http', function($scope, $q, DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder, $http) {
        $scope.colortheme='#18191A';
$scope.dd="bbbbbb";

$scope.checkcolor = function (){
    console.log('duh');
    $http({
                method: "POST",
                url: "../models/fetch_data_user_colortheme.php",
                data: {'user_profile':$scope.user_profile, 'action':'getcolor'}
            }).then(function(response) {
                //console.log(response.data);
               $scope.colortheme = response.data.toString();
               document.body.style.background = $scope.colortheme;//$scope.colortheme;
               // console.log($scope.colortheme.toString());
            }).catch(function(){alert('ll');})
}

    }]);
</script>