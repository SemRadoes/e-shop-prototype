<?php
include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $categoryid;
    $minval = $_POST['minval'];
    $maxval = $_POST['maxval'];
    $pricesort;
    $ratingsort;
    $rating;
    
    if(isset($_POST['sortingprice'])){
        $pricesort = $_POST['sortingprice'];
    }
    if(isset($_POST['sortingrating'])){
        $ratingsort = $_POST['sortingrating'];
    }
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
            $query .= " WHERE rating >= '$rating'";
        } else {
            $query .= " and rating >= '$rating'";
        }
    }
    if($pricesort == "default"){
        $query .= "";
    } else{
        if($pricesort == "ascending"){
            if($ratingsort != "default"){
                echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center h-32 col-span-3" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>You can only chose one sorting possibility</p>
                </div>';
                exit();
            } else {
                $query .= " ORDER BY price ASC";
            }
        } else {
            if($ratingsort != "default"){
                echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center h-32 col-span-3" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>You can only chose one sorting possibility</p>
                </div>';
                exit();
            } else {
                $query .= " ORDER BY price DESC";
            }
        }
    }
    if($ratingsort == "default"){
        $query .= "";
    } else{
        if($ratingsort == "ascending"){
            if($pricesort != "default"){
                echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center h-32 col-span-3" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>You can only chose one sorting possibility</p>
                </div>';
                exit();
            } else {
                $query .= " ORDER BY rating ASC";
            }
        } else {
            if($pricesort != "default"){
                echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center h-32 col-span-3" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>You can only chose one sorting possibility</p>
                </div>';
                exit();
            } else {
                $query .= " ORDER BY rating DESC";
            }
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
        echo    '<div class="productWrapper">
                       <div class="imagediv hover:cursor-pointer flex justify-center" onclick="goToProductDetailWindow('.$id.')">
                            <img class="listimage" src='.$image.' alt="productimage">
                        </div>
                            <div class="flex flex-col gap-2 p-3 grow">
                            <p class="poppins-bold hover:underline hover:cursor-pointer h-12 overflow-hidden" onclick="goToProductDetailWindow('.$id.')">'.$name.'</p>
                            <p class="star">'.$rating.'&nbsp;&nbsp;<span>('.$numberOfRatings.')</span></p>
                            <p>'.$description.'</p>
                        </div>
                        <div class="infodiv">
                            <div class="rating-numratings poppins-light">
                                <p class="price poppins-bold">€ '.$price.'</p>
                            </div>
                            <div class="flex flex-col justify-between gap-2 w-30">
                                <i class="fa fa-heart w-full p-3 rounded wishlistButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to wishlist</span></i>
                                <i class="fa fa-shopping-cart w-full p-3 rounded cartButton hover:cursor-pointer">&nbsp;<span class="poppns-regular">Add to cart</span></i>
                            </div>
                        </div>
                    </div>';
    }
}

