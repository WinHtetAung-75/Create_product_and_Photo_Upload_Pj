<?php include("./templates/header.php") ?>
<h1 class=" text-2xl font-bold font-serif mb-5 text-gray-800 ">Welcome to Upload Photo Page</h1>

<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<h2 class=" text-center underline font-bold mb-5 font-sans text-gray-500">To Upload Photos</h2>

<form action="./photoSave.php" method="post" enctype="multipart/form-data">
    <label class="block">
        <span class="sr-only">Choose profile photo</span>
        <input required multiple name="upload[]" type="file" class="block w-full text-sm text-gray-500
      file:me-4 file:py-2 file:px-4
      file:rounded-lg file:border-0
      file:text-sm file:font-semibold
      file:bg-blue-600 file:text-white
      hover:file:bg-blue-700
      file:disabled:opacity-50 file:disabled:pointer-events-none
      dark:file:bg-blue-500
      dark:hover:file:bg-blue-400
    ">
    </label>
    <div class=" flex justify-end">
        <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-blue-100 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-white-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Upload
        </button>
    </div>
</form>

<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<h2 id="gallery" class=" text-center underline font-bold mb-5 font-sans text-gray-500">Gallery</h2>

<?php

$photos = array_filter(scandir("uploadPhotos"), fn ($el) => $el != "." && $el != "..");

foreach ($photos as $photo) :
?>
    <div class=" inline-block border border-gray-800 m-3 p-3 group relative">
        <img class=" m-5" width="150px" height="150px" src="uploadPhotos/<?php echo $photo ?>" alt="">

        <div class=" inline-block  bottom-0 right-2 absolute justify-end ">
            <a href="./deletePhoto.php?photo=<?= $photo ?>" class="  group-hover:block hidden py-1 px-2  items-center gap-x-2 text-xs font-bold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Delete
            </a>
        </div>
    </div>

<?php endforeach ?>

<?php include("./templates/footer.php") ?>