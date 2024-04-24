<?php
// include('includes/checklogin.php');
include('../includes/dbconnection.php');
// check_login();
$sqlCart = "SELECT products.id,  products.product_name,products.description, products.quantity, products.price, products.images, products.brand, products.model, products.color, products.form_factor, products.rating, products.added_on, product_category.category_name
FROM products
 JOIN product_category ON products.category=product_category.id";

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
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
           
          </div>

         <!-- Content goes here  -->
         <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Product sold</th>
                <th>category</th>
                <th>Brand</th>
                <th>Added On</th>
                <!-- <th>Phone</th>
                <th>Order Date</th>
                <th>Status</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($prod = mysqli_fetch_assoc($sqlProdQuery)):
              
                ?>
            <tr>
         
                <td><img style="width: 40px;" src="../../uploads/<?= $prod['images'] ?>"/></td>
                 <td>
                   <?php
                   if(strlen($prod['product_name']) > 20){
                       echo $str = substr($prod['product_name'], 0, 20) . '...';
                    }else{
                        echo $prod['product_name'];
                    }
                    ?>
                </td>
               <td><?= $prod['quantity'] ?></td>
                <td><?= $prod['price'] ?></td>
                <td><?= 10 ?></td>
                <td><?= $prod['category_name'] ?></td>
                <td><?= $prod['brand'] ?></td>
                
                <td><?= $prod['added_on'] ?></td>
       
                <td><a href="../../Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>" target="_blank"  class="btn btn-success btn-sm">View</a><a class="btn btn-danger btn-sm">Del</a> </td>
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
