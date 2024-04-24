

<?php include_once '../includes/header2.php'; ?>

<?php


if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}

$sqlCart = "SELECT orders.id, orders.added_on,orders.product_image,orders.product_quantity, orders.price, orders.product_name, users.name, users.email, users.phone, orders.total, orders.order_info
FROM orders
LEFT JOIN users ON orders.user_id=users.id WHERE orders.user_id = '$user_id'";

$sqlProdQuery = mysqli_query($con, $sqlCart);

// var_dump(mysqli_fetch_assoc($sqlProdQuery));



?>




    <div class="Order-wrapper " style="width:90%; margin: 0 auto">
        <br/>
        <h2>My Orders</h2>
        <br/>
    <table id="myTable" class="display" >
        <thead>
            <tr>
            <th>Image</th>
                <th>Prod Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Amount Paid</th>
                <!-- <th>Username</th>
                <th>Email</th>
                <th>Phone</th> -->
                <th>Order Date</th>
               
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
                <td><?= $order['total'] ?></td>

                <td><?= $order['total'] * $order['product_quantity'] ?></td>
            <!-- <td><= $order['name'] ?></td>
                <td><= $order['email'] ?></td>
                <td><= $order['phone'] ?></td> -->
                <td><?= $order['added_on'] ?></td>
                
            </tr>
            <?php endwhile; ?>
            
        </tfoot>
    </table>
    </div>



    </div>

    <!-- Modal -->
    <!-- <div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Product</h2>
        <form action="#">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>

            <label for="productDescription">Product Description:</label>
            <textarea id="productDescription" name="productDescription" required></textarea>

            <button type="submit">Add</button>
        </form>
    </div>
</div> -->

    


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