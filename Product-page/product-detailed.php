<?php include_once '../includes/header2.php';  ?>

<?php
if(isset($_GET['prod_id'])){
    $prod_id =$_GET['prod_id'];

$sqlProd = "SELECT * FROM products WHERE id = '$prod_id'";
$sqlProdQuery = mysqli_query($con, $sqlProd);
$product = mysqli_fetch_assoc($sqlProdQuery);



}

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}

?>

    <p class="breadcrum">
        Video Games > PC > Accessories > Headset
    </p>

    <div class="product-display">
        <div class="product-d-image">
            <!-- <div class="product-list-image">
                <img src="../assets/product_img.jpg" width="60" alt="">
                <img src="../assets/product_img.jpg" width="60" alt="">
                <img src="../assets/product_img.jpg" width="60" alt="">
                <img src="../assets/product_img.jpg" width="60" alt="">
                <img src="../assets/product_img.jpg" width="60" alt="">
            </div> -->
            <div class="product-main-image">
                <img src="../uploads/<?= $product['images']?>" width="400" alt="">
            </div>
        </div>
        <div class="product-d-details">
            <p class="product-title">
                <?= $product['product_name'];?>
                <!-- BENGOO G9000 Stereo Gaming Headset for PS4 PC Xbox One PS5 Controller, Noise Cancelling Over Ear
                Headphones with Mic, LED Light, Bass Surround, Soft Memory Earmuffs (Blue) -->
            </p>
            <a href="product.php" class="product-store">
                Visit the GRATIAN Store
