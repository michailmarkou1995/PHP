<?php
require_once '../../../system/classes/Admin.php';
require_once '../../../system/classes/Booking.php';
require_once '../../../system/classes/Updatehandling.php';
$admincon = new Admin();//theli remove? include prev page?
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Trailer Setup</title>
    <link rel="icon" type="image/png" href="../../../web/images/logo.png">
    <link rel="stylesheet" href="../../../web/css/style-main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.4/angular-datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../web/css/bootstrap-4-5-2-modified.css">

    <script src="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    
</head>

<body ng-app="crudMoviesApp" ng-controller="crudMoviesController">
    <?php
    $bookTable = new Booking();
    ?>
    <div class="admin-section-header">
        <div class="admin-logo">
            CineSocial
        </div>
        <div class="admin-login-info">
            <a href="../../../system/handlers/logoutadmin.php">logout here</a>
            <img class="admin-user-avatar" src="../../../web/images/avatar.png" alt="">
        </div>
    </div>
    <div class="admin-container">
    <?php UpdateHandlings::getAdminSideBar(); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                <div class="admin-section-stats-panel">
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                        <h2 style="color: #4547cf"><?php echo $bookTable->getMoviesNo() ?></h2>
                        <h3>Movies</h3>
                    </div>
    
                <!--here populate with SEARCH FIELD -->
                <div class=" admin-section-panel3">
                <form action="" method="POST">
                        <input placeholder="Search Movies" type="text" name="search-db" required>
                        <button type="submit" value="submit" name="submitSearch" class="form-btn">Search</button>
                        <?php
                             //Admin::getResMsg(); just testing never mind
                        ?>
                    </form>
                    </div>
                </div>

                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Movies List</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <?php
                        //$bookTable->handleBookings();
                        ?>
                    </div>
                </div>
        
        <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Movies</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input placeholder="Title" type="text" name="movieTitle" required>
                        <input placeholder="Genre" type="text" name="movieGenre" required>
                        <input placeholder="Duration" type="number" name="movieDuration" required>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <input placeholder="Director" type="text" name="movieDirector" required>
                        <input placeholder="Actors" type="text" name="movieActors" required>
                        <input placeholder="youtube url end e.g. vM-Bja2Gy04" type="text" name="url" required>
                        
                    <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Cover Movie(up in front page)</h2>             
                    </div>
                        <!--<div>Movie Cover</div>-->
                        <input data-my-Directive type="file" name="movieImgCover" accept="image/*" required >
                        </div>
                    
                        <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>Preview Movie(down in front-page)</h2>             
                    </div>
                        <!--<label for="files">Select file</label>
                        <div><br>Movie Preview</div>-->
                        <input type="file" name="movieImgPrev" accept="image/*" required ><!--front-end check-->
                        </div>
                   
                        <button type="submit" value="submit" name="submitval" class="form-btn">Add Movie</button>
                        <?php
                            //$bookTable->addMovie();
                            UpdateHandlings::addMovie();
                        ?>
                    </form>
                </div>
            

            <div class="admin-section-panel">
                    <div class="admin-panel-section-header">
                        <h2>All Bookings</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
            <div class="admin-panel-section-content1" ng-init="fetchData()">
                    <?php //$bookTable->bookingTable(); ?> 
                    <div class="modal fade" tabindex="-1" role="dialog" id="crudmodal">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
      <form method="post" ng-submit="submitForm()" enctype="multipart/form-data">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title">{{modalTitle}}</h4>
         </div>
         <div class="modal-body">
          <div class="alert alert-danger alert-dismissible" ng-show="error" >
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{errorMessage}}
     </div>
         
     <div class="form-group">

     <!--<label>Enter Movie Name : {{selected}}</label>
     <select type="text" placeholder="Select a Movie" ng-model="selected" ng-options="opt for opt in movie_name" name="movie_name" ng-model="movie_name" class="form-control">
     </select>-->
    </div>
     <div class="form-group">
      <label>Enter Movie Name</label>
      <input type="text" name="movieTitle" ng-model="movieTitle" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter Genre</label>
      <input type="text" name="movieGenre" ng-model="movieGenre" class="form-control" />
     </div>
     <div class="form-group">
     <label>Theatres : {{selected}}</label>
     <select ng-model="selected" ng-options="opt as opt for opt in theatre"></select>
    </div>
     <div class="form-group">
      <label>Enter Duration</label>
      <input type="text" name="movieDuration" ng-model="movieDuration" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter movie release date</label>
      <input type="text" name="movieRelDate" ng-model="movieRelDate" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter movie director</label>
      <input type="text" name="movieDirector" ng-model="movieDirector" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter movie actors</label>
      <input type="text" name="movieActors" ng-model="movieActors" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter Url Path</label>
      <input type="text" name="urlPath" ng-model="urlPath" class="form-control" />
     </div>
    <!-- <div class="form-group">
      <label>Enter Image Cover</label>
      <input type="text" name="movieImgCover" ng-model="movieImgCover" class="form-control" />
     </div>
     <div class="form-group">
      <label>Enter Image Preview</label>
      <input type="text" name="movieImgPrev" ng-model="movieImgPrev" class="form-control" />
     </div>-->
     <div class="form-group">
      <label>Enter Image Cover</label>
     <input type="file" id="file" name="file" file-input="files" accept="image/*" required>
     </div>
     <div class="form-group">
      <label>Enter Image Preview</label>
     <input type="file" name="movieImgPrevicon" file-input="files1"  accept="image/*">
     </div>
         </div>
         <div class="modal-footer">
          <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
          <input type="submit" name="submit" id="submit" class="btn btn-info" value="{{submit_button}}" />
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </form>
     </div>
   </div>
