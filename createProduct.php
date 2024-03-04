<?php include("./templates/header.php") ?>
<h1 class=" text-2xl font-bold font-serif mb-5 text-gray-800 ">Welcome to Product Create Page</h1>
<form class=" bg-white p-5 rounded-md" action="./productSave.php" method="post" enctype="multipart/form-data">
    <h2 class=" text-center underline font-bold mb-5 font-sans text-gray-500">To Create Products</h2>

    <div class=" mb-3">
        <label for="product_name" class="block text-sm font-medium mb-2 dark:text-gray-500">Product Name</label>
        <input name="product_name" required type="text" id="product_name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="apple">
    </div>

    <div class=" mb-3">
        <label for="product_price" class="block text-sm font-medium mb-2 dark:text-gray-500">Product Price</label>
        <input name="product_price" required type="number" id="product_price" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="500">
    </div>

    <div class=" mb-3">
        <label for="select" class="block text-sm font-medium mb-2 dark:text-gray-500">Email</label>
        <select name="product_rating" required id="select" class="py-3 px-4 pe-9 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600">
            <option value="">Select Rating</option>
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?= $i ?>">
                    <?php echo $i ?>
                </option>
            <?php endfor ?>
        </select>
    </div>

    <div class=" mt-8">
        <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input name="product_photo" type="file" class="block w-full text-sm text-gray-500
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
    </div>

    <div class=" flex justify-end">
        <button type="submit" class="py-3 mt-5 px-4  inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Save Product
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m5 11 4-7" />
                <path d="m19 11-4-7" />
                <path d="M2 11h20" />
                <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4" />
                <path d="m9 11 1 9" />
                <path d="M4.5 15.5h15" />
                <path d="m15 11-1 9" />
            </svg>
        </button>
    </div>
</form>
<?php include("./templates/footer.php") ?>