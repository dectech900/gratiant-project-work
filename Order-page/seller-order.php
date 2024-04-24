

<?php include_once '../includes/header2.php'; ?>

<?php


if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}



$sqlCart = "SELECT orders.id, orders.transfered, orders.added_on, orders.product_image,orders.product_quantity, orders.price, orders.product_name, users.name, users.email, users.phone, orders.total, orders.order_info, delivery_info.address1, delivery_info.address2, delivery_info.region, delivery_info.status, delivery_info.id AS delivery_id
FROM orders
LEFT JOIN users ON orders.user_id=users.id
LEFT JOIN delivery_info ON orders.delivery_id = delivery_info.id
WHERE orders.seller_id = '$user_id'";

$sqlProdQuery = mysqli_query($con, $sqlCart);

// var_dump(mysqli_fetch_assoc($sqlProdQuery));



?>




    <div class="Order-wrapper">
    <br/>
        <h2>My Orders</h2>
        <br/>
    <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
              
                <th>Image</th>
                <th>Prod Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total</th>
                <th>Amount Transfer</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($order = mysqli_fetch_assoc($sqlProdQuery)):
              
                ?>
            <tr>
            <td><img style="width: 40px;" src="../uploads/<?= $order['product_image'] ?>"/></td>
                 <td>
                   <?php
                   if(strlen($order['product_name']) > 20){
                       echo $str = substr($order['product_name'], 0, 20) . '...';
                    }else{
                        echo $order['product_name'];
                    }
                    ?>
                </td>
                <td><?= $order['price'] ?></td>
               <td><?= $order['product_quantity'] ?></td>
               <td><?= $order['name'] ?></td>
               <td><?= $order['email'] ?></td>
               <td><?= $order['phone'] ?></td>
               <td><?= $order['total'] ?></td>
                <td>
                <?php
                    if($order['transfered'] == 1){  
                        ?>
                        <span style="background: green; padding: 4px 8px; border-radius: 7px; color:white">Transfered</span>
                        <?php                 
                            
                    }else{
                       ?>

                        <span style="background: yellow; padding: 4px 8px; border-radius: 7px;">Pending</span>
                        <?php
                    }
                ?>
                </td>
                <td><?= $order['added_on'] ?></td>
                <td >
                   <!-- Modal toggle -->
<a href="seller-order.php?deli&address1=<?=$order['address1']?>&address2=<?=$order['address2']?>&region=<?=$order['region']?>&status=<?= $order['status']?>&delivery_id=<?= $order['delivery_id']?>#" data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" 

>
  More
                </a>
                </td>
            </tr>
            <?php endwhile; ?>
          
        </tfoot>
    </table>
    </div>



    </div>

    <div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>More info</h2>

        <h3>Delivery Info </h3>
      
    </div>
</div>


<?php
if(isset($_GET['deli'])){
   
    $address1 = $_GET['address1'];
    $address2 = $_GET['address2'];
    $region = $_GET['region'];
    $delivery_status = $_GET['status'];
    $delivery_id = $_GET['delivery_id'];

    ?>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    More 
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div>Address 1</div>
                <p><?= $address1; ?></p>
              
                <div>Address 2</div>
                <p><?= $address2; ?></p>
              
                <div>Customer Region</div>
                <p><?= $region; ?></p>
              
                <div>Delivery Status </div>
                <p><?= $delivery_status; ?></p>
              

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="../includes/action.php?updateDelivery&delivery_id=<?= $delivery_id ?>" data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Mark as Delivered</a>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
            </div>
        </div>
    </div>
</div>

    <?php

}

?>




<script>

document.addEventListener("DOMContentLoaded", function () {
        const openModalBtn = document.getElementById("openModalBtn");
        const modal = document.getElementById("myModal");
        const closeModalBtn = document.getElementsByClassName("close")[0];
    
        openModalBtn.onclick = function () {
            modal.style.display = "block";
        }
    
        closeModalBtn.onclick = function () {
            modal.style.display = "none";
        }
    
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>
    <!-- <script src="sell.js"></script> -->
    <script>
        const actualPrice = document.querySelector('#actual-price');

    </script>

<script>
    // new DataTable('#example', {
    //     layout: {
    //         bottomEnd: {
    //             paging: {
    //                 boundaryNumbers: false
    //             }
    //         }
    //     }
    // });
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>

<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/v/dt/dt-2.0.5/datatables.min.js"></script> -->
    <?php  include_once "../includes/footer2.php"; ?>