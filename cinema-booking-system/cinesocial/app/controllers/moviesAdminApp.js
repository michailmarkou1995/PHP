var moviesAdminApp = angular.module('crudMoviesApp', ['datatables']);

moviesAdminApp.directive("fileInput", function ($parse) {
     return {
          link: function ($scope, element, attrs) {
               element.on("change", function (event) {
                    var files = event.target.files;
                    console.log(files[0].name);
                    $parse(attrs.fileInput).assign($scope, element[0].files);
                    $scope.$apply();
               });
          }
     }
});

moviesAdminApp.controller('crudMoviesController', ['$scope', 'DTOptionsBuilder', '$http', function ($scope, DTOptionsBuilder, $http) {
     $scope.success = false;
     $scope.error = false;
     $scope.fetchData = function () {
          $http.get('../../models/fetch_data_movies.php').then(function (response) {
               $scope.namesData = response.data;
          });
     };

     $scope.uploadFile = function () {
          var form_data = new FormData();
          angular.forEach($scope.files, function (file) {
               form_data.append('file', file);
          });
          $http.post('upload.php', form_data,
               {
                    transformRequest: angular.identity,
                    headers: { 'Content-Type': undefined, 'Process-Data': false }
               }).then(function (response) {
                    $scope.select();
               });
     }
     $scope.select = function () {
          $http.get("select.php")
               .then(function (response) {
                    $scope.imagess = response.data;
               });
     }


     $scope.dtOptions = DTOptionsBuilder.newOptions()
          .withOption('stateSave', true)
          //.withPaginationType("simple_numbers")
          //.withDisplayLength(25)
          .withOption("retrieve", true)
          .withOption('order', [0, 'desc']);

     $scope.openModal = function () {
          var modal_popup = angular.element('#crudmodal');
          modal_popup.modal('show');
     };

     $scope.closeModal = function () {
          var modal_popup = angular.element('#crudmodal');
          modal_popup.modal('hide');
     };

     $scope.openModal1 = function () {
          var modal_popup = angular.element('#crudmodal1');
          modal_popup.modal('show');
     };

     $scope.closeModal1 = function () {
          var modal_popup = angular.element('#crudmodal1');
          modal_popup.modal('hide');
     };

     $scope.addData = function () {
          alert('This Feature is Under Development may not work as expected');
          $scope.modalTitle = 'Add Data';
          $scope.submit_button = 'Insert';
          $scope.openModal();

     };


     $scope.submitForm = function () {

          $http({
               method: "POST",
               url: "../../models/insert_movies.php",
               data: {
                    'movieTitle': $scope.movieTitle, 'movieGenre': $scope.movieGenre,
                    'movieDuration': $scope.movieDuration, 'movieRelDate': $scope.movieRelDate, 'movieDirector': $scope.movieDirector, 'movieActors': $scope.movieActors, 'urlPath': $scope.urlPath, 'action': $scope.submit_button, 'id': $scope.hidden_id
               }
          }).then(function (response) {

               if (response.data.error != '') {
                    $scope.success = false;
                    $scope.error = true;
                    $scope.errorMessage = response.data.error;
               }
               else {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = response.data.message;
                    $scope.form_data = {};
                    $scope.closeModal();
                    $scope.fetchData();
               }
          });
     };
     $scope.fetchSingleData = function (movieID) {
          alert('This Feature is Under Development may not work as expected');
          $http({
               method: "POST",
               url: "../../models/insert_movies.php",
               data: { 'id': movieID, 'action': 'fetch_single_data' }
          }).then(function (response) {
               $scope.movieTitle = response.data.movieTitle;
               $scope.movieGenre = response.data.movieGenre;
               $scope.movieDuration = response.data.movieDuration;
               $scope.movieRelDate = response.data.movieRelDate;
               $scope.movieDirector = response.data.movieDirector;
               $scope.movieActors = response.data.movieActors;
               $scope.urlPath = response.data.urlPath;
               $scope.hidden_id = movieID;
               $scope.modalTitle = 'Edit Data';
               $scope.submit_button = 'Edit';
               $scope.openModal();
          });
     };

     $scope.deleteData = function (movieID) {
          if (confirm("Are you sure you want to remove it?")) {
               $http({
                    method: "POST",
                    url: "../../models/insert_movies.php",
                    data: { 'id': movieID, 'action': 'Delete' }
               }).then(function (response) {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.successMessage = response.data.message;
                    $scope.fetchData();
               });
          }
     };
}]);