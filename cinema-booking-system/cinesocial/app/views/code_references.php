
           <?php 

/* $sql = "SHOW COLUMNS FROM movietable";
 $sql = "DESCRIBE movietable";
$result = mysqli_query(User::getConS(),$sql);
while($row = mysqli_fetch_array($result)){
$fields[] = $row['0'];
}
foreach ($fields as $value){  
echo 'column name is : '.$value.'-'; 
echo"<br>";  
echo"\r\n"; 
}  */

//show column names for loop or while counter i ++ to make th td filled with col names
?>

<?php
READ row and display each on each button ! below
$query = "SELECT date_fk FROM datetable ORDER BY id ASC";
$result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);

while($row =  mysqli_fetch_assoc($result)){
    echo '<button type="submit" class="schedule-item" value="submit" name="value">'. $row["date_fk"] .'</button>';
    }
        ?>



<?php

$query = "SELECT date_fk FROM datetable ORDER BY id ASC";
$result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);

while($row =  mysqli_fetch_assoc($result)){
    echo '<button type="submit" class="schedule-item" value="submit" name="'. $row["date_fk"] .'">'. $row["date_fk"] .'</button>';
    UpdateHandlings::$rows = $row;
    //$data[] = $row;
    }
    foreach (UpdateHandlings::$rows as $value)
    {
        echo $value;
    }
    foreach (UpdateHandlings::$rows as $key => $value)
    {
        echo "Key: $key; Value: $value\n";
    }
    echo UpdateHandlings::$rows["date_fk"];
    print_r(UpdateHandlings::$rows);



    if(isset($_POST[UpdateHandlings::$rows["date_fk"]]))
?>


TROPOS PU ME ARESI DOWN ta kani STORE !!!! enw ta panw methods krata to assoc array mono last value katw OLES 
<?php
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");
            $query = "SELECT date_fk FROM datetable ORDER BY id ASC";
            $statement = $connect->prepare($query);
    
            if($statement->execute())
            {
             while($row = $statement->fetch(PDO::FETCH_ASSOC))
             {
                echo '<button type="submit" class="schedule-item" value="submit" name="'. $row["date_fk"] .'">'. $row["date_fk"] .'</button>';
              $data[] = $row;
              UpdateHandlings::$rows=$data;
             }
            // print_r(UpdateHandlings::$rows);
            }
            print_r(UpdateHandlings::$rows);
            echo UpdateHandlings::$rows[0]['date_fk'];

?>
 if(isset($_POST[UpdateHandlings::$rows[0]['date_fk']]))


Either use COUNT in your MySQL query or do a SELECT * FROM table and do:

$result = mysql_query("SELECT * FROM table");
$rows = mysql_num_rows($result);
echo "There are " . $rows . " rows in my table.";

$cnt = mysql_num_rows(mysql_query("SELECT COUNT(1) FROM TABLE"));
echo $cnt;





$ii=0;

            $connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");
            $query = "SELECT date_fk FROM datetable ORDER BY id ASC";
            $statement = $connect->prepare($query);
    
            if($statement->execute())
            {
             while($row = $statement->fetch(PDO::FETCH_ASSOC))
             {
                echo '<button type="submit" class="schedule-item" value="submit" name="'. $row["date_fk"] .'">'. $row["date_fk"] .'</button>';
              $data[] = $row;
              UpdateHandlings::$rows=$data;
             }
            }
            $result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);
            while($rowd =  mysqli_fetch_array($result)){
                $ii++;
                
                }
                echo $ii;
            $ii-=3;
                ?>
 </form>

        </div>
        <div class="schedule-table">
            <table>
                <tr>
                    <th>SHOW</th>
                    <th>SCHEDULE IN CINEMA</th>
                </tr>
            <?php
                if(isset($_POST[UpdateHandlings::$rows[$ii]['date_fk']])
====================================================
<?php
public function getSearch() {
        if (isset($_POST['submit']))
        {
            $search = mysqli_real_escape_string(User::getConS(), $_POST['search-db']); //sql injection safe data type data
            $sql="SELECT * FROM bookingTable WHERE bookingFName LIKE '%$search%' OR bookingLName LIKE '%$search%' OR bookingLName LIKE '%$search%' OR bookingLName LIKE '%$search%'";
            $result = mysqli_query(User::getConS(), $sql);
            $queryResult = mysqli_num_rows($result);
            //echo "There are ". $queryResult." results!";
            self::$searchRes = "<div style='color:red;'><b>There are ". $queryResult." results!</b></div>"; //div in div letter specific change?
           // $this->getResMsg();
            Admin::getResMsg();
            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result))
                {
                    //var_dump($row);
                    //print_r($row);
                    //print json_encode($row);
                    //print implode(", ", $row);
                    //print join(',', $row);
                   // foreach ($row as $value) {
                   //     echo $value, "\n";
                   //     //echo "$key: $value\n";
                    //}
                    UpdateHandlings::getTicketsAdmin($row);
                }
            } else { echo 'There are no Results matching your Search';}
        }
    }
    public static function getResMsg(){
        echo self::$searchRes;
    }

    echo '<script>alert(\'test\');</script>';




    public static function addScheduleMovies(){
        if(isset($_POST['submitMActive'])){
            $insert_query = "INSERT INTO 
            scheduletable (  movie_play_fk,
                            date_play,
                            time_play,
                            duration_play_fk,
                            theatre_name_fk,
                            hall_type_fk,
                            movie_synopsis,
                            urlPath_fk,
                            admin_fk)
            VALUES (
                            'Captain Marvel',
                            '2021-04-01',
                            '09:00',
                            '245',
                            'test1',
                            'imax',
                            'aaaa',
                            'vM-Bja2Gy04',
                            'admin')";
                            $db=mysqli_connect("localhost", "root", "", "cinema_db");
            $resultsd1 = mysqli_query($db,$insert_query) or die(mysqli_error($db));
            //echo $resultsd1;
           // echo mysqli_error($resultsd1);
            //while ($row = mysqli_fetch_assoc($resultsd1))
           // {
           //    echo $row['movie_play_fk'];
          //  }
echo 'TESTTTTTTTTTTTTTT';
          // header("Location: scheduleAdmin.php?ScheduleSucceed");
          // echo '<meta http-equiv="refresh" content="0">';
        }
    }


    public static function addScheduleMovies(){
        /* if(isset($_POST['submitMActive'])){
             $insert_query = "INSERT INTO 
             scheduletable (  movie_play_fk,
                             date_play,
                             time_play,
                             duration_play_fk,
                             theatre_name_fk,
                             hall_type_fk,
                             movie_synopsis,
                             urlPath_fk,
                             admin_fk)
             VALUES (
                             '".$_POST["movie_play_fk"]."',
                             '".$_POST["date_play"]."',
                             '".$_POST["time_play"]."',
                             '".$_POST["duration_play_fk"]."',
                             '".$_POST["theatre_name_fk"]."',
                             '".$_POST["hall_type_fk"]."',
                             '".$_POST["movie_synopsis"]."',
                             '".$_POST[""]."',
                             '".$user["username"]."')";
                             $db=mysqli_connect("localhost", "root", "", "cinema_db");
             $resultsd1 = mysqli_query($db,$insert_query) or die(mysqli_error($db));
         
 
         }*/  echo $_POST["movie_play_fk"];
              echo $_POST[UpdateHandlings::getUrlPath("Captain Marvel", "test")]; // CORRECT
              echo $_POST["UpdateHandlings::getUrlPath(\"Captain Marvel\", \"test\")"];
              '".$_POST[UpdateHandlings::getUrlPath("Captain Marvel", "test")]."',
     }

     =========================================
     <div class="schedule-item" ng-repeat="(key, value) in namesDate">{{value}}</div>

===================================================
     <div id="save">Check</div>

<p>What I'm trying to accomplish is allow the user to save text that they've selected (highlighted) on the page with their cursor.</p>

$('#save').mousedown(function(){
   var selected_text = "";
   if (window.getSelection) {
        selected_text = window.getSelection();
   } else if (document.getSelection) {
        selected_text = document.getSelection();
   } else if (document.selection) {
        selected_text = document.selection.createRange().text; 
   }
   alert(selected_text)
});



<div id="save">What I'm trying to accomplish is allow the user to save text that they've selected (highlighted) on the page with their cursor.</div>


$('#save').click(function(){
    var selected_text = "";
    if (window.getSelection) {
         selected_text = window.getSelection();
    } else if (document.getSelection) {
         selected_text = document.getSelection();
    } else if (document.selection) {
         selected_text = document.selection.createRange().text; 
    }
    alert(selected_text)
 });


====================================================================
<div contenteditable="true">Make a selection in here and then press the button</div>
<div id="save" unselectable="on" class="unselectable"><img
    src="http://jsfiddle.net/img/logo.png" height="50" width="50"
    unselectable="on" /></div>
Selected text: <span id="selectedText"></span>

.unselectable {
    -khtml-user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

#selectedText {
    font-weight: bold;
}

$('#save').click(function() {
    var selected_text = window.getSelection ? 
        "" + window.getSelection() : document.selection.createRange().text;
    $("#selectedText").text(selected_text);
});

===================================================================

