<?php
// include('includes/checklogin.php');
include('../includes/dbconnection.php');
// check_login();
$sqlCart = "SELECT orders.id, orders.transfered, orders.added_on, orders.product_image,orders.product_quantity, orders.price, orders.product_name, users.name, users.email, users.phone, orders.total, orders.order_info
FROM orders
LEFT JOIN users ON orders.user_id=users.id";

$sqlProdQuery = mysqli_query($con, $sqlCart);

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
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
           
          </div>

         <!-- Content goes here  -->
         <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <!-- <th>Image</th> -->
                <th>Product</th>
                <th>Product name</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Amount Paid</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($order = mysqli_fetch_assoc($sqlProdQuery)):
              
                ?>
            <tr>
         
                <td><img style="width: 40px;" src="../../uploads/<?= $order['product_image'] ?>"/></td>
                 <td>
                   <?php
                   if(strlen($order['product_name']) > 20){
                       echo $str = substr($order['product_name'], 0, 20) . '...';
                    }else{
                        echo $order['product_name'];
                    }
                    ?>
                </td>
               <td><?= $order['product_quantity'] ?></td>
                <td><?= $order['total'] ?></td>
                <td><?= $order['total'] ?></td>
                <td><?= $order['name'] ?></td>
                <td><?= $order['email'] ?></td>
                <td><?= $order['phone'] ?></td>
                <td><?= $order['added_on'] ?></td>
                <td><?php
                    if($order['transfered'] == 1){                   
                             echo "<span class='btn btn-sm btn-success'>Transfered</span>";
                    }else{
                        echo "<span class='btn btn-sm btn-warning'>Not Transfered</span>";
                    }
                ?></td>
                <td> <a href="../includes/action.php?transfer_order&order_id=<?= $order['id'];?>"  class="btn btn-default btn-sm">Transfer</a></td>
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
