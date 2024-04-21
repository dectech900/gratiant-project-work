<?php
session_start();
include '../database/config.php';

if(isset($_SESSION['id'])){
     $user_id = $_SESSION['id'];
     $name = $_SESSION['name'];
}

$sqlProd = "SELECT * FROM products";
// $sqlProdCateQuery = mysqli_query($con, $sqlProdCate);

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
        <div class="box-col">
            <h3>Grooming Products</h3>
            <img src="./assets/box2-1.jpg" alt="">
            <a href="">Shop More</a>
        </div>
        <div class="box-col">
            <h3>Latest Devices</h3>
            <img src="c:\Users\Graham\Downloads\WhatsApp Image 2024-04-10 at 8.16.34 PM.jpeg" alt="">
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
        </div>

    </div>



    <div class="products-slider">
        <h2>Best Sellers</h2>
        <div class="products">
            <img src="///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/assets/product_img.jpg">
            <img src="https://fabamall.com/media/product/image/2022/12/image_picker7054751434124680564.jpg">
            <img src="https://pictures-ghana.jijistatic.net/39109095_NjIwLTcyNi0zNjEzYmU0MmFj.webp">
            <img src="">
            <img src="./assets/product1-4.jpg">
            <img src="./assets/product1-5.jpg">
            <img src="./assets/product1-6.jpg">
            <img src="./assets/product1-7.jpg">
        </div>
    </div>



    <div class="box-row">
        <div class="box-col">
            <h3>Gaming </h3>
            <img src="///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/assets/product_img.jpg">
            <a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/product.php">Shop More</a>
        </div>
        <div class="box-col">
            <h3>Stationery</h3>
            <img src="./assets/box3-1.jpg" alt="">
            <a href="">Shop More</a>
        </div>
        <div class="box-col">
            <h3>Laptops for study</h3>
            <img src="./assets/box3-2.jpg" alt="">
            <a href="">Shop More</a>
        </div>
        <div class="box-col">
            <h3>Office chairs</h3>
            <img src="./assets/box3-3.jpg" alt="">
            <a href="">Shop More</a>
        </div>

    </div>



    <div class="products-slider-with-price">
        <h2>Deals</h2>
        <div class="products">
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
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="./assets/product2-3.jpg" alt="">
                </div>
                <div class="product-price">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>>
        </div>
    </div>
    <BR>
    <BR>

    <footer>
        <a href="#" class="footer-title">
            Back to top
        </a>
        <div class="footer-items">
            <ul>
                <h3>Get to Know Us</h3>
                <li><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/About.html">About us</a></li>
            </ul>
            <br>
            <br>
            <br>
            <ul>
                <h3>Make Money with Us</h3>
                <li><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/SELL%20ON%20SECURE.Buynsell.php">Sell
                        on SECURE.BuynSell</a></li>
                <li><a
                        href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/Protect%20and%20build%20your%20brand.html">Protect
                        and Build Your Brand</a></li>
                <li><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/Advertise%20your%20product.php">Advertise
                        Your Products</a></li>
                <li><a
                        href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/Receive%20pament%20for%20your%20item%20with%20our%20escrow%20service.html">Recieve
                        payment for your items with our escrow service </a></li>
            </ul>
            <ul>
                <h3>Let Us Help You</h3>
                <li><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/Your%20Account.html">Your
                        Account</a></li>
                <li><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/Return%20centre.html">Return
                        Centre</a></li>
                <li><a
                        href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/100%25%20Puurchase%20protection.html">100%
                        Purchase Protection</a></li>
                <li><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/CONTACT.html">Contact Us</a></li>
            </ul>
        </div>

    </footer>
    <script src="./script.js"></script>
</body>

</html>