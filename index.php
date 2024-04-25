<?php
session_start();
include 'database/config.php';


if(isset($_SESSION['id'])){
     $user_id = $_SESSION['id'];
     $name = $_SESSION['name'];
}

$sqlProd = "SELECT * FROM product_category ORDER BY RAND() LIMIT 4";
$sqlProdCateQuery = mysqli_query($con, $sqlProd);

$sqlBestSell = "SELECT * FROM products ORDER BY RAND() LIMIT 5";
$sqlProdBestSellQuery = mysqli_query($con, $sqlBestSell);


$sqlDeals = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
$sqlProdDealsQuery = mysqli_query($con, $sqlDeals);

?>

<?php include_once 'includes/header1.php';  ?>


    <div class="header-slider" id="slider">
        <a href="#" class="control_prev">&#129144</a>
        <a href="#" class="control_next">&#129146</a>
        <ul>
            <img class="header-img" src="./assets/header2.jpg" alt="">
            <img class="header-img" src="./assets/header5.jpg" alt="">
        </ul>
    </div>

    <div class="box-row">
        <?php while($cat = mysqli_fetch_assoc($sqlProdCateQuery)):  ?>
        <div class="box-col">
            <h3><?= $cat['category_name'];  ?></h3>
           <div style="width: 250px; height: 200px; overflow: hidden">
           <img style="width: 100%; height: 200px;" src="./assets/category/<?= $cat['category_image'] ?>" alt="">
        </div>
            <a href="Product-page/product.php?category&cat_id=<?= $cat['id']; ?>&cat_name=<?= $cat['category_name'] ?>">Shop More</a>
        </div>
        <?php endwhile; ?>

        <!-- <div class="box-col">
            <h3>Latest Devices</h3>
            <img src="assets/" alt="">
            <a href="">Shop More</a>
        </div>
        <div class="box-col">
            <h3>Electronics</h3>
            <img src="c:\Users\Graham\Downloads\WhatsApp Image 2024-04-10 at 8.21.09 PM.jpeg" alt="">
            <a href="">Shop More</a>
        </div>
        <div class="box-col">
            <h3>Fashion </h3>
            <img src="./assets/box2-4.jpg" alt="">
            <a href="">Shop More</a>
        </div> -->

    </div>



    <div class="products-slider">
        <h2>Best Selling Products</h2>
        <br/>
        <div class="product-grid" style="width: 97%">

<?php while($prod = mysqli_fetch_assoc($sqlProdBestSellQuery)): ?>
<div class="product-item" >
    <a href="Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>"> <img src="uploads/<?= $prod['images']?>" alt="" style="width: 100px;"></a>
    <span class="item-box">
        <a href="Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>"><h4><?php 
        if(strlen($prod['product_name']) > 50){
           echo $str = substr($prod['product_name'], 0, 50) . '...';
        }else{
            echo $prod['product_name'];
        }
        ?></h4></a>
        <p><a href="Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>">GH₵<?= $prod['price'] ?></a></p>
        <!-- <div class="product-actions">
            <span class="material-symbols-outlined">
                note_stack_add
            </span>
            <span class="material-symbols-outlined">
                delete
            </span>
        </div> -->
    </span>
</div>
<?php endwhile; ?>




</div>
    </div>






    <div class="products-slider-with-price">
        <h2>Deals</h2>
        <div class="products">
        <?php while($prod = mysqli_fetch_assoc($sqlProdDealsQuery)): ?>
            <div class="product-card">
                <a href="Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>">
                <div class="product-img-container">
                    <img src="uploads/<?= $prod['images']?>" alt="">
                </div>
                <div class="product-price">
                    <p><?= $prod['price']?>Ghc</p> <span>Price</span>
                </div>
                <h4>
                    <?php
                        if(strlen($prod['product_name']) > 20){
                            echo $str = substr($prod['product_name'], 0, 20) . '...';
                         }else{
                             echo $prod['product_name'];
                         }
                         ?>
                </h4>
             </a>
            </div>
            <?php endwhile; ?>

<!-- 
            <div class="product-card">
                <div class="product-img-container">
                    <img src="./assets/product2-3.jpg" alt="">
                </div>
                <div class="product-price">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="./assets/product2-3.jpg" alt="">
                </div>
                <div class="product-price">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="./assets/product2-3.jpg" alt="">
                </div>
                <div class="product-price">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="./assets/product2-3.jpg" alt="">
                </div>
                <div class="product-price">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="./assets/product2-3.jpg" alt="">
                </div>
                <div class="product-price">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div> -->
        </div>
    </div>


   <?php include_once 'includes/footer1.php';?>