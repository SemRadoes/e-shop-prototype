<?php
include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $categoryid = $_POST['category-list'];
    $categoryid = $_POST['category-list'];
    $categoryid = $_POST['category-list'];
    $categoryid = $_POST['category-list'];
    
    $query = "SELECT * FROM products WHERE category = '$categoryid';";
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
        echo '<div class="productWrapper">';
                echo '<div class="imagediv hover:cursor-pointer" onclick="goToProductDetailWindow('.$id .')">';
                echo '<img class="listimage" src='.$image.' alt="productimage" width="130" height="150">';
                echo '</div>';
                echo '<div class="infodiv">';
                echo    '<p class="poppins-bold hover:underline hover:cursor-pointer" onclick="goToProductDetailWindow('.$id.')"><?php echo $name ?></p>';
                echo    '<div class="rating-numratings poppins-light">';
                echo        '<p>€ '.$price.'</p>';
                echo        '<p class="star">'.$rating.'</p>';
                echo    '</div>';
                echo    '<div class="flex flex-col justify-between gap-2">';
                echo        '<i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to wishlist</span></i>';
                echo        '<i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to cart</span></i>';
                echo    '</div>';
                echo '</div>';
                echo '</div>';
    }
}

