<?php include_once '../includes/header2.php';  ?>

<?php
$GLOBALS['total'] = 0;


if(isset($_SESSION['id'])){
     $user_id = $_SESSION['id'];
}

// $sqlCart = "SELECT * FROM cart";
$sqlCart = "SELECT cart.id AS cart_id, products.product_name, cart.sub_total, cart.price, products.images, cart.quantity, cart.user_id
FROM cart
 JOIN products ON cart.product_id=products.id WHERE cart.user_id = '$user_id'";
$queryCart  = mysqli_query($con, $sqlCart);

// var_dump($queryCart);

// echo mysqli_num_rows($queryCart);

?>


<?php 

if(mysqli_num_rows($queryCart) > 0){
    ?>
<div class="cart" style="display: flex;">
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
                    <a href="../includes/action.php?deleteCart&cart_id=<?= $prod['cart_id'];?>&uid=<?= $user_id; ?>">
                        <p class="action-btn">Delete</p>
                    </a>
                    <hr>
                    <!-- <p class="action-btn">Save for later</p>
                    <hr>
                    <p class="action-btn">Compare with similar items</p>
                    <hr>
                    <p class="action-btn">Share</p> -->
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


        <!-- add delivery info -->
        <button id="openModalBtn">&#43; Add Delivery Info </button>
        

        <a href="../Payment-page/payment.php?checkout&uid=<?= $user_id; ?>&total=<?= $GLOBALS['total']; ?>">
            <button>Checkout</button></a>

    </div>
</div>
<?php
}else{
    echo "No cart available.. Please back and add products to your cart first";
}

?>


<div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Your Delivery Info</h2>
        <form action="../includes/action.php" method="POST" enctype="multipart/form-data" id="addProductForm">
            <span class="address1">
                <label for="address1">Address 1</label>
                <input type="text" id="address1" name="address1" required>
                <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['id']; ?>" required>
            </span>
            <span class="productName">

                <label for="address2">Address 2</label>
                <input type="text" id="address2" name="address2" required>

            </span>
            <span class="productName">
                <label for="region">Region</label>
                <input type="text" id="region" name="region" required>
            </span>

            <button type="submit" name="save_delivery">Add Delivery</button></a>

        </form>
    </div>
</div>


</section>



<script>

document.addEventListener("DOMContentLoaded", function () {
        const openModalBtn = document.getElementById("openModalBtn");
        const modal = document.getElementById("myModal");
        const closeModalBtn = document.getElementsByClassName("close")[0];
    
        openModalBtn.onclick = function () {
            modal.style.display = "block";
        }
    
        closeModalBtn.onclick = function () {
            modal.style.display = "none";
        }
    
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>
<script>
const scrollContainer = document.querySelectorAll(".products");
for (const item of scrollContainer) {
    item.addEventListener("wheel", (evt) => {
        evt.preventDefault();
        item.scrollLeft += evt.deltaY;
    });
}
</script>

<?php  include_once '../includes/footer2.php'; ?>