<?php
include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../modules/head.php';?>
    <link rel="stylesheet" stylesheet="text/css" href="common.css">
    <link href="../header/header.css" rel="stylesheet" stylesheet="text/css">
    <link href="../footer/footer.css" rel="stylesheet" stylesheet="text/css">
    <link href="../fonts/fonts.css" rel="stylesheet" stylesheet="text/css">
    <link href="../main/items.css" rel="stylesheet" stylesheet="text/css">
    <?php include '../fonts/fonts.php';?>
    <title>Aws3mwebshop - Categories</title>
</head>
<body>
    <?php include "../header/header.php";?>
    <div class="main m-2 flex gap-5 p-5">
        <form id="filters" class="flex flex-col gap-10 w-full md:w-64 lg:w-96">
            <h1 class="text-5xl">Filters</h1>
            <div class="flex gap-1 justify-between items-center w-full">
                <div class="flex flex-col w-2/5">
                    <p>Price</p>
                    <p></p>
                    <select name="sortingprice" id="sortingprice" class="p-2">
                            <option value="default" id="sortingdefault">Sort Pricing</option>
                            <option value="ascending">Ascending</option>
                            <option value="descending">Descending</option>
                    </select>
                </div>
                <p class="w-1/5 text-center" border-l-slate-800></p>
                <div class="flex flex-col w-2/5">
                    <p>Rating</p>
                    <select name="sortingrating" id="sortingrating" class="p-2">
                            <option value="default" id="sortingdefault">Sort Rating</option>
                            <option value="ascending">Ascending<i class="fa fa-sort-up"></i></option>
                            <option value="descending">Descending<i class="fa fa-sort-down"></i></option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-1 w-inherit">
                <p>Select a <strong>Category</strong></p>
                <p class="border-b-2 border-slate-400"></p>
                <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <?php
                $query = "SELECT * FROM categories";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $category = $row['category'];
                ?>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full hover:cursor-pointer">
                            <input id="list-radio-license<?php echo $id; ?>" type="checkbox" value="<?php echo $id; ?>" name="category-list[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-license<?php echo $id; ?>" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $category; ?></label>
                        </div>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
            <div class="flex flex-col gap-1 w-inherit">
                <p>Select a <strong>price range</strong> (€)</p>
                <p class="border-b-2 border-slate-400"></p>
                <div class="flex justify-between">
                    <input type="number" class="p-3 w-full border-2" name="minval">
                    <p class="flex justify-center items-center w-full">between</p>
                    <input type="number" class="p-3 w-full border-2" name="maxval">
                </div>
            </div>
            <div class="flex flex-col gap-1 w-inherit hover:cursor-pointer">

                <p>Select <strong>Rating</strong></p>
                <p class="border-b-2 border-slate-400"></p>
                <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 h-10 flex items-center p-1">
                            <input id="list-rating-license0" type="radio" value="0" name="rating" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license0" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 h-10 flex items-center p-1">
                            <input id="list-rating-license1" type="radio" value="1" name="rating" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license1" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 h-10 flex items-center p-1">
                            <input id="list-rating-license2" type="radio" value="2" name="rating" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license2" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 h-10 flex items-center p-1">
                            <input id="list-rating-license3" type="radio" value="3" name="rating" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license3" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 h-10 flex items-center p-1">
                        <input id="list-rating-license4" type="radio" value="4" name="rating" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="list-rating-license4" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <span style="font-size:120%;color:goldenrod;">&starf;</span>
                            <span style="font-size:120%;color:goldenrod;">&starf;</span>
                            <span style="font-size:120%;color:goldenrod;">&starf;</span>
                            <span style="font-size:120%;color:goldenrod;">&starf;</span>
                            <span style="font-size:120%;color:goldenrod;">&star;</span>
                            <span>of meer</span>
                        </label>
                    </li>
                </ul>
            </div>
        </form>
        <?php if(isset($_GET['categoryid'])){
            $categoryitem = $_GET['categoryid'];
            ?>
            <div id="categorygrid" class="grid grid-cols-1 w-full p-3 gap-1" >
        <?php
            $query = "SELECT * FROM products WHERE category = '$categoryitem'";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];
                $category = $row['category'];
                $description = $row['description'];
                $rating = $row['rating'];
                $numberOfRatings = $row['numberofratings'];
                ?>
                <div class="productWrapper">
                        <div class="imagediv hover:cursor-pointer flex justify-center" onclick="goToProductDetailWindow(<?php echo $id ?>)">
                            <img class="listimage" src=<?php echo $image ?> alt="productimage">
                        </div>
                        <div class="flex flex-col  gap-2 p-3 grow">
                            <p class="poppins-bold hover:underline hover:cursor-pointer h-5 overflow-hidden" onclick="goToProductDetailWindow(<?php echo $id ?>)"><?php echo $name ?></p>
                            <p class="star"><?php echo $rating ?>&nbsp;&nbsp;<span>(<?php echo $numberOfRatings ?>)</span></p>
                            <p><?php echo $description ?></p>
                        </div>
                        <div class="infodiv">
                            <div class="rating-numratings poppins-light">
                                <p class="price poppins-bold">€ <?php echo $price ?></p>
                            </div>
                            <div class="flex flex-col justify-between gap-2 w-30">
                                <i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to wishlist</span></i>
                                <i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to cart</span></i>
                            </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
        </div>
        <?php } ?>
        <?php if(isset($_GET['searchvalue'])){
            $searchvalue = $_GET['searchvalue'];
            ?>
        <div id="categorygrid" class="grid lg:grid-cols-6 md:grid-cols-3 grid-cols-1 p-3 gap-2" >
        <?php
            $query = "SELECT * FROM products WHERE name LIKE '%$searchvalue%'";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];
                $category = $row['category'];
                $description = $row['description'];
                $rating = $row['rating'];
                $numberOfRatings = $row['numberofratings'];
                ?>
                <div class="productWrapper">
                        <div class="imagediv hover:cursor-pointer flex justify-center" onclick="goToProductDetailWindow(<?php echo $id ?>)">
                            <img class="listimage" src=<?php echo $image ?> alt="productimage">
                        </div>
                        <div class="flex flex-col gap-2 p-3 grow">
                            <p class="poppins-bold hover:underline hover:cursor-pointer h-12 overflow-hidden" onclick="goToProductDetailWindow(<?php echo $id ?>)"><?php echo $name ?></p>
                            <p class="star"><?php echo $rating ?>&nbsp;&nbsp;<span>(<?php echo $numberOfRatings ?>)</span></p>
                            <p><?php echo $description ?></p>
                        </div>
                        <div class="infodiv">
                            <div class="rating-numratings poppins-light">
                                <p class="price poppins-bold">€ <?php echo $price ?></p>
                            </div>
                            <div class="flex flex-col justify-between gap-2 w-30">
                                <i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to wishlist</span></i>
                                <i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to cart</span></i>
                            </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
        </div>
        <?php } ?>
        <div class="grid grid-cols-1 p-3 gap-2" id="items-grid" style="display: none;"></div>
    </div>
    <?php include "../footer/footer.php";?>
</body>
<script>
        $('#filters').on('change', function (e) {
        e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'getItems.php',
                data: $('#filters').serialize(),
                success: function (result) {
                    $('#items-grid').empty();
                    $('#items-grid').html(result);
                    $('#categorygrid').hide();
                    $('#items-grid').fadeIn(500);
                }
            });
        });
        function goToProductDetailWindow(id){
            window.location.href = './product.php?id=' + id;
        }
</script>
</html>