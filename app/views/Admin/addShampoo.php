

<?php require APPROOT . '/views/includes/headerAdmin.php'; ?>

<style>
        div > input, div > label, div > textarea {
            font: normal normal normal 16px/20px Lucida Fax;
        }

        
    </style>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; ">
        <!-- add code here -->

        <!-- title -->
        <h4 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Products</h4>

        <div style="margin-top: 50px;">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="mb-5">
                    <div class="mb-4">
                        <label for="productTitle">Title</label>
                        <input id="productTitle" class="form-control" type="text" placeholder="Title" aria-label="titleLabel">
                    </div>
                    <div class="mb-4">  
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea id="productDescription" class="form-control" rows="5" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="productQuantity">Quantity</label>
                        <input id="productQuantity" class="form-control" type="number" value="1" aria-label="quantityLabel">
                    </div>
                    <div class="mb-4">
                        <label for="productPrice">Price</label>
                        <input id="productPrice" class="form-control" type="number" step="0.01" placeholder="00.00" aria-label="priceLabel">
                    </div>
                    <div>
                        <label for="productPicture">Picture</label>
                        <input id="productPicture" class="form-control mb-4" type="file" >
                    </div>
                </div>
                
                <div style="height: 40px;">
                    <a href="http://localhost/SystemDevProject/Admin/addShampoo" type="button" class="btn btn-secondary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <button type="submit" name="addProduct" class="btn btn-primary" style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>