<?php
//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

    if($form_data->action)
    {
     $query = "SELECT * FROM scheduletable WHERE date_play='".$form_data->id."'";
     echo json_encode($form_data->id);
    /* $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row)
     {
     
     }
     //echo json_encode($output);
    } 
    echo json_encode($output);*/
}
?>
$scope.showData = function(value){
    //var element = angular.element($event.currentTarget);
//alert(value);
    //alert(element);
   $http({
    method:"POST",
    url:"fetch_scheduleTable.php",
    data:{'id':value, 'action':value}
   }).success(function(data){
       alert(data);
    $scope.success = true;
    $scope.error = false;
    $scope.successMessage = data.message;
    $scope.fetchData();
   });
 };
 <button type"submit" class="schedule-item" ng-repeat="(key, value) in namesDate" ng-model="namesDate[value]" ng-click="showData(value)" name="{{value}}" data-id={{value}}>{{value}}</button>
 ===================================================================
 $scope.showData = function(value){
    //var element = angular.element($event.currentTarget);
alert(value);
    //alert(element);
   $http({
    method:"POST",
    url:"fetch_scheduleTable.php",
    data:{'id':value, 'action':value}
   }).success(function(data){
     //  alert(data); THA EPISTRAFOUN edw ta DATA apo to fetch opws sto DATATABLES pu simplirwnis kai tah simplirwsis panw to VIEW mesa ap to ANGULARjs ta names me ena LOOP ola meta balta se CLASS prwta xima PHP me ANGULARjs EDW MESA !!!!!
     $scope.edw = data.date_play;
    alert(data.date_play);
    $scope.success = true;
    $scope.error = false;
    $scope.successMessage = data.message;
    $scope.fetchData();
   });
 };
 <?php
//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

    if($form_data->action)
    {
     $query = "SELECT * FROM scheduletable WHERE date_play='".$form_data->id."'";

     $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
     $output['date_play'] = $row['date_play'];
 }
     //echo json_encode($form_data->id);
    /* $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row)
     {
     
     }
     //echo json_encode($output);
    } 
    echo json_encode($output);*/
}echo json_encode($output);
?>



echo '{{nuk}}';
echo '{{edw}}';
                if(true)
                 {
                echo '<tr class="fade-scroll">
                    <td>
                        <h2>Captain Marvel</h2>
                        <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> IMAX
                        <h3>SYNOPSIS</h3>
                        <p>Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization
                        </p>
                        <div class="schedule-item"> Book Now edw name apo func ama available or reserverd all seats or not scheduled</a>
                        <div class="schedule-item"> DETAILS</a>
                        </div>
                    </td>
                    <td>
                        <div class="hall-type">
                            <h3>VIP Hall</h3>
                            <div>
                                <div class="schedule-item"><i class="far fa-clock"></i></div>
                                <div class="schedule-item">09:00 AM</div>
                                <div class="schedule-item">11:30 AM</div>
                                <div class="schedule-item">06:00 PM</div>
                            </div>
                        </div>
                        <div class="hall-type">
                            <h3>Main Hall</h3>
                            <div>
                                <div class="schedule-item"><i class="far fa-clock"></i></div>
                                <div class="schedule-item">09:00 AM</div>
                                <div class="schedule-item">11:30 AM</div>
                                <div class="schedule-item">06:00 PM</div>
                            </div>
                        </div>
                    </td>
                </tr>';
            }
                ?><!--apo edw fade scroll ksana opws panw-->
            </table>
        </div>


    </div>
    <footer></footer>
===================================================================
$scope.showData = function(value){
    //var element = angular.element($event.currentTarget);
alert(value);
    //alert(element);
   $http({
    method:"POST",
    url:"fetch_scheduleTable.php",
    data:{'id':value, 'action':value}
   }).success(function(data){
     //  alert(data); THA EPISTRAFOUN edw ta DATA apo to fetch opws sto DATATABLES pu simplirwnis kai tah simplirwsis panw to VIEW mesa ap to ANGULARjs ta names me ena LOOP ola meta balta se CLASS prwta xima PHP me ANGULARjs EDW MESA !!!!!

    //alert(data.times);
    alert(data); // <- this is HOW YOU DEBUG JSON!!!
    $scope.edw = data.date_play;
    $scope.edw1 = data.times;
    $scope.success = true;
    $scope.error = false;
    $scope.successMessage = data.message;
    $scope.fetchData();
   });
 };

 <?php
//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

    if($form_data->action)
    {
     $query = "SELECT count(*) FROM scheduletable WHERE date_play='".$form_data->id."'";
     $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
     $i=0;
    while(mysqli_fetch_array("SELECT count(*) FROM scheduletable WHERE date_play='".$form_data->id."'"))
    {
        $i++;
    }
     $output['date_play'] = $row['date_play'];
     $output['times'] = $i;
 }
     //echo json_encode($form_data->id);
    /* $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row)
     {
     
     }
     //echo json_encode($output);
    } 
    echo json_encode($output);*/
}echo json_encode($output);
?>

===================================================================
$result=mysql_query("SELECT count(*) as total from Students");
$data=mysql_fetch_assoc($result);
echo $data['total'];


$query1 = "SELECT count(*) as total FROM scheduletable";
$query1 = "SELECT count(*) as total FROM scheduletable WHERE date_play='".$form_data->id."'";
     $result2 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query1);
     $datas=mysqli_fetch_assoc($result2);
     $output['count'] = $datas['total'];



     <?php
//insert.php


$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

    if($form_data->action)
    {
     $query = "SELECT * FROM scheduletable WHERE date_play='".$form_data->id."'";

     $query1 = "SELECT count(*) as total FROM scheduletable WHERE date_play='".$form_data->id."'";
     $result2 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query1);
     $datas=mysqli_fetch_assoc($result2);
     $output['count'] = $datas['total'];

     $result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
    
 $i=1;
 while(mysqli_fetch_array($result1))
 {
     $i++;
 }

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();


 foreach($result as $row)
 {

     $output['date_play'] = $row['date_play'];
     $output['times'] = $i;
 }
     //echo json_encode($form_data->id);
    /* $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row)
     {
     
     }
     //echo json_encode($output);
    } 
    echo json_encode($output);*/
}echo json_encode($output);
?>



