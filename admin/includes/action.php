<?php
session_start();

include_once 'dbconnection.php';

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
            if ($_SESSION['user_type'] === "ADMIN") {
                header('Location: ../dashboard.php');
            } else {
                header('Location: ../index.php');
            }
        }
    } else {
        echo "Opps invalid credentials";
        header('Location: ../index.php');;
    }

}


if(isset($_GET['transfer_order'])){
    $order_id = $_GET['order_id'];
    $sql = "UPDATE orders SET transfered = 1 WHERE id = '$order_id'";
    $query = mysqli_query($con, $sql);
    if($query){
        header('Location: ../pages/orders.php?transfered=true');
    }
}