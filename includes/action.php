<?php
session_start();
include '../database/config.php';


if (isset($_POST['loginBtn'])) {
    echo $email = $_POST['email'];
    echo $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $sqlQuery = mysqli_query($con, $sql);

    var_dump($sqlQuery);

    if (mysqli_num_rows($sqlQuery) > 0) {
        $rows = mysqli_fetch_assoc($sqlQuery);


        // var_dump($rows);

        // die();

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
            } elseif ($_SESSION['user_type'] != "BUYER") {
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
    $phone = "023233434";

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
    $user_id2 = $_POST['user_2d'];


    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];

    $folder = "../uploads/" . $filename;


    if (move_uploaded_file($tempname, $folder)) {
        $sql = "INSERT INTO `products`(`product_name`, `description`, `price`, `category`, `user_id`, `images`) VALUES ('$product_name', '$description', '$price','$category', '$user_id', '$filename')";

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


