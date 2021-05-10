<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | File Upload Using AngularJS with PHP script</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <h3 align="center">File Upload Using AngularJS with PHP Script</h3><br />  
           <br />  
           <div class="container" ng-app="myapp" ng-controller="myController" ng-init="select()">  
                <div class="col-md-4">  
                     <input type="file" file-input="files" />  
                </div>  
                <div class="col-md-6">  
                     <button class="btn btn-info" ng-click="uploadFile()">Upload</button>  
                </div>  
                <div style="clear:both"></div>  
                <br /><br />  
                <div class="col-md-3" ng-repeat="image in images">  
                     <img ng-src="upload/{{image.name}}" width="200" height="200" style="padding:16px; border:1px solid #f1f1f1; margin:16px;" />  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 var app = angular.module("myapp", []);  
 app.directive("fileInput", function($parse){  
      return{  
           link: function($scope, element, attrs){  
                element.on("change", function(event){  
                     var files = event.target.files;  
                     //console.log(files[0].name);  
                     $parse(attrs.fileInput).assign($scope, element[0].files);  
                     $scope.$apply();  
                });  
           }  
      }  
 });  
 app.controller("myController", function($scope, $http){  
      $scope.uploadFile = function(){  
           var form_data = new FormData();  
           angular.forEach($scope.files, function(file){  
                form_data.append('file', file);  
           });  
           $http.post('upload.php', form_data,  
           {  
                transformRequest: angular.identity,  
                headers: {'Content-Type': undefined,'Process-Data': false}  
           }).success(function(response){  
                alert(response);  
                $scope.select();  
           });  
      }  
      $scope.select = function(){  
           $http.get("select.php")  
           .success(function(data){  
                $scope.images = data;  
           });  
      }  
 });  
 </script>  