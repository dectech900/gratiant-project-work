
<?php
if(isset($_GET['logout'])){
  session_start();
  session_destroy();
  session_abort();
  session_unset();

  header("Location: ../index.php?logout");
}
?>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <img src="../logo.png">
    </div>
    <div class="sidebar-brand-text mx-3">Secure Buy</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      <!-- Features -->
    </div>


   <li class="nav-item">
    <a class="nav-link" href="pages/orders.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Orders</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="pages/sellers.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Sellers</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="pages/buyers.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Buyers</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="pages/products.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Products</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sidebar.php?logout">
      <i class="fas fa-fw fa-user"></i>
      <span>Logout</span>
    </a>
  </li>
</ul>