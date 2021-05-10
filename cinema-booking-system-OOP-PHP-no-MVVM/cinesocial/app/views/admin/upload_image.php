<?php
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

    // uploads image in the folder images
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = substr(md5(time()), 0, 10) . '.' . end($temp);
        move_uploaded_file($_FILES['file']['tmp_name'], 'images/' . $newfilename);
    
    // give callback to your angular code with the image src name
        echo json_encode($newfilename);
    }
?>