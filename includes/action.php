<?php
// session_start();
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
            if ($_SESSION['user_type'] != "SELLER") {
                header('Location: ../Sell-page/sell.html');
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
   echo $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_type = $_POST['user_type'];

    $sql = "INSERT INTO users(name, email, password, user_type) VALUES('$name','$email','$password','$user_type')";
    $sqlQuery = mysqli_query($con, $sql);
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
        if ($_SESSION['user_type'] != "SELLER") {
            header('Location: ../Sell-page/sell.html');
        } elseif ($_SESSION['user_type'] != "BUYER") {
            header('Location: ../index.php');
        }

        // header('Location: ../Login-page/login.html?login-success');

    } else {
        header('Location: ../Login-page/signup.html?login-error');

    }

}



