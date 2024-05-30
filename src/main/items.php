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
    <div class="main m-2 flex gap-2">
        <form id="filters" class="flex flex-col gap-10 w-64">
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
                        <div class="flex items-center ps-3 w-full">
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
            <div class="flex flex-col gap-1 w-inherit">
                <p>Select <strong>Rating</strong></p>
                <p class="border-b-2 border-slate-400"></p>
                <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full">
                            <input id="list-rating-license0" type="radio" value="0" name="list-rating[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license0" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full">
                            <input id="list-rating-license1" type="radio" value="1" name="list-rating[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license1" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full">
                            <input id="list-rating-license2" type="radio" value="2" name="list-rating[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license2" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full">
                            <input id="list-rating-license3" type="radio" value="3" name="list-rating[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license3" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full">
                            <input id="list-rating-license4" type="radio" value="4" name="list-radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license4" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&star;</span>
                                <span>of meer</span>
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3 w-full">
                            <input id="list-rating-license5" type="radio" value="5" name="list-radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-rating-license5" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                                <span style="font-size:120%;color:goldenrod;">&starf;</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <button type="submit" class="p-3 filterbutton border-2">Filter</button>
        </form>
        <div class="grid grid-cols-5 gap-3" id="items-grid"></div>
    </div>
    <?php include "../footer/footer.php";?>
</body>
<script>
        $('#filters').on('submit', function (e) {
        e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'getItems.php',
                data: $('#filters').serialize(),
                success: function (result) {
                    $('#filters').empty();
                    $('#filters').append(result);
                    $('#filters').show();
                }
        });
    });
</script>
</html>