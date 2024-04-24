

<?php include_once '../includes/header2.php'; ?>

<?php



$title = "";
if(isset($_GET['category'])){
$cat_id = $_GET['cat_id'];
$cate_name = $_GET['cat_name'];

$title = $cate_name;

$sqlProd = "SELECT * FROM products WHERE category = '$cat_id'";
$sqlProdQuery = mysqli_query($con, $sqlProd);
}else{
    $sqlProd = "SELECT * FROM products";
    $sqlProdQuery = mysqli_query($con, $sqlProd);
    $title = "All Products";
}


?>




<div class="Product-wrapper" >
        <h2><?= $title; ?> <small> (<?php echo mysqli_num_rows($sqlProdQuery); ?>)</small></h2>
        <br/>
        <div class="product-grid" style="width: 97%">

            <?php while($prod = mysqli_fetch_assoc($sqlProdQuery)): ?>
            <div class="product-item" >
                <a href="product-detailed.php?prod_id=<?= $prod['id'] ?>"> <img src="../uploads/<?= $prod['images']?>" alt="" style="width: 100px;"></a>
                <span class="item-box">
                    <a href="product-detailed.php?prod_id=<?= $prod['id'] ?>"><h4><?= $prod['product_name'] ?></h4></a>
                    <p><a href="product-detailed.php?prod_id=<?= $prod['id'] ?>">GH₵<?= $prod['price'] ?></a></p>
                    <!-- <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div> -->
                </span>
            </div>
            <?php endwhile; ?>

        


        </div>
    </div>

    <div class="pagination-container">
        <ul class="pagination">
            <li><a href="#" id="page1">1</a></li>
            <!-- <li><a href="#" id="page2">2</a></li>
            <li><a href="#" id="page3">3</a></li>
            <li><a href="#" id="page4">4</a></li>
            <li><a href="#" id="page5">5</a></li> -->
        </ul>
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

    


    <script src="sell.js"></script>
    <script>
        const actualPrice = document.querySelector('#actual-price');

    </script>


<?php  include_once "../includes/footer2.php"; ?>