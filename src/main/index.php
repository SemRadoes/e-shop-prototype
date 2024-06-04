
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
    <div class="header-banner">
        <?php include '../header/header.php'?>
        <div class="banner flex justify-around items-center">
            <h1 class="text-9xl flex justify-center items-center gap-5 procent">50% OFF <span class="text-4xl">EVERYTHING!</span></h1>
            <div class="sign-up flex flex-col items-center gap-10">
                <h1 class="text-7xl sign-up-hesitate">Don't hesitate!</h1>
                <button class="text-4xl p-3 sign-label" onclick="goToRegister()">Register Now</button>
            </div>
        </div>
    </div>
    <div class="popular-items overflow-auto">
        <div class="popular-header p-3 border border-solid border-2 w-fit rounded-xl ml-3">
            <h1>TOP RATED</h1>
        </div>
        <div class="grid grid-cols-6 p-3 gap-2">
        <?php
            $query = "SELECT * FROM products ORDER BY rating DESC LIMIT 10;";
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
                        <div class="infodiv">
                            <p class="poppins-bold hover:underline hover:cursor-pointer h-12 overflow-hidden" onclick="goToProductDetailWindow(<?php echo $id ?>)"><?php echo $name ?></p>
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
    <div class="main m-2">
        <div class="shop-by-category border p-3 border-solid border-2 w-fit rounded-xl ml-3">
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
            <div role="button" class="category flex flex-col border-2 border-orange-500" onclick="goToCategoryCatalog(<?php echo $id; ?>)">
                <div class="category-image">
                    <img src=<?php echo $categoryImage?> alt="categoryimg" class="h-80 w-80">
                </div>
                <div class="p-3">
                    <h3 class="text-black"><?php echo $category?></h3>
                </div>
            </div>
                <?php
                }
                ?>
        </div>
    </div>
    <div class="most-sold-items">
        <div class="most-sold-header p-3 border border-solid border-2 w-fit rounded-xl ml-3">
            <h1>OUR BESTSELLERS</h1>
        </div>
            <div class="grid grid-cols-6 p-3 gap-2" >
            <?php
                $query = "SELECT * FROM products ORDER BY items_sold DESC LIMIT 10;";
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
                            <div class="infodiv">
                                <p class="poppins-bold hover:underline hover:cursor-pointer h-12 overflow-hidden" onclick="goToProductDetailWindow(<?php echo $id ?>)"><?php echo $name ?></p>
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
    <?php include '../footer/footer.php';?>
</body>
<script>
    function goToProductDetailWindow(id){
        window.location.href = './product.php?id=' + id;
    }
    function goToCategoryCatalog(id){
        window.location.href = './items.php?categoryid=' + id;
    }
    function goToRegister(id){
        window.location.href = '../login/loginPage.php?action=register';
    }
    $( document ).ready(() => {
        $('#home-nav').addClass('home-nav');
    });
</script>
</html>