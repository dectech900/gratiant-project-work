<?php include_once '../includes/header2.php'?>
<?php
// session_start();
// include '../database/config.php';

if (isset($_SESSION['id'])) {
     $user_id = $_SESSION['id'];
     $name = $_SESSION['name'];
}

$sqlProdCate = "SELECT * FROM product_category";
$sqlProdCateQuery = mysqli_query($con, $sqlProdCate);


$sqlProd = "SELECT * FROM products WHERE user_id = '$user_id'";
$sqlProdQuery = mysqli_query($con, $sqlProd);

?>




<div class="header-two">
    <div class="product-container">
        <div class="product-container-header">
            <div class="product-name">
                <h3>Products</h3>
            </div>
            <div class="add-product-box">
                <span class="material-symbols-outlined">
                    tune
                </span>
                <div class="add-to-product">
                    <button id="openModalBtn">&#43; Add product</button>
                </div>

            </div>
        </div>

    </div>
</div>
</div>

<div class="Product-wrapper">
    <div class="product-grid">

        <?php while($prod = mysqli_fetch_assoc($sqlProdQuery)): ?>
        <div class="product-item">
            <a href="../Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>"> <img
                    src="../uploads/<?= $prod['images']?>" alt="" style="width: 100px;"></a>
            <span class="item-box">
                <a href="../Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>">
                    <h4><?= $prod['product_name'] ?></h4>
                </a>
                <p><a
                        href="../Product-page/product-detailed.php?prod_id=<?= $prod['id'] ?>">GH₵<?= $prod['price'] ?></a>
                </p>
                <div class="product-actions">
                    <span class="material-symbols-outlined">
                        note_stack_add
                    </span>
                    <a href="../includes/action.php?delete_product&prod_id=<?= $prod['id'] ?>"
                        class="material-symbols-outlined">
                        delete
                    </a>
                </div>
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

<div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Product</h2>
        <form action="../includes/action.php" method="POST" enctype="multipart/form-data" id="addProductForm">

            <span class="product-name-box">
                <span class="productName">

                    <label for="productName">Product Title</label>
                    <input type="text" id="productName" name="product_name" required>

                    <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['id']; ?>" required>

                </span>
                <span class="productName">

                    <label for="Description">Discription</label>
                    <input type="text" id="productName" name="description" required>

                </span>
                <span class="productImage-Upload">
                    <span> <label for="productImage" class="upload-icon-label">
                            <span class="material-symbols-outlined">
                                cloud_upload
                            </span>
                            Upload items
                        </label>
                        <input type="file" id="productImage" name="file" accept="image/*" multiple
                            style="display: none;">
                    </span>
                    <div id="selectedItems"></div>

                    <div id="imageList"></div>


                </span>


            </span>

            <div class="Price-container">
                <div class="price-box2">
                    <label for="priceAmount">Price:</label>
                    <div class="price-input-wrapper">
                        <input type="text" id="priceAmount" name="price" required>
                        <div class="currency-selector">

                        </div>
                    </div>
                </div>
                <div class="price-box2">
                    <label for="qty">Quantity:</label>
                    <div class="price-input-wrapper">
                        <input type="text" id="qty" name="qty" required>

                    </div>
                </div>
            </div>

            <div class="categories-box">
                <div class="categories-container">
                    <div class="categories-box">
                        <label for="category">Categories:</label>
                        <select id="category" name="category" required>
                            <option value="">Select a category</option>
                            <?php while ($cat = mysqli_fetch_assoc($sqlProdCateQuery)): ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>
                            <?php endwhile; ?>


                        </select>
                    </div>

                    <div class="subcategories-container">
                        <div class="categories-box2">
                            <label for="brand">Brand:</label>
                            <input type="text" id="brand" name="brand">

                        </div>
                    </div>
                    <div class="subcategories-container">
                        <div class="categories-box2">
                            <label for="color">Color:</label>
                            <select id="color" name="color">
                                <option value="Red">Red</option>
                                <option value="White">White</option>
                                <option value="Blue">Blue</option>
                                <option value="Orange">Orange</option>
                                <option value="Green">Green</option>
                                <option value="Black">Black</option>
                                <option value="Gray">Gray</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="categories-container">
                    <div class="subcategories-container">
                        <div class="categories-box2">
                            <label for="model">Model:</label>
                            <input type="text" id="model" name="model">

                        </div>
                    </div>
                    <div class="subcategories-container">
                        <div class="categories-box2">
                            <label for="rating">Rating:</label>
                            <input type="text" id="rating" name="rating">

                        </div>
                    </div>
                    <div class="subcategories-container">
                        <div class="categories-box2">
                            <label for="form_factor">Form Factor:</label>
                            <input type="text" id="form_factor" name="form_factor">

                        </div>
                    </div>
                    <div class="subcategories-container">
                        <div class="categories-box2">
                            <label for="technology">Technology:</label>
                            <input type="text" id="technology" name="technology">

                        </div>
                    </div>
                </div>



                <!-- Container for image previews -->

                <span class="submit-btn">
                    <button type="submit" name="addProductBtn" id="addProductBtn">Submit</button>
                </span>


                <!-- <label for="productTags">Tags:</label>
                <input type="text" id="productTags" name="productTags">

                <label for="productCategory">Category:</label>
                <select id="productCategory" name="productCategory">
                    <option value="category1">Laptop</option>
                    <option value="category2">Mobile Phone</option>
                    <option value="category3">Printers</option>
                </select> -->
                <!-- 
                <label for="productPrice">Price:</label>
                <input type="number" id="productPrice" name="productPrice" min="0" step="0.01" required>
 -->


        </form>
    </div>
</div>



<script src="sell.js"></script>
<script>
const actualPrice = document.querySelector('#actual-price');
</script>

<?php  include_once "../includes/footer2.php"; ?>