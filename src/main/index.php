
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
    <link href="index.css" rel="stylesheet" stylesheet="text/css">
    <script defer src="writeDB.js" type="text/javascript"></script>
    <title>Aws3mwebshop</title>
</head>
<body>
    <header>
        <div class="image">
            <a href="index.php"><img src="../../logo/logo.JPG" height="60px" width="auto" alt=""></a>
        </div>
        <div class="input-group w-50">
            <input class="form-control border-end-0 border" type="text" value="search" id="example-search-input">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary bg-white border-start-0 border ms-n3" type="button">
                <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <div class="icons">
            <div class="usericon icon">
                <i class="fa fa-user fa-lg"></i>
            </div>
            <div class="cartheart icon">
                <i class="fa fa-heart fa-lg"></i>
            </div>
            <div class="carticon icon">
                <i class="fa fa-shopping-cart fa-lg"></i>
            </div>
        </div>
    </header>
    <div class="top-products d-flex p-3">
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
                            <div class="imagediv">
                                <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                            </div>
                            <div class="line"></div>
                            <div class="infodiv">
                                <p style="font-weight: 800"><?php echo $name ?></p>
                                <div class="rating-numratings">
                                    <p>€ <?php echo $price ?></p>
                                    <p><?php echo $rating ?></p>
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
                            <div class="imagediv">
                                <img class="listimage" src=<?php echo $image ?> alt="productimage" width="130" height="150">
                            </div>
                            <div class="line"></div>
                            <div class="infodiv">
                                <p style="font-weight: 800"><?php echo $name ?></p>
                                <div class="rating-numratings">
                                    <p>€ <?php echo $price ?></p>
                                    <p><?php echo $rating ?></p>
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
        <div class="products">
            <?php
            $query = "SELECT * FROM products";
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
                        <div class="line"></div>
                        <div class="infodiv">
                            <p style="font-weight: 800"><?php echo $name ?></p>
                            <div class="rating-numratings">
                                <p>€ <?php echo $price ?></p>
                                <p><?php echo $rating ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
        </div>
        <div class="right">
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
        </div>
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
    })
</script>
</html>