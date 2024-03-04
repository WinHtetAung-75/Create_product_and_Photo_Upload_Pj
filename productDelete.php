<?php 
echo "<pre>";
print_r($_GET);

$fileName = $_GET["file_name"];

$jsonData = file_get_contents("productData/". $fileName);
$obj = json_decode($jsonData);
print_r($obj);

if(unlink($obj->product_photo)){
    if(unlink("productData/". $fileName)){
        header("Location:index.php");
    }
}