<?php
echo "<pre>";
print_r($_FILES);

//to save upload photo file we need a folder
$uploadPhoto = "uploadPhotos";
if (!is_dir($uploadPhoto)) {
    mkdir($uploadPhoto, 0777);
}

$error = false;

//to loop the name of the multiple photos
//$key => $value of Array in loop
foreach ($_FILES["upload"]["name"] as $key => $name) {
    $nameArr = pathinfo($name);
    $extension = $nameArr["extension"];

    //to save photo file we need to create file with extension
    $photoFile = $uploadPhoto . "/" . uniqid() . "." . $extension;

    //to move the photo file from the tmp_dir to the file we created with move_uploaded_file() function
    if (!move_uploaded_file($_FILES["upload"]["tmp_name"][$key], $photoFile)) {
        $error = true;
    }

    if ($error === false) {
        header("Location:uploadPhoto.php");
    }
}