$scope.showData = function(value){
    //var element = angular.element($event.currentTarget);
alert(value);
    //alert(element);
   $http({
    method:"POST",
    url:"fetch_scheduleTable.php",
    data:{'id':value, 'action':value}
   }).success(function(data){
     //  alert(data); THA EPISTRAFOUN edw ta DATA apo to fetch opws sto DATATABLES pu simplirwnis kai tah simplirwsis panw to VIEW mesa ap to ANGULARjs ta names me ena LOOP ola meta balta se CLASS prwta xima PHP me ANGULARjs EDW MESA !!!!!

    //alert(data.times);
    alert(data); // <- this is HOW YOU DEBUG JSON!!!
    $scope.edw = data.date_play;
    $scope.edw1 = data.times;
    $scope.edw2 = data.count;
    $scope.success = true;
    $scope.error = false;
    $scope.successMessage = data.message;
    $scope.fetchData();
   });
 };


 <?php
 echo '{{nuk}}';
 echo '{{edw}}';
 echo '{{edw1}}';
 echo ' break ';
 echo '{{edw2}}';
 $test = '{{nuk}}';
 echo $test; tha treksi ksana meta sto view panw san refresh auto enw stin arxi exi null den emfanizi tipota meta tha emfanisi otan button pressed ap ton controller

 <div class="schedule-dates" ng-model="nuk=1">
 <button type"submit" class="schedule-item" ng-repeat="(key, value) in namesDate track by $index" ng-model="namesDate[value]" ng-click="showData(value)" name="{{value}}" data-id={{value}}>{{value}}</button>

 </div>

 ===================================================================
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
 $_POST = json_decode(file_get_contents('php://input'), true);

 var_dump($_POST);
 var_dump($_POST[$test2]);
 array(1) { ["2021-04-01"]=> string(10) "2021-04-01" } string(10) "2021-04-01" nnn
 if(isset($_POST[$test1]))


 if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
}
 ===================================================================
 <div ng-repeat="(key, value) in namesDates track by $index">
 <h1>h1</h1>
 <h2>h2</h2>
 <div>a</div>
 </div>
 ===================================================================
 $scope.showData = function(value){
    //var element = angular.element($event.currentTarget);
alert(value);
    //alert(element);
   $http({
    method:"POST",
    url:"fetch_scheduleTable.php",
    data:{'id':value, 'action':value}
   }).success(function(datar){
       <?php $result = UpdateHandlings::conDb("SELECT * FROM movieTable"); ?>
    $scope.ll=<?php
            echo "'fuck'";
        ?>;
        $scope.movie_name = [ 	<?php
        while($row = mysqli_fetch_array($result)) {
          echo "'"; echo $row['movieTitle']; echo "'"; echo ',';
        }
        echo "'lol'";
      ?>  ];
      //$scope.selectedOption = $scope.movie_name[1];
      
};
<div>{{ll}}</div>

$scope.ll=<?php
echo "\"<b>"; echo "'fuck'"; echo "</b>\"";        ?>;
$scope.ll='<b>{{edw}}</b>'; 

===================================================================
PWS BLEPIS JSON apo BACKEND sto FRONT END>?
{{infomov}} efoson $scope.infomov = datar; ta datar ine
.success(function(datar)

$query = "SELECT * FROM scheduletable WHERE date_play='".$form_data->id."'";
$i=1;
while(mysqli_fetch_array($result1))
{
    $i++;
}
if($form_data->action == '2021-04-01')
 {
   /* $queryF = "SELECT * FROM scheduletable WHERE date_play='".$form_data->action."'";
    $resultF = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$queryF);
    $output['timing'] =$resultF;*/

    $output['times'] = $i;
    $output['namara'] = "TEST IF WORKING";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();


 foreach($result as $row)
 {
    $output[] = $row;
    $output['movie_play_fk'] = $row['movie_play_fk'];
    $output['date_play'] = $row['date_play'];
    $output['time_play'] = $row['time_play'];
    $output['duration_play_fk'] = $row['duration_play_fk'];
    $output['theatre_name_fk'] = $row['theatre_name_fk'];
    $output['hall_name_fk'] = $row['hall_name_fk'];
    $output['hall_type_fk'] = $row['hall_type_fk'];
    $output['movie_synopsis'] = $row['movie_synopsis'];
    $output['press'] = true;
 }
}echo json_encode($output);
?>

sto output den xriazesai extra specific field afou ta ferni ola to json me basi to ONOMA sto DATABASE ara koita to! gia CLEAN UP

{{infomov[0][0]}} ap to prwto object? to 0
OR
{{infomov[0].id}}
{{infomov[0].movie_play_fk}}
{{infomov}}

<div ng-repeat="x in [].constructor(times-1) track by $index">
$scope.times = datar.times;

<div ng-repeat="info in infomov">
{{info.movie_play_fk}} <--- ETSI FTIAXNIS TABLE MORFI oxi pio VFX

return ena json kai kane times in nameData repeat? kai oxi x in i nester ng-repeat?

<div ng-repeat="x in [].constructor(times-1) track by $index">
{{infomov.movie_play_fk}}

<div ng-repeat="x in [].constructor(times-1) track by $index">
{{infomov[$index].movie_play_fk}}
{{infomov[$index].date_play}}
<!--{{namara}}-->
<!--{{movie_play_fk}} ferni latest 3 times thelo per movie ara key value array edw mou fainetai! oxi aplo REPEAT ara sto backend adjust theli auto! pws? kati me to output na ine [] kay value analogos-->

<tr data-ng-repeat="user in users">
     <td data-ng-repeat="column in columns">{{user[column.key]}}</td>
</tr>
===================================================================

DEBUG SQL ========== TO DIE katw katw
$insert_query = "INSERT INTO 
scheduletable (  movie_play_fk,
                date_play_fk,
                time_play,
                duration_play_fk,
                theatre_name_fk,
                hall_type_fk,
                movie_synopsis,
                urlPath_fk,
                admin_fk)
VALUES (
                '".$_POST["movie_play_fk"]."',
                '".$_POST["date_play_fk"]."',
                '".$_POST["time_play"]."',
                '".$_POST["duration_play_fk"]."',
                '".$_POST["theatre_name_fk"]."',
                '".$_POST["hall_type_fk"]."',
                '".$_POST["movie_synopsis"]."',
                '".UpdateHandlings::getUrlPath("Captain Marvel", "test")."',
                '".$user."')";
                $db=mysqli_connect("localhost", "root", "", "cinema_db");
$resultsd1 = mysqli_query($db,$insert_query) or die(mysqli_error($db));





$query = mysqli_query($con, "SELECT * FROM emails WHERE email='".$email."'");

    if (!$query)
    {
        die('Error: ' . mysqli_error($con));
    }

if(mysqli_num_rows($query) > 0){

    echo "email already exists";

}else{

    // do something

}




public static function addScheduleMovies($user){
    if(isset($_POST['submitMActive'])){

//query prwta gia check double egrafes wste no INSERT
$db=mysqli_connect("localhost", "root", "", "cinema_db");
$query = "SELECT * FROM datetable WHERE date_uniq='".$_POST["date_play_fk"]."'";
$resultt = mysqli_query($db,$query);
if(mysqli_num_rows($resultt) > 0){} else {

        $insert_query1 = "INSERT INTO datetable (date_uniq) VALUES ('".$_POST["date_play_fk"]."')";
        $db1=mysqli_connect("localhost", "root", "", "cinema_db");
        $resultsd0 = mysqli_query($db1,$insert_query1)  or die(mysqli_error($db1));
    }

        $insert_query = "INSERT INTO 
        scheduletable (  movie_play_fk,
                        date_play_fk,
                        time_play,
                        duration_play_fk,
                        theatre_name_fk,
                        hall_name_fk,
                        hall_type_fk,
                        movie_synopsis,
                        urlPath_fk,
                        admin_fk)
        VALUES (
                        '".$_POST["movie_play_fk"]."',
                        '".$_POST["date_play_fk"]."',
                        '".$_POST["time_play"]."',
                        '".$_POST["duration_play_fk"]."',
                        '".$_POST["theatre_name_fk"]."',
                        '".$_POST["hall_name_fk"]."',
                        '".$_POST["hall_type_fk"]."',
                        '".$_POST["movie_synopsis"]."',
                        '".UpdateHandlings::getUrlPath("Captain Marvel", "test")."',
                        '".$user."')";
                        $db=mysqli_connect("localhost", "root", "", "cinema_db");
        $resultsd1 = mysqli_query($db,$insert_query) or die(mysqli_error($db));

        header("Location: scheduleAdmin.php?ScheduledSuccess");
        echo '<meta http-equiv="refresh" content="0">';
       
    }        
}

==============================================================================
SELECT date_play_fk, COUNT(*) AS c FROM scheduletable GROUP BY date_play_fk HAVING c > 1 ORDER BY c DESC

SELECT date_play_fk, COUNT(*) AS c FROM scheduletable WHERE date_play_fk="2020-04-03" GROUP BY date_play_fk HAVING c > 1 ORDER BY c DESC
pws mporw px ama den ebaze o xristis DATE alla ixame to ID tis DATE based on that date na kanoume SQL QUERY?


date_play_fk  2021-04-16
c  2
ara EDW OXI COLUMNS result thes SEARCH tin TIMI sto c !!!

PWS PERNW to C pu ine 2 kai to kanw ekino COMPARE? or na kanw count per ROWS oxi sum COUNT


$db=mysqli_connect("localhost", "root", "", "cinema_db");
$queryz = "SELECT date_play_fk, COUNT(*) AS c FROM scheduletable WHERE date_play_fk='".$form_data->date."'";//ama pis select from date_play_fk where form id ine tade ferni FIELD sigkekrimeno esi omos thes all search gia sigouria cascade basika thes sigkekrimeni imeronia pu kanis delete ama exists again in the COLUMN
$resultt = mysqli_query($db,$queryz);
if(mysqli_num_rows($resultt) <= 1){  <--- pws to ROWS to kanw assoc array mhpws? gia to C na dw ama ine ti timi exi!
    $del_query = "DELETE FROM datetable WHERE date_uniq='".$form_data->date."'";
    $resultt = mysqli_query($db,$del_query) or die(mysqli_error($db));
} else {}
}



THE BELOW IS WRONG------------------------------------
$db=mysqli_connect("localhost", "root", "", "cinema_db");
$queryz = "SELECT date_play_fk, COUNT(*) AS c FROM scheduletable WHERE date_play_fk='".$form_data->date."'";//ama pis select from date_play_fk where form id ine tade ferni FIELD sigkekrimeno esi omos thes all search gia sigouria cascade basika thes sigkekrimeni imeronia pu kanis delete ama exists again in the COLUMN
$resultt = mysqli_query($db,$queryz);

while ($row = mysqli_fetch_assoc($resultt)){
if($row["c"] <= 1){
    $del_query = "DELETE FROM datetable WHERE date_uniq='".$form_data->date."'";
    $resultt = mysqli_query($db,$del_query) or die(mysqli_error($db));
} else {}}
}


$db=mysqli_connect("localhost", "root", "", "cinema_db");
$queryz = "SELECT date_play_fk, COUNT(*) AS totalD FROM scheduletable WHERE date_play_fk='".$form_data->date."'";//ama pis select from date_play_fk where form id ine tade ferni FIELD sigkekrimeno esi omos thes all search gia sigouria cascade basika thes sigkekrimeni imeronia pu kanis delete ama exists again in the COLUMN
$resultt = mysqli_query($db,$queryz);
$dataCount=mysqli_fetch_assoc($resultt); $output['stored']=$dataCount["totalD"];
echo $dataCount["totalD"];
alert(data2);

ETSI panw me echo $dataCount kanis OUTPUT to COUNT FIELD pu ksekina METRA apo 0
ti timi exi kai kapoio ALERT DATA2? sto angular? or not NECCESSARY giati exis HDH ECHO JSON ???!!!!! nai PREPEI kai ALERT pera ap to ECHO JSON !!! alert(data2);

PARAKATW EXW OLO TO PHP FILE

<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

if($form_data->action == 'Delete')
{
 $query = "
 DELETE FROM scheduletable WHERE id='".$form_data->id."'
 ";
 $statement = $connect->prepare($query);
 if($statement->execute())
 {
  $output['message'] = 'Data Deleted';
 }
 $db=mysqli_connect("localhost", "root", "", "cinema_db");
 $queryz = "SELECT date_play_fk, COUNT(*) AS totalD FROM scheduletable WHERE date_play_fk='".$form_data->date."'";//ama pis select from date_play_fk where form id ine tade ferni FIELD sigkekrimeno esi omos thes all search gia sigouria cascade basika thes sigkekrimeni imeronia pu kanis delete ama exists again in the COLUMN
 $resultt = mysqli_query($db,$queryz);
 $dataCount=mysqli_fetch_assoc($resultt); $output['stored']=$dataCount["totalD"];
 echo $dataCount["totalD"];
 if($dataCount["totalD"] == 0){
     $del_query = "DELETE FROM datetable WHERE date_uniq='".$form_data->date."'";
     $resultt = mysqli_query($db,$del_query) or die(mysqli_error($db));
 } else {}
}

echo json_encode($output);
?>
$scope.deleteData2 = function(id, date_play_fk){
    if(confirm("Are you sure you want to remove it?"))
    {
     $http({
      method:"POST",
      url:"delete_schedule_Active_Movies.php",
      data:{'date':date_play_fk, 'id':id, 'action':'Delete'}
     }).success(function(data2){
         alert(data2);
      $scope.success = true;
      $scope.error = false;
      $scope.successMessage = data2.message;
      $scope.fetchData();
     });
    }
   };
  }); 
  <tr ng-repeat="name2 in namesDataSchedule">  
  <?php 
        $sql22 = "DESCRIBE scheduletable";
        $result22 = mysqli_query(User::getConS(),$sql22);
        while($row = mysqli_fetch_array($result22)){
        $fields22[] = $row['0'];
        }
        foreach ($fields22 as $value22){  
        echo '<td>{{name2.'.$value22.'}}</td>';echo"\r\n"; 
        }
        ?>
       <td><button type="button" ng-click="deleteData2(name2.id, name2.date_play_fk)" class="btn btn-danger btn-xs">Delete</button></td>  
  </tr>  
  </tbody>
</table>  

PAKETO MAZI OLO PANW kani search count kai blepi ti count ine ama 0 simaini teleuta egrafi molis ginetai HDH DELETE ARA afairese KAI TO PARENT !!!! afou no more CHILD

