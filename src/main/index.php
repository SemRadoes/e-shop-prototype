
<?php session_start();
?>
<!DOCTYPE html>
<?php include '../modules/dbconnection.php';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" stylesheet="text/css" href="common.css">
    <link href="index.css" rel="stylesheet" stylesheet="text/css">
    <link href="header.css" rel="stylesheet" stylesheet="text/css">
    <link href="fonts.css" rel="stylesheet" stylesheet="text/css">
    <?php include './fonts.php';?>
    <script defer src="writeDB.js" type="text/javascript"></script>
    <title>Aws3mwebshop</title>
</head>
<body class="poppins-black">
    <?php include './header.php'?>
    <div class="top-products d-flex p-3 justify-content-center">
        <div class="popular-items">
            <div class="popular-header">
                <h1 class="p-3">TOP RATED</h1>
            </div>
            <div class="popular-products d-flex p-3 flex-wrap" style="gap: 20px;">
            <?php
                $query = "SELECT * FROM products ORDER BY rating DESC LIMIT 5;";
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
                    <div class="productWrapper" onclick="goToProductDetailWindow(<?php echo $id ?>)">
                            <div class="heart">
                                &#9825;
                            </div>
                            <div class="imagediv">
                                <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                            </div>
                            <div class="infodiv">
                                <p class="poppins-bold"><?php echo $name ?></p>
                                <div class="rating-numratings poppins-light">
                                    <p>€ <?php echo $price ?></p>
                                    <p class="star"><?php echo $rating ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                }
                ?>
            </div>
        </div>
        <div class="line-between border border-1 border-dark"></div>
        <div class="most-sold-items">
            <div class="most-sold-header">
                <h1 class="p-3">MOST SOLD</h1>
            </div>
            <div class="most-sold-products d-flex p-3 flex-wrap" style="gap: 20px;">
            <?php
                $query = "SELECT * FROM products ORDER BY items_sold DESC LIMIT 5;";
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
                    <div class="productWrapper" onclick="goToProductDetailWindow(<?php echo $id ?>)">
                            <div class="imagediv">
                                <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                            </div>
                            <div class="infodiv">
                                <p style="font-weight: 800; text-align: center;"><?php echo $name ?></p>
                                <div class="rating-numratings poppins-light">
                                    <p>€ <?php echo $price ?></p>
                                    <p class="star"><?php echo $rating ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="shop-by-category p-3">
            <h1>Shop by category</h1>
        </div>
        <div class="categories d-flex flex-wrap gap-2">
                <?php
                $query = "SELECT * FROM categories";
                $result = $conn->query($query); 
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $category = $row['category'];
                    $categoryImage = $row['category_image'];
                    ?>
            <div role="button" class="category p-3 d-flex flex-column">
                <div class="category-image">
                    <img src=<?php echo $categoryImage?> alt="" height="400px" width="400px">
                </div>
                <div class="category-name mt-2 ml-1">
                    <h3><?php echo $category?></h3>
                </div>
            </div>
                <?php
                }
                ?>
        </div>
        <!-- <div class="right">
            <form class="filters">
                <div class="category-checkboxes" name="category" id="category">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input checkbox" type="checkbox" name="checkbox[]" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">men's clothing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input checkbox" type="checkbox" name="checkbox[]" id="inlineCheckbox2" value="2">
                        <label class="form-check-label" for="inlineCheckbox2">women's clothing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input checkbox" type="checkbox" name="checkbox[]" id="inlineCheckbox3" value="3">
                        <label class="form-check-label" for="inlineCheckbox3">electronics</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input checkbox" type="checkbox" name="checkbox[]" id="inlineCheckbox4" value="4">
                        <label class="form-check-label" for="inlineCheckbox4">jewelery</label>
                    </div>
                </div>
                <select class="form-select" aria-label="Default select example" name="rating" id="rating">
                    <option value="default" selected>select rating(1-5)</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <select class="form-select" aria-label="Default select example" name="sort-rating" id="sort-rating">
                    <option value="default" selected>Sort Rating</option>
                    <option value="oplopend">ascending &#8593;</option>
                    <option value="dalend">descending &#8595;</option>
                </select>
                <select class="form-select" aria-label="Default select example" name="sort-price" id="sort-price">
                    <option value="default" selected>Sort Price</option>
                    <option value="oplopend">ascending &#8593;</option>
                    <option value="dalend">descending &#8595;</option>
                </select>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary" onclick="filterResults()" id="filter">Filter</button>
                    <button type="button" class="btn btn-danger">Reset</button>
                </div>
            </form>
            <div id="no-filter-selected" class="bg-warning rounded p-2">No filters selected! please select at least one filter</div>
        </div> -->
    </div>
</body>
<script>
    $( document ).ready(async function() {
        addProductsfromapi();
    });
    $('#filter').on("click", function(){
        const rating = $('#sort-rating').val();
        const checkboxes =  $('.checkbox:checked');
        const sortRating = $('#sort-rating').val();
        const sortPrice = $('#sort-price').val();
        $.ajax({
            url: "filterResults.php",
            method:"POST",
            data: $('form').serialize(),
            success: function (result) {
                $(".products").html(result);
            }
        });
    });
    function goToLoginPage(){
        window.location = "../login/loginPage.php"
    }
    function goToLogoutPage(){
        window.location = "../login/logout.php"
    }
</script>
</html>