</div>

<div align="right">
    <button type="button" name="add_button" ng-click="addData()" class="btn btn-success">Add</button>
   </div> 
                    <div class="table-responsive" style="overflow-x: unset;overflow: scroll"> 
        <table datatable="ng" dt-options="dtOptions" class="table table-striped table-bordered">  
             <thead>  
                  <tr>  
                       <th>movieID</th>
                       <th>movieTitle</th>  
                       <th>movieGenre</th>
                       <th>movieDuration</th> 
                       <th>movieRelDate</th>  
                       <th>movieDirector</th>  
                       <th>movieActors</th>
                       <th>urlPath</th>   
                       <th>Edit</th>
                       <th>Delete</th>
                  </tr>  
             </thead>  
             <tbody>
                    
                  <tr ng-repeat="name in namesData">  
                       <td>{{name.movieID}}</td> 
                       <td>{{name.movieTitle}}</td>  
                       <td>{{name.movieGenre}}</td>
                       <td>{{name.movieDuration}}</td>   
                       <td>{{name.movieRelDate}}</td> 
                       <td>{{name.movieDirector}}</td>  
                       <td>{{name.movieActors}}</td> 
                       <td>{{name.urlPath}}</td>  
                       <td><button type="button" ng-click="fetchSingleData(name.movieID)" class="btn btn-warning btn-xs">Edit</button></td>
                       <td><button type="button" ng-click="deleteData(name.movieID)" class="btn btn-danger btn-xs">Delete</button></td>  
                  </tr>  
                  </tbody>
                </table>  
    </div>  
    </div>   


                    </div>
                </div>
            <!--</div> -->
        </div><!--coll div -->
    </div>
    <div ng-repeat="name in namesData">{{name.movieTitle}}</div>
    <div class="col-md-4">  
                     <input type="file" file-input="files" />  
                </div>  
                <div class="col-md-6">  
                     <button class="btn btn-info" ng-click="uploadFile()">Upload</button>  
                </div>  
                <br /><br />  
                <div class="col-md-3" ng-repeat="imagee in imagess">  
                     <img ng-src="../assets/images/{{imagee.name}}" width="200" height="200" style="padding:16px; border:1px solid #f1f1f1; margin:16px;" />  
                </div>  
           </div>  
           <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>    <script src="../../../web/js/script.js "></script>
</body>

</html>
<script src="../../controllers/moviesAdminApp.js"></script>