210

You need to alias the aggregate using the as keyword in order to call it from mysql_fetch_assoc

$result=mysql_query("SELECT count(*) as total from Students");
$data=mysql_fetch_assoc($result);
echo $data['total'];

How to select all rows which have same value in some column

WHERE e1.phoneNumber = e2.phoneNumber 
AND e1.id != e2.id;

Update : for better performance and faster query its good to add e1 before *
SELECT * FROM employees e1, employees e2 

SELECT e1.* FROM employees e1, employees e2 
WHERE e1.phoneNumber = e2.phoneNumber 
AND e1.id != e2.id;

Select Column value based on two values in another column [closed]
select trip_id 
from stop_times 
where stop_id = 1538 
or stop_id = 1540
group by trip_id
having count(distinct stop_id) > 1;


How do I pass PHP variables to angular js?
in this example I am passing the PHP $something variable to angular

ng-init="something='<?php echo $something ?>'"
now from the controller do:

console.log($scope.something);
------------------------------------
==================================================
$scope.timi = <?php  echo '5';?>;
{{timi}}
mporis se controller PHP model-backend proccess alla den ine BEST-PRACTICE
==================================================
Want HTML form submit to do nothing

94

By using return false; in the JavaScript code that you call from the submit button, you can stop the form from submitting.

Basically, you need the following HTML:

<form onsubmit="myFunction(); return false;">
    <input type="submit" value="Submit">
</form>
Then the supporting JavaScript code:

<script language="javascript"><!--
    function myFunction() {
        // Do stuff
    }
//--></script>
If you desire, you can also have certain conditions allow the script to submit the form:

<form onSubmit="return myFunction();">
    <input type="submit" value="Submit">
</form>
Paired with:

<script language="JavaScript"><!--
    function myFunction() {
        // Do stuff
        if (condition)
            return true;

        return false;
    }
//--></script>


<form id="my_form" onsubmit="return false;">
is enough ...

==================================================
DEBUG BACKEND model DATA to FRONT END ... des datar panw search
//print_r($data); <--DEBUG to ALERT but ITS STOP WORKING the OUTPUT interupts somehow but this is TEMP way to SEE the RESULTS
$scope.namesDate = data;
alert($scope.namesDate); || alert(data);

alert($scope.namesData[0].theatre_name_fk); exi timi enw to $scope.list1 = data.theatre_name_fk; OXI
EPISIS AUTO LITOURGI
alert(data[0].theatre_name_fk); oxi auto alert($scope.namesDate); ine undefined

-----------------------------------------------
O PARAKATW KWDIKAS FERNI basika otan to kana pali RUN mono odeon EFERE LOL? oxi test3 aaa imoun se ali tainia! gia auto swsta trexi ferni oles egrafes!
ARRAY
{
    [0] => odeon
    [1] => test3
}
["odeon","test3"];


<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");
$form_data = json_decode(file_get_contents("php://input"));

//$data = array();

$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";

$result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
/*$i=0;
  while(mysqli_fetch_array($result1))
  {
      $i++;
  }
  if ($i >= 1){
      $data['isAvailable'] = true;
  } else  $data['isAvailable'] = false;
$data['name']=$form_data->movie_name;*/

$statement = $connect->prepare($query);
$statement->execute();//
$result = $statement->fetchAll();//

foreach($result as $row)
 {
  $data[] = $row['theatre_name_fk'];
 }
//print_r($data); //<--DEBUG to ALERT
/*if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;//array case with number to string months? return in json?
 }
 
 echo json_encode($data);
}*/print_r($data); //<--DEBUG to ALERT
echo json_encode($data);
?>

$scope.fetchData = function(){
    $http({
method:"POST",
url:"fetch_data_booking_view.php",
data:{'movie_name':$scope.movieTitle}
}).success(function(data){
$scope.isAvailable = data.isAvailable; 
$scope.namesData = data;
$scope.list1 = data.theatre_name_fk; // ferni katw me data sketo i data[0] alert($scope.list1[0]);
alert(data); //ferni
alert(data[0].theatre_name_fk); //den ferni me basi to panw
alert($scope.list1); //den ferni me basi to panw FERNI ama sti GRAMMI $scope.list1 = data.theatre_name_fk; exis $scope.list1 = data; $scope.list1 = data[0]; == me odeon
alert($scope.namesData[0].theatre_name_fk); //den ferni me basi to panw


ama den exw to print_r($data); apo undefined mou ferni apotelesmata sto katw ola ODEON swsta prwti egrafi
alert(data);
   alert(data[0].theatre_name_fk);
   alert($scope.list1[0].theatre_name_fk);
   alert($scope.namesData[0].theatre_name_fk);

   $statement = $connect->prepare($query);
$statement->execute();//
$result = $statement->fetchAll();//

foreach($result as $row)
 {
  $data[] = $row["theatre_name_fk"];
 }
 to parapanw perna ola ta theatre name se key value 0, 1 oxi me names why?
 $data["theatre_name_fk"] = $row["theatre_name_fk"];
 enw auto mono teleutaia egrafi ferni ! kai to pernis me to data[theatre name oxi me 0]
 basika psema data.theatre_name_fk !!!! ama den balis to name sta $data tote tha exis 0,1 OR name ap to DB sou!
 ng-app="liveBookingApp" ng-controller="liveBookingController" EXI SXESI PU TA BAZIS allios {{list1}} den tha bgali apotelesmata!


 ----------------------------------------------------(panw katw idia thema exoun ta dio --- apla grammes edw katw omos ine FULL ANSWER giati to ARRAY den epistrefi apo json backend me ena aplo data.theatre_play_fk theli kai ena [0] ine nested ara thes ng-repeat index)
 <div ng-repeat="(key, value) in namesData track by $index">{{namesData[$index].theatre_name_fk}}</div>
 $scope.namesData = data;
 <?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");
$form_data = json_decode(file_get_contents("php://input"));

//$data = array();

$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";

$result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
$i=0;
  while(mysqli_fetch_array($result1))
  {
      $i++;
  }
  if ($i >= 1){
      $data['isAvailable'] = true;
  } else  $data['isAvailable'] = false;
$data['name']=$form_data->movie_name;

$statement = $connect->prepare($query);
//$statement->execute();//
//$result = $statement->fetchAll();//

/*foreach($result as $row)
 {
  $data[] = $row["theatre_name_fk"];
 }*/
//print_r($data); //<--DEBUG to ALERT
if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;//array case with number to string months? return in json?
 }
 
 //echo json_encode($data);
}//print_r($data); //<--DEBUG to ALERT
echo json_encode($data);
?>
----------------------------------------------------

<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");
$form_data = json_decode(file_get_contents("php://input"));

//$data = array();

$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";

$result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
$i=0;
  while(mysqli_fetch_array($result1))
  {
      $i++;
  }
  if ($i >= 1){
      $data['isAvailable'] = true;
  } else  $data['isAvailable'] = false;
$data['name']=$form_data->movie_name;

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

    foreach($result as $row)
 {
  $data[] = $row;//array case with number to string months? return in json?
 }
echo json_encode($data);
?>
<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");
$form_data = json_decode(file_get_contents("php://input"));

//$data = array();

$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";

$result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
$i=0;
  while(mysqli_fetch_array($result1))
  {
      $i++;
  }
  if ($i >= 1){
      $data['isAvailable'] = true;
  } else  $data['isAvailable'] = false;
$data['name']=$form_data->movie_name;

$statement = $connect->prepare($query);
//$statement->execute();//
//$result = $statement->fetchAll();//

/*foreach($result as $row)
 {
  $data[] = $row["theatre_name_fk"];
 }*/
//print_r($data); //<--DEBUG to ALERT
if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;//array case with number to string months? return in json?
 }
 
 //echo json_encode($data);
}//print_r($data); //<--DEBUG to ALERT
echo json_encode($data);
?>
TA DIO PANW ISOUNTAI sto RESULT me allo tropo aplws
----------------------------------------------------
use ng-option:
<select ng-model="blah" ng-options="key as value for (key , value) in data"></select>
or use ng-repeat:
<select>
    <option ng-repeat="(key, value) in data" value="{{key}}">{{value}}</option>
</select>
data in controller:
$scope.data = {
    "key1": "val1",
    "key2": "val2",
    "key3": "val3",
    ...
};

to katw douleei xwris to list1[$index...] alla prepei swsto json !!!! me auti ti morfi allios to $index prepei na litourgisi kapws !
<select name="theatre_name" ng-model="theatre_name" ng-change="updateTheatre(theatre_name)" ng-options="key as value for (key , value) in list1 track by $index" required>
<option value="" disabled selected>THEATRE</option>
<option>{{list1[$index].theatre_name_fk}}</option>
</select>

gia SELECT/COMBO BOX piani mono to NG-OPTIONS oxi NG-REPEAT


<select name="theatre_name" ng-model="theatre_name" ng-change="updateTheatre(theatre_name)" ng-options="key as key.theatre_name_fk for key in list1 track by key.theatre_name_fk" required>
                        <option value="" disabled selected>THEATRE</option>
                    </select>
to katw isoutai me to panw

<select name="theatre_name" ng-model="theatre_name" ng-change="updateTheatre(theatre_name)" ng-options="key.theatre_name_fk for key in list1" required>
                        <option value="" disabled selected>THEATRE</option>
                    </select>

                    <pre>
                    {{list1 | json}}</pre> <---------- JSON FILTER
built-in not custom

$scope.datas = JSON.stringify($scope.list1[0].theatre_name_fk);
$scope.datas = JSON.stringify($scope.list1["isAvailable"]);


==================================================
------------------------------------------
SELECT on combobox
<div ng-app="App" >
 <div ng-controller="ctrl">
<select  ng-model="blisterPackTemplateSelected" ng-change="changedValue(blisterPackTemplateSelected)" 
     data-ng-options="blisterPackTemplate as blisterPackTemplate.name for blisterPackTemplate in blisterPackTemplates">
    <option value="">Select Account</option>
