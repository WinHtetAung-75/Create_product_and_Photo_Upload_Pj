<?php 
echo "<pre>";
print_r($_GET);
$photo = $_GET["photo"];

if(unlink("uploadPhotos/".$photo)){
    header("Location:uploadPhoto.php#gallery");
}