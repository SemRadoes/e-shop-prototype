<?php
$productID = $_GET['id'];

include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';
$query = "SELECT * FROM products WHERE id = '$productID'";
$result = $conn->query($query); 
$productInfo = $result->fetch_assoc();
$name = $productInfo['name'];
$description = $productInfo['description'];
$image = $productInfo['image'];
$price = $productInfo['price'];
$category = $productInfo['category'];
$subcategory = $productInfo['subcategory'];
$rating = $productInfo['rating'];
$numberofratings = $productInfo['numberofratings'];
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
    <link href="product.css" rel="stylesheet" stylesheet="text/css">
    <?php include '../fonts/fonts.php';?>
    <title><?php echo $name; ?></title>
</head>
<body class="poppins-regular">
    <?php include '../header/header.php'?>
    <div id="product-head" class="flex justify-center content-center gap-20 h-fit p-5">
        <img src=<?php echo $image;?> alt="productimage" width="600px" haight="auto">
        <div id="product-info" class="flex flex-col gap-5 w-96 p-5">
            <div class="flex content-center">
                <?php if($rating < 2){?>
                    <span>&#9733;&#9734;&#9734;&#9734;&#9734;</span>
                <?php } else if($rating >= 2 and $rating < 3){?>
                    <span>&#9733;&#9733;&#9734;&#9734;&#9734;</span>
                <?php } else if($rating >= 3 and $rating < 4){?>
                    <span>&#9733;&#9733;&#9733;&#9734;&#9734;</span>
                <?php } else if($rating >= 4 and $rating < 5){?>
                    <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                <?php } else {?>
                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                <?php } ?>
                <span>(<?php echo $numberofratings;?>)</span>
            </div>
            <div class="poppins-bold"><?php echo $name;?></div>
            <div><?php echo $description;?></div>
            <div>€ <?php echo $price;?></div>
            <label for="quantity">How many?</label>
            <input type="number" id="quantity" class="w-20 p-3" min="1" value="1">
            <div class="flex justify-between gap-2">
                <i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular" onclick="addToWishlist($productID, $user_id)">Add to wishlist</span></i>
                <i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular" onclick="addToCart($productID, $user_id)">Add to cart</span></i>
            </div>
        </div>
    </div>
    <?php include '../footer/footer.php'?>
</body>
<script>
    function goToProductDetailWindow(id){
        window.location.href = './product.php?id=' + id;
    }
    function addToWishlist(id){
        const quantity = $('#quantity').val();
        $.ajax({
                type: 'get',
                url: '../modules/addToWishlist.php?id=' + id + 'quantity=' + quantity,
                success: function (result) {
                    alert(result);
                }
            });
    }
    function addToCart(id){
        const quantity = $('#quantity').val();
        $.ajax({
                type: 'get',
                url: '../modules/addToCart.php?id=' + id + 'quantity=' + quantity,
                success: function (result) {
                    alert(result);
                }
            });
    }
</script>
</html>