</select>
{{itemList}}     
  </div>       
</div>

var app=angular.module('App', []);

function ctrl($scope){
    $scope.itemList=[];
    $scope.blisterPackTemplates=[{id:1,name:"a"},{id:2,name:"b"},{id:3,name:"c"}]
        
    $scope.changedValue=function(item){
    $scope.itemList.push(item.name);
    }    
    
}
OR mine
$scope.updateTheatre = function (id) {
    alert("id =" + id);
    $scope.list2 = (id.theatre_name_fk);
 }
 $scope.list2=[]; OR  $scope.list2;
 <pre>{{list2}}</pre>
 
 <form ng-if="isAvailable == true">
 <select name="theatre_name" ng-model="theatre_name" ng-change="updateTheatre(theatre_name)" data-ng-options="key.theatre_name_fk for key in list1" required>
     <option value="" disabled selected>THEATRE</option>
 </select>
------------------------------------------
==================================================
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

<div ng-app="app" ng-controller="HomeController">
  <label>With Object</label>
  <select ng-model="selected" ng-options="key for (key, val) in objA[1]">
</select>

  <label>With Array</label>
  <select ng-model="selected" ng-options="item for item in objB[1]">
</select>
</div>
==================================================
BELOW it works if i change a select option TEXTFIELD UPDATES alla thelo kai SELECT/COMBO-BOX UPDATE oxi mono textfield
hi {{key.theatre_name_fk}} {{other}} {{list2}} hi

$scope.updateTheatre = function (id) {
    //alert("id =" + id);
    $scope.list2 = (id.theatre_name_fk);
    //$list1.hall_name_fk = "fuck";
    $scope.other=id.hall_name_fk;
    //$scope.list1 = id.hall_name_fk; breaks it the JSON removes all the data
 }
 <!-- <form action="" method="POST" ng-if="isAvailable == true"> -->
                    <form ng-if="isAvailable == true">
                    <select name="theatre_name" ng-model="theatre_name" ng-change="updateTheatre(theatre_name)" data-ng-options="key.theatre_name_fk for key in list1" required>
                        <option value="" disabled selected>THEATRE</option>
                    </select>

                    <select name="hall_name" ng-model="hall_name" ng-change="updateTheatre(hall_name)" ng-options="key.hall_name_fk for key in list1" required>
                    <option value="" disabled selected>HALL NAME</option>
                    </select>


                    $scope.updateTheatre = function (id) {
                        $http({
                       method:"POST",
                       url:"fetch_data_booking_view1.php",
                       data:{'movie_name':$scope.movieTitle}
                      }).success(function(data){
                       //$scope.list1 = data; <-- auto gia RE-RENDER
                       if (id.theatre_name_fk == "odeon"){
                       id = "text";
                       $scope.it = id;//object JSON bgazi
                    } else $scope.it = id;
                      })
                        //alert("id =" + id);
                        $scope.list2 = (id.theatre_name_fk);
                        //$list1.hall_name_fk = "fuck";
                        $scope.other=id.hall_name_fk;
                    
                        //id = event.target.id;
                        //$scope.theatre_name = "fuck";
                        //key.hall_name_fk =  $scope.other;
                        //$scope.list1 = id.hall_name_fk; breaks it the JSON removes all the data
                     }


                     $scope.updateTheatre = function (id) {
                        $http({
                       method:"POST",
                       url:"fetch_data_booking_view1.php",
                       data:{'movie_name':$scope.movieTitle}
                      }).success(function(data){
                       //$scope.list1 = data; <-- auto gia RE-RENDER
                       if (id.theatre_name_fk == "odeon"){
                       id = "text";
                       $scope.it = id.hall_name_fk;//object JSON bgazi
                    } else $scope.it = id;
                      })
                        //alert("id =" + id);
                        $scope.list2 = (id.theatre_name_fk);
                        //$list1.hall_name_fk = "fuck";
                        $scope.other=id.hall_name_fk;
                    
                        //id = event.target.id;
                        //$scope.theatre_name = "fuck";
                        //key.hall_name_fk =  $scope.other;
                        //$scope.list1 = id.hall_name_fk; breaks it the JSON removes all the data
                     }
                     </div><div ng-repeat="(key, value) in namesData track by $index">{{namesData[$index].theatre_name_fk}}</div>
            <div ng-repeat="(key, value) in list1 track by $index">{{list1[$index].theatre_name_fk}}</div>
            
            hi {{hall_name}} {{key.theatre_name_fk}} {{other}} {{list2}}  {{theatre_name}} {{it}}hi
            <pre>
            {{list1 | json}}</pre>


            <div class="booking-form-container" ng-model="movieTitle='<?php $moviesTable->initMovieTitle(); ?>'">
            <div ng-init="fetchData()" ng-if="isAvailable == false">We are really Sorry Movie Is Not Scheduled yet! </div>
               <!-- <form action="" method="POST" ng-if="isAvailable == true"> -->
                    <form ng-if="isAvailable == true">
                    <select ng-model="itt" ng-change="updateTheatre(theatre_name)" data-ng-options="key.theatre_name_fk for key in list1" required>
                        <option value="" disabled selected>THEATRE</option>
                       <!-- <option ng-selected="hall_name"></option> -->
                    </select>

                   <!-- <label>Check me to select: <input type="checkbox" ng-model="hall_name"></label><br/> -->

                    <select ng-model="hall_name_test" required>
                    <option value="" disabled selected>HALL NAME</option>
                    <option ng-selected="itt">{{itt.hall_name_fk}}</option>
                    </select>


                    <form ng-if="isAvailable == true">
                    <select ng-model="it" ng-change="updateTheatre(theatre_name)" data-ng-options="key.theatre_name_fk for key in list1" required>
                        <option value="" disabled selected>THEATRE</option>
                       <!-- <option ng-selected="hall_name"></option> -->
                    </select>

                    <label>Check me to select: <input type="checkbox" ng-model="hall_name"></label><br/>

                    <select name="hall_name_test" ng-model="hall_name_test" required>
                    <option value="" disabled selected>HALL NAME</option>
                    <option ng-selected="it">{{it}}</option>
                    </select>




                    <!-- <form action="" method="POST" ng-if="isAvailable == true"> -->
                    <form ng-if="isAvailable == true">
                    <select name="theatre_name" ng-model="theatre_name" ng-change="updateTheatre(theatre_name)" data-ng-options="key.theatre_name_fk for key in list1" required>
                        <option value="" disabled selected>THEATRE</option>
                       <!-- <option ng-selected="hall_name"></option> -->
                    </select>

                    <label>Check me to select: <input type="checkbox" ng-model="hall_name"></label><br/>

                    <select name="hall_name_test" ng-model="hall_name_test" ng-change="updateTheatreX(hall_name)" required>
                    <option value="" disabled selected>HALL NAME</option>
                    <option ng-selected="hall_name">test3</option>
                    </select>

                    <select name="hall_name" ng-model="hall_name" ng-change="updateTheatreX(hall_name)" data-ng-options="key.hall_name_fk for key in list1" required>
                    <option value="" disabled selected>HALL NAME</option>
                    <option ng-selected="hall_name">test3</option>
                    </select>

-------------SOS BELOW------------------
                     Angularjs: select not updating when ng-model is updated NO SULUTION above but getting close methods
MPOROUME MESA DATATABLES apla na perni DATAS apo KATEUTHAN ap to 1 TABLE SCHEDULETABLE me book button diaforetika thes seperate PINAKA OR data structure to filter out or ready function to filter out DUPLICATES
px anti auto katw 
$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";
na KANAME AUTO KATW!!!!!!!!!!!!!!
$query = "SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
    FROM scheduletable b
    WHERE movie_play_fk = 'Avengers ininity war'
 ) tbl
 WHERE num = 1";
NAI MPORW omos kani FILTER OUT ama idio BACK-end logic kai to IDIO THEATRO omos diaforetiko HALL NAME to kani filter auto to query ara theli IF statemens oxi se controller alla se MODEL!?

DIAFORETIKO QUERY per MODEL CALL PER FIELD !!!! DILADI to panw ine gia THEATRE NAME to katw GIA HALL NAME

$query = "SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY hall_name_fk ORDER BY id) as num
    FROM scheduletable b
    WHERE movie_play_fk = 'Avengers ininity war'
 ) tbl
 WHERE num = 1";

hall type etc MEXRI OLA TA FIELDS?(rows)?
$query = "SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY hall_type_fk ORDER BY id) as num
    FROM scheduletable b
    WHERE movie_play_fk = 'Avengers ininity war'
 ) tbl
 WHERE num = 1";
AUTO GIA UNIQUE EGRAFES DUPLICATE FILTER OUT

SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
    FROM scheduletable b
    WHERE theatre_name_fk = 'odeon'
  ) tbl
  WHERE num = 1

  SELECT * FROM 'scheduletable' WHERE theatre_name_fk='odeon' and movie_play_fk='Avengers ininity war'

  SELECT * FROM `scheduletable` WHERE theatre_name_fk='test3' and movie_play_fk='Avengers ininity war'

  $query = "SELECT * FROM 'scheduletable' WHERE theatre_name_fk='odeon' and movie_play_fk='".$form_data->movie_name."'";


SELECT * FROM (
   SELECT b.*,
   ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
   FROM scheduletable b
   WHERE theatre_name_fk = 'test3'
) tbl
WHERE num = 1

SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
    FROM scheduletable b
    WHERE movie_play_fk = 'Avengers ininity war'
 ) tbl
 WHERE num = 1


 ORIGINAL
 SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY BillID ORDER BY Lang) as num
    FROM Bills b
    WHERE Account = 'abcd'
 ) tbl
 WHERE num = 1
==================================================

HOW YOU REPEAT

