<?php include("./templates/header.php") ?>
<h1 class=" text-2xl font-bold font-serif text-gray-800 ">Welcome to Product Lists Page</h1>

<div class=" flex justify-end">
    <a href="./createProduct.php" class="py-3 mt-5 px-4  inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        Create Product
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m5 11 4-7" />
            <path d="m19 11-4-7" />
            <path d="M2 11h20" />
            <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4" />
            <path d="m9 11 1 9" />
            <path d="M4.5 15.5h15" />
            <path d="m15 11-1 9" />
        </svg>
    </a>
</div>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<h2 class=" text-center underline font-bold mb-5 font-sans text-gray-500">List Of The Products</h2>

<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="divide-y w-full divide-gray-200 dark:divide-gray-700">
                    <thead class=" border border-gray-800 dark:bg-slate-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-gray-800 text-center border text-xs font-medium text-gray-300 uppercase">Image</th>
                            <th scope="col" class="px-6 py-3 border-gray-800 text-center border text-xs font-medium text-gray-300 uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 border-gray-800 text-center border text-xs font-medium text-gray-300 uppercase">Price</th>
                            <th scope="col" class="px-6 py-3 border-gray-800 text-center border text-xs font-medium text-gray-300 uppercase">Rating</th>
                            <th scope="col" class="px-6 py-3 border-gray-800 text-center border text-xs font-medium text-gray-300 uppercase">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $productData = "productData";

                        //to show each data in the folder we use scan_dir() function and to filter . and .. we use arr_filter() function
                        $products = array_filter(scandir($productData), fn ($el) => $el != "." && $el != "..");

                        foreach ($products as $product) :
                            $jsonData = file_get_contents("productData/" . $product);
                            $obj = json_decode($jsonData);
                        ?>
                            <tr class="odd:bg-white border border-gray-800  even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                <td class=" text-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                    <img width="50px" height="50px" src="<?php echo $obj->product_photo ?>" alt="">
                                </td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    <?= $obj->product_name ?>
                                </td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $obj->product_price ?></td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 inline-block <?php echo $i<= $obj->product_rating? 'fill-yellow-300':'' ?>">
                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                        </svg>
                                    <?php endfor ?>
                                </td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="./productDelete.php?file_name=<?php echo $product ?>" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("./templates/footer.php") ?>