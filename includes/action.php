<?php
session_start();
include '../database/config.php';


if (isset($_POST['loginBtn'])) { 
     $email = $_POST['email'];
     $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $sqlQuery = mysqli_query($con, $sql);


    if (mysqli_num_rows($sqlQuery) > 0) {
        $rows = mysqli_fetch_assoc($sqlQuery);

        $id = $rows["id"];
        $user_type = $rows["user_type"];
        $email = $rows["email"];
        $name = $rows["name"];

        // Log the person in
        if ($id) {
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['user_type'] = $user_type;

            //Redirect to dashboard based on user role
            if ($_SESSION['user_type'] === "SELLER") {
                header('Location: ../Sell-page/sell.php');
            } elseif ($_SESSION['user_type'] === "BUYER") {
                header('Location: ../index.php');
            }
        }
    } else {
        echo "Opps invalid credentials";
        header('Location: ../Login-page/login.html?login-error');
    }

}

if (isset($_POST['signupBtn'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_type = $_POST['user_type'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO `users`( `name`, `email`, `phone`, `user_type`, `password`) VALUES('$name','$email', '$phone', '$user_type','$password')";
    $sqlQuery = mysqli_query($con, $sql);

    // Perform a query, check for error
// if (!mysqli_query($con,"INSERT INTO `usersU`( `name`, `email`, `phone`, `user_type`, `password`) VALUES('$name','$email', '$phone', '$user_type','$password)")) {
//     echo("Error description: " . mysqli_error($con));
//   }

    //   die();

    // echo $sqlQuery;
    $last_id = mysqli_insert_id($con);
    if ($sqlQuery) {
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $last_id;
        $_SESSION['user_type'] = $user_type;
        //Redirect to dashboard based on user role
        if ($_SESSION['user_type'] === "SELLER") {
            header('Location: ../Sell-page/sell.php');
        } elseif ($_SESSION['user_type'] === "BUYER") {
            header('Location: ../index.php');
        }

        // header('Location: ../Login-page/login.html?login-success');

    } else {
        header('Location: ../Login-page/signup.html?login-error');

    }

}


if (isset($_POST['addProductBtn'])) {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $user_id = $_POST['user_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $user_id = $_POST['user_id'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $model = $_POST['model'];
    $rating = $_POST['rating'];
    $form_factor = $_POST['form_factor'];
    $technology = $_POST['technology'];
    $qty = $_POST['qty'];


    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../uploads/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $sql = "INSERT INTO `products`(`product_name`, `description`, `price`, `category`, `user_id`, `images`, `brand`, `model`, `color`,`rating`,`form_factor`,`technology`, `quantity`) VALUES ('$product_name', '$description', '$price','$category', '$user_id', '$filename','$brand', '$model','$color','$rating','$form_factor','$technology', '$qty')";

        $query = mysqli_query($con, $sql);

        mysqli_close($con);


        if ($query) {
            header('Location: ../Sell-page/sell.php');
        } else {
            $error = error_get_last();
            echo "Error: " . $error['message'];
        }
    } else {
        // Error occurred
        $error = error_get_last();
        echo "Error: " . $error['message'];
    }


}

if(isset($_GET['delete_product'])){
   echo $prod_id = $_GET['prod_id'];

    $sql = "DELETE FROM products WHERE id = '$prod_id'";
    $query = mysqli_query($con, $sql);
    if($query){
        header('Location: ../Sell-page/sell.php');
    }
}


if(isset($_POST['addToCartBtn'])){
  echo  $prod_id = $_POST['prod_id'];
  echo  $user_id = $_POST['user_id'];
  echo  $price = $_POST['price'];
  echo $quantity = $_POST['quantity'];
 echo $subTotal = (float)$price * (int)$quantity;

//     if (!mysqli_query($con,"INSERT INTO `cart`(`product_id`, `user_id`, `quantity`, `price`, `sub_total`) VALUES ('$prod_id','$user_id','$quantity','$price','$subTotal')")) {
//     echo("Error description: " . mysqli_error($con));
//   }

    $sql = "INSERT INTO `cart`(`product_id`, `user_id`, `quantity`, `price`, `sub_total`) VALUES ('$prod_id','$user_id','$quantity','$price','$subTotal')";
    $query = mysqli_query($con, $sql);

    if($query){
        header('Location: ../Product-page/product-detailed.php?prod_id='.$prod_id.'');
    }else {
        // Error occurred
        $error = error_get_last();
        echo "Error: " . $error['message'];
    }

}


if(isset($_GET['logout'])){
    session_start();
    session_destroy();
    session_abort();
    session_unset();

    header("Location: ../index.php?logout");
}


if(isset($_POST['sendMessageBtn'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $sql = "INSERT INTO `messages`(`name`, `email`, `phone`, `subject`, `message`) VALUES ('$name','$email','$phone','$subject','$message')";

    $query = mysqli_query($con, $sql);
    if($query){
        header("Location: ../Contact-page/Contact.php?message-sent");
    }
}

if(isset($_GET['checkout'])){
   echo $uid = $_GET['uid'];
   echo $total = $_GET['total'];
   $sqlCart = "SELECT cart.id, products.product_name, cart.sub_total, cart.price, products.images, cart.quantity, cart.user_id, products.user_id as seller_id
FROM cart
 JOIN products ON cart.product_id=products.id WHERE cart.user_id = '$uid'";
$queryCart  = mysqli_query($con, $sqlCart);


$products = [];

while($row = mysqli_fetch_assoc($queryCart)){
    $product_name = $row['product_name'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $images = $row['images'];
    $seller_id = $row['seller_id'];

    // $product = array(
    //     'id' => $row['id'],
    //     'product_name' => $row['product_name'],
    //     'sub_total' => $row['sub_total'],
    //     'price' => $row['price'],
    //     'images' => $row['images'],
    //     'quantity' => $row['quantity'],
    //     'seller_id' => $row['seller_id'],
    // );
    // $products[] = $product;
    $sql = "INSERT INTO `orders`(`product_name`, `product_quantity`,`price`, `seller_id`, `product_image`, `user_id`, `total`) VALUES ('$product_name','$quantity','$price', '$seller_id', '$images','$uid','$total')";

    $query = mysqli_query($con, $sql);
    $order_id = mysqli_insert_id($con);
  
}

if($query){
    $sqlDelivery = "SELECT * from delivery_info WHERE user_id = '$uid'";
    $queryDeliveryInfo = mysqli_query($con, $sqlDelivery);
    $deliveryFetch = mysqli_fetch_assoc($queryDeliveryInfo);

    

  echo  $delivery_id = $deliveryFetch['id'];
    $sqlUpdateDelivery = "UPDATE orders SET delivery_id = '$delivery_id' WHERE orders.id = '$order_id'";
    $saveQuery = mysqli_query($con, $sqlUpdateDelivery);


        if($saveQuery){
        //DELECT USER PRODUCT FROM CART
        $sqlDelCart = "DELETE FROM cart WHERE user_id = '$uid'";
        $queryDelCart = mysqli_query($con, $sqlDelCart);
        if($queryDelCart){
            header("Location: ../Product-page/product.php?order-saved");
        }
    }
  
  
}

 // Encode the $products array into JSON


}

//Update delivery info
if(isset($_POST['save_delivery'])){
    $region = $_POST['region'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $uid = $_POST['user_id'];

    $sql = "INSERT INTO `delivery_info`(`address1`, `address2`, `region`,  `user_id`) VALUES ('$address1','$address2','$region','$uid')";
    $queryDeliveryInfo = mysqli_query($con, $sql);

  
    if($queryDeliveryInfo){
        header("Location: ../Cart-page/cart.php?delivery-added");
    }
}
if(isset($_POST['updateDelivery'])){
    // $uid = $_POST['user_id'];
    $delivery_id = $_POST['delivery_id'];

    $sql = "INSERT INTO `delivery_info` SET `status` = 'DELIVERED' WHERE id = '$delivery_id'";
    $queryDeliveryInfo = mysqli_query($con, $sql);

  
    if($queryDeliveryInfo){
        header("Location: ../Order-page/seller-order.php?delivery-updated");
    }
}

///DELETE USER CART ITEM
if(isset($_GET['deleteCart'])){
    $cart_id = $_GET['cart_id'];
    $uid = $_GET['uid'];

    $sql = "DELETE FROM cart WHERE id='$cart_id' AND user_id = '$uid'";
    $queryDelCart = mysqli_query($con, $sql);

    if($queryDelCart){
        header("Location: ../Cart-page/cart.php?cart-delete");
    }


}