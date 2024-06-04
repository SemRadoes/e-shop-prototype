<?php
include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $categoryid;
    $minval = $_POST['minval'];
    $maxval = $_POST['maxval'];
    $rating;
    if(isset($_POST['category-list'])){
        $categoryid = $_POST['category-list'];
    }
    if(isset($_POST['rating'])){
        $rating = $_POST['rating'];
    }
    $query = "SELECT * FROM products";
    if(empty($categoryid)){
        $query .= "";
    } else{
        $query .= " WHERE category IN (";
        for($i = 0; $i < count($categoryid); ++$i){
            $query .= "'$categoryid[$i]',";
        }
        $query = rtrim($query, ',');
        $query .= ")";
    }

    if(empty($minval) and empty($maxval)){
        $query .= "";
    } else if(empty($minval) or empty($maxval)){
        if(empty($maxval)){
            $query .= "";
        } else {
            if(empty($categoryid)){
                $query .= " WHERE price <= '$maxval'";
            } else {
                $query .= " and price <= '$maxval'";
            }
        }
        if(empty($minval)){
            $query .= "";
        } else {
            if(empty($categoryid)){
                $query .= " WHERE price >= '$minval'";
            } else {
                $query .= " and price >= '$minval'";
            }
        }
    } else {
        if(empty($categoryid)){
            $query .= " WHERE price BETWEEN '$minval' and '$maxval'";
        } else {
            $query .= " and price BETWEEN '$minval' and '$maxval'";
        }
    }
    
    if(empty($rating)){
        $query .= "";
    } else{
        if(empty($categoryid) and empty($minval) and empty($maxval)){
            $query .= " WHERE rating > '$rating'";
        } else {
            $query .= " and rating > '$rating'";
        }
    }
    $query .= ";";
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
        echo '<div class="imagediv hover:cursor-pointer flex justify-center" onclick="goToProductDetailWindow('.$id.')">';
        echo '<img class="listimage" src='.$image.' alt="productimage">';
        echo '</div>';
        echo '<div class="infodiv">';
        echo    '<p class="poppins-bold hover:underline hover:cursor-pointer overflow-hidden" onclick="goToProductDetailWindow('.$id.')">'.$name .'</p>';
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

