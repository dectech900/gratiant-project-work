<?php
include('includes/dbconnection.php');
// include('includes/checklogin.php');
// check_login();

?>

<?php include 'includes/head.php'; ?>

<?php
$sqlUserSeller = "SELECT * FROM users WHERE user_type = 'SELLER'";
$sqlUserSellerQuery = mysqli_query($con, $sqlUserSeller);
$sellerTotal = mysqli_num_rows($sqlUserSellerQuery);

$sqlUserBuyer = "SELECT * FROM users WHERE user_type = 'BUYER'";
$sqlUserBuyerQuery = mysqli_query($con, $sqlUserBuyer);
$BuyerTotal = mysqli_num_rows($sqlUserBuyerQuery);

$sqlUserOrders = "SELECT * FROM orders";
$sqlUserOrdersQuery = mysqli_query($con, $sqlUserOrders);
$OrdersTotal = mysqli_num_rows($sqlUserOrdersQuery);

$sqlUserProducts = "SELECT * FROM products";
$sqlUserProductsQuery = mysqli_query($con, $sqlUserProducts);
$ProductsTotal = mysqli_num_rows($sqlUserProductsQuery);

?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include('includes/sidebar.php');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('includes/header.php');?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Products </div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ProductsTotal; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Orders</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $OrdersTotal ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Sellers</div>
                     
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $sellerTotal;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Buyers</div>
                   
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $BuyerTotal;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Invoice Example -->
        <?php include('includes/modal.php');?>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php include('includes/footer.php');?>

      <!-- Footer -->