</div><div ng-repeat="(key, value) in namesData track by $index">{{namesData[$index].theatre_name_fk}}</div>
<div ng-repeat="(key, value) in list1 track by $index">{{list1[$index].theatre_name_fk}}</div>
<div ng-repeat="name in AllData">{{name.theatre_name_fk}}</div>
<!-- ho {{hall_name}} ho ha{{key.theatre_name_fk}} ha he {{other}} he hr {{list2}} hr hh{{theatre_name}} hh hi {{it}} hi -->
{{list3}} s {{theatre_name_fks}} s 
<!--  <pre>
{{list1 | json}}</pre> -->


<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$query = "SELECT * FROM scheduletable ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>
==================================================
JOIN

SELECT scheduletable.theatre_name_fk, hallstable.seatsAvailable
FROM scheduletable
LEFT JOIN hallstable ON scheduletable.theatre_name_fk = hallstable.tName_fk;


SELECT scheduletable.theatre_name_fk, scheduletable.movie_play_fk, hallstable.seatsAvailable
FROM scheduletable
LEFT JOIN hallstable ON scheduletable.theatre_name_fk = hallstable.tName_fk
WHERE scheduletable.movie_play_fk = 'Avengers infinity war';

SELECT scheduletable.theatre_name_fk, scheduletable.movie_play_fk, hallstable.seatsAvailable
FROM scheduletable
INNER JOIN hallstable ON scheduletable.theatre_name_fk = hallstable.tName_fk
WHERE scheduletable.movie_play_fk = 'Avengers infinity war';

SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk

SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk

SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='Avengers infinity war';

'ANTI ROW NUMBER REMOVE DUPLICATE kanis ENA DISTICT STO JOIN !!! des katw amesa ama thes PIO SPECIFIC na sou emfanizi me diaforetika oraria imerominies ta bazis kai auta mesa px des katw' to prwto amesos katw ferni pio accurate results gia ta schedules ap oti to deutero me ligotera FIELDS !!!! diladi kanis ROW NUMBER OVER PARTITION + JOIN me SKETO JOIN xaris to DISTINCT!!!!

'SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='Avengers infinity war';'

'SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='Avengers infinity war';'

SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='Avengers infinity war' AND a.theatre_name_fk='test3';

SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='Avengers infinity war' AND a.theatre_name_fk='test3' AND a.hall_name_fk='vip artemis' AND a.date_play_fk='2021-04-02' AND a.hall_type_fk='imax' AND a.time_play='14:00'; <-- 'MAKE VERY DISTICNT'


//PROSOXI to katw SWSTO omos prepei na skeftis sto comboBOX ti checks tha kanis ti uniquity tha pernis kai analoga prosthetis i AFAIRIS FIELDS apo to parakatw QUERY!
$query = "SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='".$form_data->movie_name."' AND a.theatre_name_fk='".$form_data->theatre_n."'";

-----------------------------------
//JOIN
$query = "SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk AND a.hall_name_fk = b.hallName
WHERE a.movie_play_fk='".$form_data->movie_name."' AND a.theatre_name_fk='".$form_data->theatre_n."' AND a.hall_name_fk='".$form_data->hall_name_n."' AND a.date_play_fk='".$form_data->date_play_n."' AND a.hall_type_fk='".$form_data->hall_type_n."' AND a.time_play='".$form_data->time_play_n."'";

if (id.theatre_name_fk == $scope.list1[i].theatre_name_fk && f==false) {
    // $scope.listHall = $scope.list1[i].hall_name_fk;
     $http({
    method:"POST",
    url:"fetch_data_booking_view_seats.php",
    data:{'movie_name':$scope.movieTitle, 'theatre_n':$scope.list1[i].theatre_name_fk, 'hall_name_n':$scope.list1[i].hall_name_fk, 'date_play_n':$scope.list1[i].date_play_fk, 'hall_type_n':$scope.list1[i].hall_type_fk, 'time_play_n':$scope.list1[i].time_play}
   }).success(function(data){
       f=true;
    $scope.list7 = data; //.time_play?
    $scope.listSeats="";
   })
 }

 SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk
WHERE a.movie_play_fk='Avengers infinity war' AND a.theatre_name_fk='test3' AND a.hall_name_fk='main-hall artemis-test' AND a.date_play_fk='2021-04-16' AND a.hall_type_fk='imax' AND a.time_play='13:00'

SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk AND a.hall_name_fk = b.hallName
WHERE a.movie_play_fk='Avengers infinity war' AND a.theatre_name_fk='test3' AND a.hall_name_fk='main-hall artemis-test' AND a.date_play_fk='2021-04-16' AND a.hall_type_fk='imax' AND a.time_play='13:00'
-----------------------------------------
$query = "SELECT * FROM (
    SELECT b.*,
    ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) as num
    FROM scheduletable b
    WHERE movie_play_fk = '".$form_data->movie_name."' AND theatre_name_fk='".$form_data->theatre_n."'
  ) tbl
  WHERE num = 1";

WRONG SOMETHING BELOW MIX OF JOIN + UNIQUE
SELECT scheduletable.theatre_name_fk, scheduletable.movie_play_fk, hallstable.seatsAvailable
FROM (SELECT b.*, ROW_NUMBER() OVER (PARTITION BY scheduletable.theatre_name_fk ORDER BY id)
      AS num
      FROM scheduletable b
LEFT JOIN hallstable ON scheduletable.theatre_name_fk = hallstable.tName_fk
WHERE scheduletable.movie_play_fk = 'Avengers infinity war'
      ) tbl WHERE num = 1;

      SELECT scheduletable.theatre_name_fk, scheduletable.movie_play_fk, hallstable.seatsAvailable FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) as num
        FROM scheduletable b
        WHERE movie_play_fk = 'Avengers infinity war'
      ) tbl
      INNER JOIN hallstable ON scheduletable.theatre_name_fk = hallstable.tName_fk
      WHERE scheduletable.movie_play_fk = 'Avengers infinity war' AND num = 1;

==================================================
INSERT HTML me PHP ECHO or JAVASCRIPT inner HTML OR apla kane ARRAY me - MINUS ap to seat BOOKED ALREADY !!!!
document.getElementById('tag-id').innerHTML = '<ol><li>html data</li></ol>';


SELECT seatP 
FROM  bookingtable
WHERE movieName_fk = 'Avengers infinity war' AND bookingTheatre_fk='test3' AND bookingType_fk='imax' AND bookingTheatreHall_fk='main-hall artemis-test' AND bookingDate_fk='2021-04-16' AND bookingTime_fk='13:00'

==================================================
SPLICE SLICE SPLIT

REMOVE DUPS ARRAY MERGE(ADD) and then REMOVE duplicates

For a symmetric difference, you can do:

    let difference = arr1
                     .filter(x => !arr2.includes(x))
                     .concat(arr2.filter(x => !arr1.includes(x)));

                     Difference

let difference = arr1.filter(x => !arr2.includes(x));

There is a better way using ES7:

Intersection

 let intersection = arr1.filter(x => arr2.includes(x));



$scope.indexSeatsSub=[];

