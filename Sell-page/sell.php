<?php
session_start();
include '../database/config.php';

if (isset($_SESSION['id'])) {
     $user_id = $_SESSION['id'];
     $name = $_SESSION['name'];
}

$sqlProdCate = "SELECT * FROM product_category";
$sqlProdCateQuery = mysqli_query($con, $sqlProdCate);


$sqlProd = "SELECT * FROM products WHERE user_id = '$user_id'";
$sqlProdQuery = mysqli_query($con, $sqlProd);







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELL</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="sell-products.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="../style.css"> -->

</head>

<body>
    <!-- Nav Menu -->
    <header class="header">
        <div class="nav">
            <div class="header-container">
                <div class="header-inner">
                    <span class="side-logo">
                        <img src="../LOGO 6.png" width="100 alt=">
                    </span>
                    <span class="home-dir">
                        <a href="../index.php">Home</a>
                    </span>
                </div>

                <div class="account-box">
                    <span class="material-symbols-outlined">
                        search
                    </span>

                    <span>
                        <img src="../assets/avatar.png" alt="Avatar" class="avatar"
                            style="width:30px; height:30px ;"></span>
                </div>
            </div>
        </div>
        <hr>


    </header>


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
                <span> <img src="../assets/Products-images/1.jpeg" alt="" style="width: 100px;"></span>
                <span class="item-box">
                    <h4><?= $prod['product_name'] ?></h4>
                    <p>GH₵<?= $prod['price'] ?></p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <?php endwhile; ?>
            <!-- <div class="product-item">
                <span> <img src="../assets/Products-images/2.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/3.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/4.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/5.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/6.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/7.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/8.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/9.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/20.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/11.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images//15.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/3.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/11.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/8.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/7.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/6.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div>
            <div class="product-item">
                <span> <img src="../assets/Products-images/1.jpeg" alt="" style="width: 100px;"></span>

                <span class="item-box">
                    <h4>Lenovo Ideapad V14 Laptop</h4>
                    <p>GH₵2,000</p>
                    <div class="product-actions">
                        <span class="material-symbols-outlined">
                            note_stack_add
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </div>
                </span>
            </div> -->


        </div>
    </div>

    <div class="pagination-container">
        <ul class="pagination">
            <li><a href="#" id="page1">1</a></li>
            <li><a href="#" id="page2">2</a></li>
            <li><a href="#" id="page3">3</a></li>
            <li><a href="#" id="page4">4</a></li>
            <li><a href="#" id="page5">5</a></li>
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

                        <!-- <div class="subcategories-container">
                            <div class="categories-box2">
                                <label for="subcategory">Subcategories:</label>
                                <select id="subcategory" name="subcategory" required>
                                    <option value="">Select a subcategory</option>
                                  
                                    <optgroup label="Electronics">
                                        <option value="phones">Phones</option>
                                        <option value="laptops">Laptops</option>
                                        <option value="tablets">Tablets</option>
                                    </optgroup>
                                   
                                    <optgroup label="Clothing">
                                        <option value="shirts">Shirts</option>
                                        <option value="pants">Pants</option>
                                        <option value="dresses">Dresses</option>
                                    </optgroup>
                                   
                                </select>
                            </div>



                        </div> -->
                    </div>



                    <!-- Container for image previews -->
                    <div class="Price-container">
                        <div class="price-box2">
                            <label for="priceAmount">Price:</label>
                            <div class="price-input-wrapper">
                                <input type="text" id="priceAmount" name="price" required>
                                <div class="currency-selector">
                                    <select id="currency" name="currency">
                                        <option value="USD">USD</option>
                                        <option value="GHC">GHC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>