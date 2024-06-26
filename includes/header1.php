<?php
if(isset($_SESSION['id'])){
     $user_id = $_SESSION['id'];
     $name = $_SESSION['name'];
     $sqlCart = "SELECT * FROM cart WHERE user_id = '$user_id'";
     $queryCart  = mysqli_query($con, $sqlCart);
    
     $totalCartItems = mysqli_num_rows($queryCart);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SECURE.BuynSell</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="Product-page/product.css">
<link rel="stylesheet" href="Product-page/prod.css">
<link rel="stylesheet" href="Cart-page/cart.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>

    <nav>
        <a href="index.php"><img src="logo.png" width="100" alt=""></a>
        <div class="nav-search">
            <div class="nav-search-category">
                <p>All</p>
                <img src="assets/dropdown_icon.png" height="12" alt="">
            </div>
            <input type="text" class="nav-search-input" placeholder="Search SECURE.BuynSell">
            <img src="assets/search_icon.png" class="nav-search-icon" alt="">
        </div>
        <div class="nav-texts">
            <?php
            if(isset($_SESSION['id'])) {
                ?>
         <p><a href="">Hello,  <?= $_SESSION['name'] ?></a>
            </p>
                <?php
            }else{
                ?>
         <p><a href="Login-page/login.html">Hello,  sign in</a></p>
                <?php
            }
            ?>
   
        </div>
        <a href="Login-page/login.html" class="mobile-user-icon" style="display: none;">
            <img src="assets/user.png">
        </a>
        <a href="Cart-page/cart.php" class="nav-cart">
            
            <?php
            if(isset($_SESSION['id'])){
                ?>
                <img src="assets/cart_icon.png" width="32px" alt="">
  <h4>Cart </h4>
  <span style="padding-left: 5px;">(<?= $totalCartItems; ?>)</span>
                <?php
            }
            ?>
           
           
        </a>
    </nav>
    <div class="nav-bottom">
        <div>
            <img src="assets/menu_icon.png" width="25px" alt="">
        </div>
        <p><a href="index.php"> Home</a></p>
        <p><a href="Product-page/product.php"> Product</a></p>
        <p><a href="About-page/About.php"> About</a></p>
        <p><a href="Contact-page/contact.php"> Contact</a></p>
       

        <?php
            if(isset($_SESSION['id'])  && $_SESSION['user_type'] == "SELLER") {
                ?>
       <p><a href="Sell-page/sell.php"> Sell</a></p>
       <p><a href="Order-page/buyer-order.php"> Orders</a></p>
       <p><a href="includes/action.php?logout">Logout </a></p>
                <?php
            }elseif(isset($_SESSION['id']) && $_SESSION['user_type'] == "BUYER"){
                ?>
              
               <p> <a href="Order-page/buyer-order.php">My Orders</a></p>
                <p><a href="includes/action.php?logout"> Logout</a></p>
                         <?php
            } else{
                ?>
         
                <?php
            }
            ?>
        


    </div>