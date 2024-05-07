<?php
session_start();

include "../modules/dbconnection.php";
$checkbox = $_Get['checkbox'];
$rating = $_Get['rating'];
$sortRating = $_Get['sort-rating'];
$sortPrice = $_Get['sort-price'];

if(!$rating && !$sortRating && !$checkbox && !$sortPrice){
    
}

$query = "SELECT * FROM products WHERE ";
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
                        <div class="imagediv">
                            <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                        </div>
                        <div class="infodiv">
                            <p style="font-weight: 800"><?php echo $name ?></p>
                            <div class="rating-numratings">
                                <p>€ <?php echo $price ?></p>
                                <p><?php echo $rating ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }?>