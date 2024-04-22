<?php include_once '../includes/header2.php'; ?>

<?php
if(isset($_GET['checkout'])){
  $uid = $_GET['uid'];
  $total = $_GET['total'];

}
?>
   
        
    </div>
    <br>
    <br>
    <br>
    <form id="paymentForm">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email-address" required />
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="tel" id="amount" readonly value="<?= $total;?>" required />
        </div>
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input type="text" id="first-name" />
        </div>
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input type="text" id="last-name" />
        </div>
        <div class="form-submit">
          <button type="submit" onclick="payWithPaystack()"> Pay </button>
        </div>
      </form>
      <br>
      <br>
      
      <br/><br/>
    <?php include_once '../includes/footer2.php'; ?>









