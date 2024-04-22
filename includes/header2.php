<?php
session_start();
include '../database/config.php';

if(isset($_SESSION['id'])){
     $user_id = $_SESSION['id'];
     $name = $_SESSION['name'];
}
$sqlCart = "SELECT * FROM cart WHERE user_id = '$user_id'";
$queryCart  = mysqli_query($con, $sqlCart);


$totalCartItems = mysqli_num_rows($queryCart);



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SECURE.BuynSell</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../Product-page/product.css">
<link rel="stylesheet" href="../Product-page/prod.css">
<link rel="stylesheet" href="../Cart-page/cart.css">
<link rel="stylesheet" href="../Order-page/order.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <!-- <link href="https://cdn.datatables.net/v/dt/dt-2.0.5/datatables.min.css" rel="stylesheet"> -->
        <!-- <link href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
        <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Outfit;
}
html {
    scroll-behavior: smooth;
  }

body {
    background: rgb(152, 233, 233);
  min-height: 100vh; /* vh stands for viewport height */
}

a:hover {
    color: #ddd;
  }
a {
    text-decoration: none;
    color: inherit;
}

nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: white;
    padding: 10px 20px;
    color: black;
}


.nav-texts {
    margin-left: 5px;
}

.nav-texts p {
    font-size: 20px;
}

.nav-texts h1 {
    font-size: 10px;
}

.nav-cart {
    display: flex;
    align-items: end;
    margin: 0px 15px;
}


        #paymentForm {
    width: 300px;
    margin: 0 auto;
  }

  /* Styling for form groups */
  .form-group {
    margin-bottom: 20px;
  }

  /* Styling for labels */
  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;

  }

  /* Styling for input fields */
  input[type="email"],
  input[type="tel"],
  input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid aqua;
    border-radius: 4px;
  }

  /* Styling for submit button */
  button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #45a049;
  }
  footer{
       
          
          .footer-items {
            display: flex;
            justify-content: space-evenly;
            width: 100%;
            margin: 0 auto;
            background: #232f3e;
          }
          
          .footer-items h3 {
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
            margin: 20px 0 10px 0;
          }
          
          .footer-items ul {
            list-style: none;
            margin-bottom: 20px;
          }
          
          .footer-items li a {
            color: #ddd;
            font-size: 0.875rem;
          }
          
          .footer-items li a:hover {
            text-decoration: underline;
          } 
         
    }

    </style>
</head>

<body>

    <nav>
        <a href="../index.php"><img src="../logo.png" width="100" alt=""></a>
        <div class="nav-search">
            <div class="nav-search-category">
                <p>All</p>
                <img src="../assets/dropdown_icon.png" height="12" alt="">
            </div>
            <input type="text" class="nav-search-input" placeholder="Search SECURE.BuynSell">
            <img src="../assets/search_icon.png" class="nav-search-icon" alt="">
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
        <a href="../Login-page/login.html" class="mobile-user-icon" style="display: none;">
            <img src="../assets/user.png">
        </a>
        <a href="../Cart-page/cart.php" class="nav-cart">
            <img src="../assets/cart_icon.png" width="32px" alt="">
            
            <h4>Cart </h4>
            <span><?= $totalCartItems; ?></span>
        </a>
    </nav>
    <div class="nav-bottom">
        <div>
            <img src="../assets/menu_icon.png" width="25px" alt="">
        </div>
        <p><a href="../index.php"> Home</a></p>
        <p><a href="../Product-page/product.php"> Product</a></p>
        <!-- <p><a href="file:///C:/xampp/htdocs/SECURE.BuynSell%20project%20work/About.html"> About</a></p> -->
        <p><a href="../Contact-page/contact.php"> Contact</a></p>

        <?php
            if(isset($_SESSION['id'])  && $_SESSION['user_type'] == "SELLER") {
                ?>
       <p><a href="../Sell-page/sell.php"> Sell</a></p>
       <p><a href="../Order-page/order.php"> Orders</a></p>
       <p><a href="../includes/action.php?logout">Logout </a></p>
                <?php
            }elseif(isset($_SESSION['id']) && $_SESSION['user_type'] == "BUYER"){
                ?>
                <!-- <p><a href="../Sell-page/sell.php"> Sell</a></p>
                <p><a href="../Order-page/order.php"> Orders</a></p> -->
                <p><a href="../includes/action.php?logout"> Logout</a></p>
                         <?php
            } else{
                ?>
         
                <?php
            }
            ?>
        


    </div>