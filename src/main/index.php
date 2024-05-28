
<?php include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../modules/head.php';?>
    <link rel="stylesheet" stylesheet="text/css" href="common.css">
    <link href="index.css" rel="stylesheet" stylesheet="text/css">
    <link href="../header/header.css" rel="stylesheet" stylesheet="text/css">
    <link href="../footer/footer.css" rel="stylesheet" stylesheet="text/css">
    <link href="../fonts/fonts.css" rel="stylesheet" stylesheet="text/css">
    <?php include '../fonts/fonts.php';?>
    <title>Aws3mwebshop</title>
</head>
<body class="poppins-normal">
    <?php include '../header/header.php'?>
    <div class="top-products flex p-3 justify-content-center">
        <div class="popular-items">
            <div class="popular-header p-3 border border-solid border-2 w-fit rounded-xl ml-3">
                <h1>TOP RATED</h1>
            </div>
            <div class="popular-products flex p-3 flex-wrap" style="gap: 20px;">
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
                    <div class="productWrapper">
                            <div class="imagediv hover:cursor-pointer" onclick="goToProductDetailWindow(<?php echo $id ?>)">
                                <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                            </div>
                            <div class="infodiv">
                                <p class="poppins-bold hover:underline hover:cursor-pointer" onclick="goToProductDetailWindow(<?php echo $id ?>)"><?php echo $name ?></p>
                                <div class="rating-numratings poppins-light">
                                    <p>€ <?php echo $price ?></p>
                                    <p class="star"><?php echo $rating ?></p>
                                </div>
                                <div class="flex flex-col justify-between gap-2">
                                    <i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to wishlist</span></i>
                                    <i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to cart</span></i>
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
            <div class="most-sold-header p-3 border border-solid border-2 w-fit rounded-xl ml-3">
                <h1>TOP SELLING PRODUCTS</h1>
            </div>
            <div class="most-sold-products flex p-3 flex-wrap" style="gap: 20px;">
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
                    <div class="productWrapper">
                            <div class="imagediv hover:cursor-pointer" onclick="goToProductDetailWindow(<?php echo $id ?>)">
                                <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                            </div>
                            <div class="infodiv">
                                <p class="poppins-bold hover:underline hover:cursor-pointer" onclick="goToProductDetailWindow(<?php echo $id ?>)"><?php echo $name ?></p>
                                <div class="rating-numratings poppins-light">
                                    <p>€ <?php echo $price ?></p>
                                    <p class="star"><?php echo $rating ?></p>
                                </div>
                                <div class="flex flex-col justify-between gap-2">
                                    <i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to wishlist</span></i>
                                    <i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to cart</span></i>
                                </div>
                            </div>
                        </div>
                        <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="main border border-2 border-current border-solid m-2">
        <div class="shop-by-category p-3 border border-solid border-2 w-fit rounded-xl ml-3">
            <h1>Shop by category</h1>
        </div>
        <div class="categories flex overflow-auto gap-2">
                <?php
                $query = "SELECT * FROM categories";
                $result = $conn->query($query); 
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $category = $row['category'];
                    $categoryImage = $row['category_image'];
                    ?>
            <div role="button" class="category p-3 flex flex-col">
                <div class="category-image">
                    <img src=<?php echo $categoryImage?> alt="" class="h-80 w-80">
                </div>
                <div class="category-name mt-2 ml-2">
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
<?php include '../footer/footer.php';?>
<script>

    function goToProductDetailWindow(id){
        window.location.href = './product.php?id=' + id;
    }

    $( document ).ready(() => {
        $('#home-nav').addClass('home-nav');
    }
    );
</script>
</html>