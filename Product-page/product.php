

<?php include_once '../includes/header2.php'; ?>

<?php


$sqlProd = "SELECT * FROM products";
$sqlProdQuery = mysqli_query($con, $sqlProd);


?>




    <div class="Product-wrapper">
        <div class="product-grid">

            <?php while($prod = mysqli_fetch_assoc($sqlProdQuery)): ?>
            <div class="product-item" >
                <a href="product-detailed.php?prod_id=<?= $prod['id'] ?>"> <img src="../uploads/<?= $prod['images']?>" alt="" style="width: 100px;"></a>
                <span class="item-box">
                    <a href="product-detailed.php?prod_id=<?= $prod['id'] ?>"><h4><?= $prod['product_name'] ?></h4></a>
                    <p><a href="product-detailed.php?prod_id=<?= $prod['id'] ?>">GH₵<?= $prod['price'] ?></a></p>
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
            </div> -->
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

    


    <script src="sell.js"></script>
    <script>
        const actualPrice = document.querySelector('#actual-price');

    </script>
</body>

</html>