</a>
            <div class="product-rating">
                <div>
                    <div><?= $product['rating'] ?> <img src="../assets/rating_img.png" height="20px" alt=""></div>
                    <p>10O+ ratings </p>
                </div>
                <p><span>Ghc<?= $product['price'] ?></span>Price</p>
                <hr>
            </div>
            <div class="product-prices">
    
             
            </div>
            <div class="product-color-selection">
                <p>Color: <b>Blue</b></p>
                <div class="product-color-options">
                    <div class="option">
                        <img src="../assets/product_img.jpg" width="30px" alt="">
                        <p>Black</p>
                    </div>
                    <div class="option">
                        <img src="../assets/product_img.jpg" width="30px" alt="">
                        <p>Blue</p>
                    </div>
                    <div class="option">
                        <img src="../assets/product_img.jpg" width="30px" alt="">
                        <p>Green</p>
                    </div>
                    <div class="option">
                        <img src="../assets/product_img.jpg" width="30px" alt="">
                        <p>Pink</p>
                    </div>
                    <div class="option">
                        <img src="../assets/product_img.jpg" width="30px" alt="">
                        <p>Purple</p>
                    </div>
                    <div class="option">
                        <img src="../assets/product_img.jpg" width="30px" alt="">
                        <p>Red</p>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <p><b>Brand</b></p>
                <p><?= $product['brand'] ?></p>
                <p><b>Model Name</b></p>
                <p><?= $product['model'] ?></p>
                <p><b>Color</b></p>
                <p><?= $product['color'] ?></p>
                <p><b>Form Factor</b></p>
                <p><?= $product['form_factor'] ?></p>
                <p><b>Connectivity Technology</b></p>
                <p><?= $product['technology'] ?></p>
            </div>
            <hr>
            <div class="product-description">
                <h1>About this item</h1>

                <?= $product['description'];?>

                <!-- <ul>
                    <li>【Multi-Platform Compatible】Support PlayStation 4, New Xbox One, PC, Nintendo 3DS, Laptop, PSP, Tablet, iPad, Computer, Mobile Phone. Please note you need an extra Microsoft Adapter (Not Included) when connect with an old version Xbox One controller.</li>
                    <li>【Surrounding Stereo Subwoofer】Clear sound operating strong brass, splendid ambient noise isolation and high precision 40mm magnetic neodymium driver, acoustic positioning precision enhance the sensitivity of the speaker unit, bringing you vivid sound field, sound clarity, shock feeling sound. Perfect for various games like Halo 5 Guardians, Metal Gear Solid, Call of Duty, Star Wars Battlefront, Overwatch, World of Warcraft Legion, etc.</li>
                    <li>【Noise Isolating Microphone】Headset integrated onmi-directional microphone can transmits high quality communication with its premium noise-concellng feature, can pick up sounds with great sensitivity and remove the noise, which enables you clearly deliver or receive messages while you are in a game. Long flexible mic design very convenient to adjust angle of the microphone.</li>
                    <li>【Great Humanized Design】Superior comfortable and good air permeability protein over-ear pads, muti-points headbeam, acord with human body engineering specification can reduce hearing impairment and heat sweat.Skin friendly leather material for a longer period of wearing. Glaring LED lights desigend on the earcups to highlight game atmosphere.</li>
                    <li>【Effortlessly Volume Control】High tensile strength, anti-winding braided USB cable with rotary volume controller and key microphone mute effectively prevents the 49-inches long cable from twining and allows you to control the volume easily and mute the mic as effortless volume control one key mute.</li>
                </ul> -->
            </div>
        </div>
        <div class="product-d-purchase">
            <div class="title">
               </div>
            <div class="gap">
                <p>Or fastest delivery <b>Tomorrow</b>, <b>January 23</b>. Order within <span>10 hrs 56 mins</span></p>
            </div>
            
            <h2 class="product-stock">In Stock</h2>
            <form method="POST" action="../includes/action.php">
                <input type="hidden" name="prod_id" value="<?= $product['id']; ?>" />
                <input type="hidden" name="user_id" value="<?= $user_id; ?>" />
                <input type="hidden" name="price" value="<?= $product['price']; ?>" />

            <select name="quantity" class="product-quantity">
                <?php for($i = 1; $i<=20; $i++): ?>
                <option value="<?= $i ?>">Quantity: <?= $i ?></option>
                <?php endfor; ?>
                <!-- <option value="2">Quantity: 2</option>
                <option value="3">Quantity: 3</option> -->
            </select>
            
            <button type="submit" name="addToCartBtn" class="btn">
                Add to cart
                <!-- <a href="product-detailed.php?cart=" >Add to cart</a> -->
            </button>
            </form>
            <button class="btn product-buy">
                <a href="/Payment-page/PAYMENT.HTML" >Buy Now</a>
            </button>
            <div class="product-seller-info">
                <p>Delivery from</p>
                <p class="product-info-value">SECURE.BuynSell</p>
                <p>Sold by</p>
                <p class="product-info-value">GRATIAN DIADEM</p>
                
                <p>Payment</p>
                <p class="product-info-value">Secure transaction</p>
            </div>
            <hr>
            
        </div>
    </div>

    <div class="products-slider-with-price">
        <h2>Deals</h2>
        <div class="products">
            <div class="product-card">
                <div class="product-img-container">
                    <img src="../assets/product2-3.jpg" alt="">
                </div>
                <div class="product-offer">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="../assets/product2-3.jpg" alt="">
                </div>
                <div class="product-offer">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="../assets/product2-3.jpg" alt="">
                </div>
                <div class="product-offer">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="../assets/product2-3.jpg" alt="">
                </div>
                <div class="product-offer">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="../assets/product2-3.jpg" alt="">
                </div>
                <div class="product-offer">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
            <div class="product-card">
                <div class="product-img-container">
                    <img src="../assets/product2-3.jpg" alt="">
                </div>
                <div class="product-offer">
                    <p>50.00Ghc</p> <span>Price</span>
                </div>
                <h4>This product is the best for you</h4>
            </div>
        </div>
    </div>
    <footer class="product-footer">
        <a href="../index.php"><img src="../LOGO 6.png" width="100" alt=""></a>
        <p>© 2024, SECURE.BuynSell</p>
    </footer>

<script>
    const scrollContainer = document.querySelectorAll(".products");
    for (const item of scrollContainer) {
        item.addEventListener("wheel", (evt) => {
        evt.preventDefault();
        item.scrollLeft += evt.deltaY;
    });
    }
</script>
</body>
</html>