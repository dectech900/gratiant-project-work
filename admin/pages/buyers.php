<?php
// include('includes/checklogin.php');
include('../includes/dbconnection.php');
// check_login();
$user_type = 'BUYER';
$sqlUser = "SELECT * FROM users WHERE user_type = '$user_type'";

$sqlUserQuery = mysqli_query($con, $sqlUser);

?>

<?php include 'head.php'; ?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include('../includes/sidebar2.php');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('../includes/header.php');?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buyers</h1>
           
          </div>

         <!-- Content goes here  -->
         <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <!-- <th>Image</th> -->
      
                <th>Name</th>
                <!-- <th>Username</th> -->
                <th>Email</th>
                <th>Phone</th>
                <th>Date Joined</th>
                <!-- <th>Status</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($user = mysqli_fetch_assoc($sqlUserQuery)):
              
                ?>
            <tr>
         
                <!-- <td><imorderg style="width: 40px;" src="../../uploads/<= $user['product_image'] ?>"/></td> -->
                
               <td><?= $user['name'] ?></td>
               
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['added_on'] ?></td>
                
                <td><a class="btn btn-danger btn-sm">Remove</a> </td>
            </tr>
            <?php endwhile; ?>
          
        </tfoot>
    </table>

        </div>
        <!-- Invoice Example -->
        <?php include('../includes/modal.php');?>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php include('../includes/footer2.php');?>

      <!-- Footer -->
