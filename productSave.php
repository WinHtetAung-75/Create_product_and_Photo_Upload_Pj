<?php 
echo "<pre>";
print_r($_POST);
print_r($_FILES);

//Create folder to save product photos files
$productPhotosFolder = "productPhotos";
if(!is_dir($productPhotosFolder)){
    mkdir($productPhotosFolder,0777);
}

//Create folder to save product data
$productData = "productData";
if(!is_dir($productData)){
    mkdir($productData,0777);
}


//to create extension the photo of user upload(don't use name)
$photoNameArr = pathinfo($_FILES["product_photo"]["name"]);
$extension = $photoNameArr["extension"];


//we need file name to save product photo
$productPhotoFile = $productPhotosFolder . "/" . uniqid() . "." . $extension ;


//to move product photo file from the tmp_dir to the file I created with move_uploaded_file() function
if(move_uploaded_file($_FILES["product_photo"]["tmp_name"],$productPhotoFile)){
    //if true we add the product photo data to $post arr as new index

    $_POST["product_photo"] = $productPhotoFile;
}

print_r($_POST);
//Change the $post arr to json
$productJsonData = json_encode($_POST);

//to save product json data -- Create a file with .json extension
$productDataFile = $productData . "/" . uniqid() . ".json" ;
touch($productDataFile);


//to write json product data(change from the post method arr) with file write
$fileStream = fopen($productDataFile,"a");
fwrite($fileStream,"$productJsonData");
fclose($fileStream);

header("Location:index.php");