$scope.listHall = hall_name_is.hall_name_fk;
for (i=0; i<= length; i++){   
    if ($scope.listHall == $scope.list_HN_2[i].hall_name_fk && isCheck_HN_seats==false){
// prepei na to kanw feed otan ta paidia simplirwthoun! giati perni times xwris na xw epileksi wres + DATE telos panton prospatha etsi esto to DATA structure na to kanis!
        $http({
            method:"POST",
            url:"model/fetch_data_booking_view_seats_available.php",
            data:{'movie_name':$scope.movieTitle, 'theatre_n':$scope.list_HN_2[i].theatre_name_fk, 'hall_name_n':$scope.list_HN_2[i].hall_name_fk, 'date_play_n':$scope.list_HN_2[i].date_play_fk, 'hall_type_n':$scope.list_HN_2[i].hall_type_fk, 'time_play_n':$scope.list_HN_2[i].time_play}
            }).then(function(response){
                $scope.SeatsSub=response.data;
                $scope.indexSeatsSub=[];
                for(i=0;i<$scope.SeatsSub.length; i++)
                {
                    $scope.indexSeatsSub.push(parseInt($scope.SeatsSub[i].seatP));
                }
            })

        $http({
        method:"POST",
        url:"model/fetch_data_booking_view_seats.php",
        data:{'movie_name':$scope.movieTitle, 'theatre_n':$scope.list_HN_2[i].theatre_name_fk, 'hall_name_n':$scope.list_HN_2[i].hall_name_fk, 'date_play_n':$scope.list_HN_2[i].date_play_fk, 'hall_type_n':$scope.list_HN_2[i].hall_type_fk, 'time_play_n':$scope.list_HN_2[i].time_play}
        }).then(function(response){
            isCheck_HN=true;
            $scope.arraySeats=[];
            $scope.arraySeats = parseInt(response.data[0].seatsAvailable);
            $scope.list_S_6=[];
            for (i=1; i<=$scope.arraySeats; i++)
            {
                $scope.list_S_6.push(i);
            }
            $scope.indexSeatsSub;
            //var names 
           $scope.testing = $scope.list_S_6.concat($scope.list_S_6, $scope.indexSeatsSub);

            $scope.uniqueNames = [];
            $.each($scope.testing, function(i, el){
            if($.inArray(el, $scope.uniqueNames) === -1) $scope.uniqueNames.push(el);
            });         
            $scope.listSeats="";
        })
    }
    if ($scope.listHall == $scope.list_HN_2[i].hall_name_fk && isCheck_HN_dates==false){

        c {{listName}} {{listHall}} {{listDate}} {{listHallType}} {{listTimePlay}} {{listSeats}}c {{movieTitle}} {{first_name}} {{ttest}} {{emailUser}} {{SeatsSub}} {{list_S_6}} {{indexSeatsSub}} {{testing}} {{uniqueNames}} {{difference}}

        $scope.difference = $scope.list_S_6
                 .filter(x => !$scope.indexSeatsSub.includes(x))
                 .concat($scope.indexSeatsSub.filter(x => !$scope.list_S_6.includes(x)));     
        $scope.list_S_6 = $scope.list_S_6
        .filter(x => !$scope.indexSeatsSub.includes(x))
        .concat($scope.indexSeatsSub.filter(x => !$scope.list_S_6.includes(x)));       
==================================================
HOW TO DEBUG alerts

$scope.updateDate = function (id){
    $scope.listDate = id.date_play_fk;

    var length = Object.keys($scope.list_D_3).length -1;
    var isCheck_DP_seats=0;
    var isCheck_DP_dates=0;
    alert($scope.list_D_3[0].date_play_fk); <---HERE
    alert($scope.list_HN_2[0].hall_name_fk);
    var isCheck_DP_HT=0;
    var isCheck_DP_TP=0;
    $scope.listHall = hall_name_is.hall_name_fk;
    for (i=0; i<= length; i++){   
        if ($scope.listDate == $scope.list_D_3[i].date_play_fk && isCheck_DP_dates==false){
            alert("trexi");
            $http({
                method:"POST",
                url:"model/fetch_data_booking_view_time_play1.php",
                data:{'movie_name':$scope.movieTitle, 'theatre_n':$scope.list_HN_2[i].theatre_name_fk, 'hall_name_n':$scope.list_HN_2[i].hall_name_fk}
                }).then(function(response){
                    alert("mpike suces");
                    isCheck_DP_dates=true;
                    $scope.list_TP_5 = response.data;
                    $scope.listTimePlay="";
                })
        }
    }
}
==================================================
  //$scope.movie_name = response.data.movie_name;
   //$scope.list_Movie = response.data[0].movie_name;
   $scope.list_Movie = response.data;
   console.log(response.data);

   $output[]['movie_name'] = $row['movieName_fk'];


   $scope.movie_name = response.data.movie_name;

   <label>Enter Movie Name</label>
      //for one value no ng-repeat ng-optins is ok but in proper JSON DATA output !!! otherwise UNDEFINED !!!
      <select class="form-control" ng-model="movie_name" required>
                    <option value="" disabled selected>Movies</option>
                    <option value="{{movie_name}}" >{{movie_name}}</option>
                    </select>
     </div>




     $scope.addData = function(){
        $q.all([ $http({
       method:"POST",
       url:"insert_bookings.php",
       data:{'action':'pre_add_Data'}
      }).then(function(response){alert('1');$scope.movie_name = [];
      $scope.movie_name = {0:{key1: response.data}};})])
       .then(function(response){ 


        The ng-selected directive takes a boolean value or an expression which leads to a true/false boolean result.

You just need to pass its value true to make it work or an expression which leads to true.

It has nothing to do with ng-model of <select> tag.

Following is an example of this behaviour:

<select name="quarter" ng-model="Quarter" >
    <option value="1" >Q1</option>
    <option value="2" ng-selected="true">Q2</option>
    <option value="3">Q3</option>
    <option value="4">Q4</option>
</select>
This will make option Q2 selected by default.
==================================================
MULTI DIMENSIONAL ARRAYS javascript and PHP

if($form_data->action == 'pre_add_Data'){
    $query = "SELECT * FROM (
          SELECT b.*,
          ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
          FROM scheduletable b
        ) tbl
        WHERE num = 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
      $output['movies_l'][] = array($row['movie_play_fk']);
      $output[] = $row['movie_play_fk'];   
    }
    $query = "SELECT * FROM (
          SELECT b.*,
          ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
          FROM scheduletable b
        ) tbl
        WHERE num = 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
      $output['theatre_l'][] = array("test" => $row['theatre_name_fk']);;  //bgale to key edw an kai me key pws PROSPELASI?
    }
}

$scope.movie_name = {};
$scope.movie_name =  response.data;
//$scope.movie_name =  {0:{key1:response.data}};
console.log(response.data);
console.log($scope.movie_name);
$scope.theatre_name = {};
$scope.theatre_name =  response.data;


$scope.movie_name = {};
$scope.movie_name =  response.data['movies_l'];
//$scope.movie_name =  {0:{key1:response.data}};
console.log(response.data);
console.log($scope.movie_name);
$scope.theatre_name = {};
$scope.theatre_name =  response.data['theatre_l'];
console.log($scope.theatre_name);


).then(function(response){
    if(data.error != '')
    {
     $scope.success = false;
     $scope.error = true;
     $scope.errorMessage = response.data.error;
    }
    else
    {
     $scope.success = true;
     $scope.error = false;
     $scope.successMessage = response.data.message;
     $scope.form_data = {};
     $scope.closeModal();
     $scope.fetchData();
    }
   }).catch(function(){console.log($scope.theatre);alert($scope.theatre);});// to bgazi san STRING oxi ["odeon"]!
  };
  =============================================
  OTAN PATAS EDIT thes ALL THEATRE OPTIONS kai movies oxi specific fetch ara gia ekino to select tha balis IDIO NG-OPTIONS KATW exw OLD kai pio KATW NEW PLAYLABLE

  $scope.addData = function(){
    $http({
   method:"POST",
   url:"insert_bookings.php",
   data:{'action':'pre_add_Data'}
  })
   .then(function(response){ 
    $scope.movie_name = {};
  $scope.movie_name =  response.data['movies_l'];
  //$scope.movie_name =  {0:{key1:response.data}};
  console.log(response.data);
  console.log($scope.movie_name);
  $scope.theatre_name = {};
  $scope.theatre_name =  response.data['theatre_l'];
  console.log($scope.theatre_name);
  $scope.modalTitle = 'Add Data';
  $scope.submit_button = 'Insert';
  $scope.openModal();
 })
 };

 $scope.submitForm = function(){
  $http({
   method:"POST",
   url:"insert_bookings.php",
   data:{'first_name':$scope.first_name, 'last_name':$scope.last_name,
   'movie_name':$scope.movie_names,'theatre':$scope.theatre, 'hall_type':$scope.hall_type, 'booking_type':$scope.booking_type,  'date':$scope.date,'time':$scope.time,'seatp':$scope.seatp,'phone_number':$scope.phone_number,  'account':$scope.account, 'action':$scope.submit_button, 'id':$scope.hidden_id}
  }).then(function(response){
      alert(response.data);
   if(data.error != '')
   {
    $scope.success = false;
    $scope.error = true;
    $scope.errorMessage = response.data.error;
   }
   else
   {
    $scope.success = true;
    $scope.error = false;
    $scope.successMessage = response.data.message;
    $scope.form_data = {};
    $scope.closeModal();
    $scope.fetchData();
   }
  }).catch(function(){console.log($scope.theatre);alert($scope.theatre);});
 };
 $scope.fetchSingleData = function(bookingID){
  $http({
   method:"POST",
   url:"insert_bookings.php",
   data:{'id':bookingID, 'action':'fetch_single_data'}
  }).then(function(response){
   $scope.movie_name = [];
   $scope.theatre = [];
   $scope.first_name = response.data.first_name;
   $scope.last_name = response.data.last_name;
   $scope.movie_name = [response.data.movie_name];
   //$scope.movie_name = { 0: {key1: 'lol', key2: 'lol1'}, 1:{}};
   console.log($scope.movie_name);
   $scope.theatre_name =  response.data['theatre_l'];
   //$scope.theatre = [response.data.theatre]; // tha to dwsi se [""] to single fetch value
   //$scope.theatre = response.data.theatre;
   $scope.hall_type = response.data.hall_type;
   $scope.booking_type = response.data.booking_type;
   $scope.date = response.data.date;
   $scope.time = response.data.time;
   $scope.seatp = response.data.seatp;
   $scope.phone_number = response.data.phone_number;
   $scope.account = response.data.account;
   $scope.hidden_id = bookingID;
   $scope.modalTitle = 'Edit Data';
   $scope.submit_button = 'Edit';
   $scope.openModal();
  });
 };

 if($form_data->action == 'pre_add_Data'){
    $query = "SELECT * FROM (
          SELECT b.*,
          ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
          FROM scheduletable b
        ) tbl
        WHERE num = 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
      $output['movies_l'][] = array($row['movie_play_fk']); 
    }
    $query = "SELECT * FROM (
          SELECT b.*,
          ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
          FROM scheduletable b
        ) tbl
        WHERE num = 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
      $output['theatre_l'][] = array($row['theatre_name_fk']);;  
    }
}
 /* if($form_data->action == 'fetch_single_data' || $form_data->action == 'Edit'){
                  if(empty($form_data->theatre))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  $form_data->theatre;
            }
            if(empty($form_data->movie_name))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = $form_data->movie_name;
            }
            }
            elseif($form_data->action == 'Insert' || $form_data->action != 'fetch_single_data'){
            if(empty(implode(" ", $form_data->movie_name)))
            //if(empty($form_data->movie_name))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = implode(" ", $form_data->movie_name);
            }

            if(empty(implode(" ",$form_data->theatre)))
            //if(empty($form_data->theatre))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  implode(" ",$form_data->theatre);
            }
            }*/


            if(empty($form_data->theatre))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  $form_data->theatre;
            }
            if(empty($form_data->movie_name))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = $form_data->movie_name;
            }
         string to array panw for single value   
NEW PLAYLABLE

==========================================================
$scope.updateTheatre = function (id) {
    var length = Object.keys($scope.rest_info_theatre).length -1;
    var isCheck_TN_D=0;
    $scope.listName=id; //edw pernw to selected name san info
   console.log($scope.listName);
   console.log(length);
   console.log($scope.rest_info_theatre);
   for (i=0; i<= length; i++){
        for (x=0; x<= 11; x++ ){
    console.log($scope.rest_info_theatre[i][0][x]);
    //console.log($scope.rest_info_theatre[i][i][2]);
    if (id == $scope.rest_info_theatre[i][0][x] && isCheck_TN_D==false){
        console.log(id + 'hi');
        alert('yo');
        $http({
                method:"POST",
                url:"insert_bookings.php",
                data:{'movie_name':id, 'action':'movie_based'}
                }).then(function(response){
                    isCheck_D_TP=true;
                    console.log(response.data);
                    for(k=0; k<response.data.length; k++){
                    $scope.date_play = [response.data[k][2]];}
                    $scope.listTimePlay="";
                    $scope.listHall="";
                    $scope.listHallType="";
                    $scope.listName="";
                    $scope.listSeats=[];
                    $scope.list_TN_1=[];
                    $scope.list_HN_2=[];
                    $scope.list_HT_4=[];
                    $scope.list_S_6=[];
                })
    }
   }}
 }
