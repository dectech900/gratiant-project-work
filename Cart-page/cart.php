<?php include_once '../includes/header2.php';  ?>

<?php
$GLOBALS['total'] = 0;


if(isset($_SESSION['id'])){
     $user_id = $_SESSION['id'];
}

// $sqlCart = "SELECT * FROM cart";
$sqlCart = "SELECT cart.id, products.product_name, cart.sub_total, cart.price, products.images, cart.quantity, cart.user_id
FROM cart
 JOIN products ON cart.product_id=products.id WHERE cart.user_id = '$user_id'";
$queryCart  = mysqli_query($con, $sqlCart);

// var_dump($queryCart);

// echo mysqli_num_rows($queryCart);

?>


<div class="cart">
    <div class="cart-left">
        <h1>Shopping Cart</h1>

        <?php while($prod = mysqli_fetch_assoc($queryCart)):
    
            $total = $total + (float)$prod['sub_total'];
            $GLOBALS['total'] = $total;
            ?>
        <div class="product-cart-list">
            <img src="../uploads/<?= $prod['images'] ?>" width="180px" alt="">
            <div>
                <div class="product-cart-titleprice">
                    <p><?php echo $prod['product_name'] ?></p>

                </div>
                <p class="product-cart-bestseller"><span>#1 Best Seller</span> in PC Game Headsets</p>
                <p class="product-cart-stock">In Stock</p>

                </p>
                <div class="product-cart-specs">
                    <p><b>Style:</b></p>
                    <p>Wired</p>
                    <p><b>Size:</b></p>
                    <p>Free</p>
                    <p><b>Color:</b></p>
                    <p>Blue</p>
                </div>
                <div class="product-cart-list-action">
                    <select name="">
                        <option value="<?= $prod['quantity'] ?>">Qty: <?= $prod['quantity'] ?></option>
                    <?php for($i = 1; $i<=20; $i++): ?>
                <option value="<?= $i ?>">Qty: <?= $i ?></option>
                <?php endfor; ?>
                    </select>
                    <hr>
                    <p class="action-btn">Delete</p>
                    <hr>
                    <p class="action-btn">Save for later</p>
                    <hr>
                    <p class="action-btn">Compare with similar items</p>
                    <hr>
                    <p class="action-btn">Share</p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

        <hr>
        <div class="cart-list-subtotal">
            Total: <b>Ghc<?= $GLOBALS['total']; ?></b>
        </div>
    </div>
    <div class="cart-right">
        <div class="cart-free-delivery">
            <p>&#x2705</p>
            <p>Your order qualifies for FREE Delivery. <br> Choose this option at checkout. <br> See details</p>
        </div>
        <p class="cart-subtotal">Total: <b>Ghc<?= $GLOBALS['total']?></b></p>

       <a href="../includes/action.php?checkout&uid=<?= $user_id; ?>&total=<?= $GLOBALS['total']; ?>">  <button>Checkout</button></a>
       <a href="../Payment-page/payment.php?checkout&uid=<?= $user_id; ?>&total=<?= $GLOBALS['total']; ?>">  <button>Checkout2</button></a>

    </div>
</div>



</section>

<footer class="footer-cart">
    <a href="../index.php"><img src="../logo.png" width="100" alt=""></a>
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