if($form_data->action == 'movie_based'){
    $query = "SELECT * FROM (
          SELECT b.*,
          ROW_NUMBER() OVER (PARTITION BY date_play_fk ORDER BY id) as num
          FROM scheduletable b
          WHERE movie_play_fk = '".$form_data->movie_name."'
        ) tbl
        WHERE num = 1";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
          $output[]=$row;
        }
}
elseif($form_data->action == 'pre_add_Data'){




    $scope.updateTheatre = function (id) {
        var length = Object.keys($scope.rest_info_theatre).length -1;
        var isCheck_TN_D=0;
        $scope.date_play=[]; /////////////EDW SOS
        $scope.listName=id; //edw pernw to selected name san info
       console.log($scope.listName);
       console.log(length);
       console.log($scope.rest_info_theatre);
       for (i=0; i<= length; i++){
            for (x=0; x<= 11; x++ ){
        console.log($scope.rest_info_theatre[i][0][x]);
        //console.log($scope.rest_info_theatre[i][i][2]);
        if (id == $scope.rest_info_theatre[i][0][x] && isCheck_TN_D==false){
            console.log(id + 'hi');
            alert('yo');
            $http({
                    method:"POST",
                    url:"insert_bookings.php",
                    data:{'movie_name':id, 'action':'movie_based'}
                    }).then(function(response){
                        isCheck_D_TP=true;
                        console.log(response.data);
                        for(k=0; k<response.data.length; k++){
                            //console.log(response.data); 
                            console.log(response.data[k][2]);
                        $scope.date_play.push([response.data[k][2]]); //console.log
                        /////////////EDW SOS panw sto PUSH me to array INIT se []
                        ($scope.date_play);
                    }console.log($scope.date_play);
                       // console.log($scope.date_play);
                        $scope.listTimePlay="";
                        $scope.listHall="";
                        $scope.listHallType="";
                        $scope.listName="";
                        $scope.listSeats=[];
                        $scope.list_TN_1=[];
                        $scope.list_HN_2=[];
                        $scope.list_HT_4=[];
                        $scope.list_S_6=[];
                    })
        }
       }}
     }

     $scope.updateTheatre = function (id) {
        var length = Object.keys($scope.rest_info_theatre).length -1;
        var isCheck_TN_D=0;
        $scope.date_play=[]; //initiates array for pushing
        $scope.listName=id; //get selected Theatre Name
       for (i=0; i<= length; i++){
            for (x=0; x<= 11; x++ ){
        if (id == $scope.rest_info_theatre[i][0][x] && isCheck_TN_D==false){
                    $http({
                    method:"POST",
                    url:"insert_bookings.php",
                    data:{'movie_name':id, 'action':'movie_based'}
                    }).then(function(response){
                        isCheck_D_TP=true;
                        for(k=0; k<response.data.length; k++){
                            $scope.date_play.push([response.data[k][2]]);
                            console.log(response.data[k].date_play_fk);
                        }
                        $scope.listTimePlay="";
                        $scope.listHall="";
                        $scope.listHallType="";
                        $scope.listName="";
                        $scope.listSeats=[];
                        $scope.list_TN_1=[];
                        $scope.list_HN_2=[];
                        $scope.list_HT_4=[];
                        $scope.list_S_6=[];
                    })
        }
       }}
     }

     <div class="form-group">
      <label>Enter Date</label>
      <select class="form-control" ng-model="date" ng-options="date for date in date_play" required>
      <option value="" disabled selected>Date List</option>
    </select><pre ng-if="show_Old">OLD: {{old_movie}} -> NEW: {{movie_names}}</pre>
     </div>
===============================================================
$scope.updateDate = function(id){//epidi no access to fetch init data fields ara olo to db tha kanis fetch se rest_info_general kai to search tha to kanis edw stin ousia me FORS !!!!
    var length = Object.keys($scope.rest_info_general).length -1;
    console.log($scope.listName_movie);
    var isCheck_D_D=0;
    $scope.listName_date=id;
    console.log($scope.listName_date);
    $scope.time_play=[]; //initiates array for pushing
    for (i=0; i<= length; i++){
console.log(length + "FFFF");
        //console.log($scope.rest_info_general[i][0].date_play_fk);
        if (id == $scope.rest_info_general[i][0].date_play_fk && isCheck_D_D==false){        console.log('hi');
            $http({
            method:"POST",
            url:"insert_bookings.php",
            data:{'movie_name':$scope.listName_movie, 'date_play':id, 'action':'date_based'}
            }).then(function(response){
                console.log(response.data);
                //isCheck_D_D=true;
                if(isCheck_D_D==false){//here like DB ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) because no access to db entires anymore
                    for(k=0; k<response.data.length; k++){
                        $scope.time_play.push([response.data[k].time_play]);
                        console.log($scope.time_play);
                        //console.log('lol');
                        //alert(k);
                        isCheck_D_D=true;
                        alert(isCheck_D_D);
                    }
                }
                
                //$scope.movie_names="";
                //$scope.listName_movie="";
                //$scope.time_play=[];
                $scope.theatre_play=[];
                $scope.hall_name_play=[];
                $scope.hall_type_play=[];
                $scope.list_S_play=[];
            })
        }
    }
 }
 


===============================================================
<div id="{{$index+8}}"class="{{true ? 'seat occupied' : 'seat'}}">{{$index+8}}</div>
<div id="{{$index+8}}"class="{{isRes($index+8) ? 'seat occupied' : 'seat'}}">{{$index+8}}</div>


<div ng-repeat="row_s in list_css track by $index" ng-change="updateSeatsCss(rowS)" ng-model="row_s" onclick="myFunction()" class="row">
<!-- <div id="1" onclick="myFunction()" class="seat">1</div>
 <div id="2" class="seat">2</div>-->
 <div id="{{$index1}}"class="{{isRes($index1) ? 'seat occupied' : 'seat'}}">{{$index1}}</div>
 <div class="seat">{{$index+2}}</div>
 <div class="seat">{{$index+3}}</div>
 <div class="seat"></div>
 <div class="seat"></div>
 <div class="seat"></div>
 <div class="seat"></div>
 <div class="seat occupied"></div>
</div>

$scope.isRes = function(id){
    //console.log(id);
    //console.log($scope.indexSeatsSub.length);
    for (i=0; i< $scope.indexSeatsSub.length; i++) {
        //console.log(id);
        //console.log($scope.indexSeatsSub);
        //console.log($scope.indexSeatsSub[i]);
    if (id== $scope.indexSeatsSub[i]) { console.log('true'); return true;}
    //else { console.log('false'); return false;} //DEN PREPEI RETURN FALSE!!! kai to isRes oxi !isRes sto booking.php line ~126 isxi {{condition ? 'true' : 'false'}}
    }
    return false;
}


<div ng-repeat="row_s in list_css" ng-change="updateSeatsCss(rowS)" ng-model="row_s" onclick="myFunction()" class="row">
<!-- <div id="1" onclick="myFunction()" class="seat">1</div>
 <div id="2" class="seat">2</div>-->
 <div id="{{$index+1}}" ng-repeat="x in [].constructor(8) track by $index" class="{{isRes($index+1) ? 'seat occupied' : 'seat'}}">{{$index+1}}</div>
</div>

<div ng-repeat="row_s in list_css" ng-change="updateSeatsCss(rowS)" ng-model="row_s" onclick="myFunction()" class="row">
<!-- <div id="1" onclick="myFunction()" class="seat">1</div>
 <div id="2" class="seat">2</div>-->
 <div ng-repeat="x in [].constructor(8) track by $index" class="{{isRes(keepcountcss) ? 'seat occupied' : 'seat'}}" id="{{keepSeats(1)}}">{{keepcountcss}}</div>
</div>


$scope.isRes = function(id){
    //$scope.keepcountcss=0;
    //console.log(id);
    //console.log($scope.indexSeatsSub.length);
    for (i=0; i< $scope.indexSeatsSub.length; i++) {
        //console.log(id);
        //console.log($scope.indexSeatsSub);
        //console.log($scope.indexSeatsSub[i]);
    if (id== $scope.indexSeatsSub[i]) { 
        var something = (function() {
            var executed = false;
            return function() {
                if (!executed) {
                    executed = true;
                    // do something
                    $scope.keepcountcss= $scope.keepcountcss + 1;
                }
            };
        })();
        something();
        console.log('true'); return true;}
    //else { console.log('false'); return false;} //DEN PREPEI RETURN FALSE!!! kai to isRes oxi !isRes sto booking.php line ~126 isxi {{condition ? 'true' : 'false'}}
    //$scope.keepcountcss++;
    }
    return false;
}


4
Angularjs - How to keep count of total iterations across nested ng-repeat in the template
I want to suggest different way to approach this, I think it's pretty cool and easy :

In the template :

<ul>
  <div ng-repeat="group in obj.objectGroups">
    <li>{{group.name}}</li>
    <li ng-repeat="item in group.items" ng-init="number = countInit()">    
      Total = {{number + 1}}
    </li>
  </div>
</ul>
In the controller :

$scope.totalCount = 0;
$scope.countInit = function() {
   return $scope.totalCount++;
}'
=======================================================================
MAGIC CODE for GETTING $user['.....'] !!!!!!!!!!!!!!! fheaderinfo.php !!!
<?php  
require_once 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}
?>

pass info
ng-init="user_profile='<?php echo $user['email'];


<td><?php echo $db_unit[$i]['email_id']; ?><input type="hidden" ng-init="customer.email='<?php echo $db_unit[$i]['email_id']; ?>'"></td>

=======================================================================


    ?>