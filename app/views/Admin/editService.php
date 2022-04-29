<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>


<style>
        div > input, div > label, div > textarea {
            font: normal normal normal 16px/20px Lucida Fax;
        }

        
    </style>

    <div class="container" style=" margin: auto; margin-top: 5%; height: auto; ">
        <!-- add code here -->

        <!-- title -->
        <h5 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Services</h5>

        <div style="margin-top: 50px;">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="mb-5">
                    <div class="mb-4">
                        <label for="serviceTitle">Service</label>
                        <input id="serviceTitle" class="form-control" type="text" aria-label="titleLabel">
                    </div>
                    <div class="mb-4">  
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea id="serviceDescription" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="servicePrice">Price</label>
                        <input id="servicePrice" class="form-control" type="number" step="0.01" aria-label="priceLabel">
                    </div>
                    <div>
                        <label for="servicePicture">Picture</label>
                        <input id="servicePicture" class="form-control mb-4" type="file" >
                    </div>
                </div>
                
                <div style="height: 40px;">
                    <a href="AdminProducts.html" type="button" class="btn btn-secondary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <button type="submit" name="updateService" class="btn btn-primary" style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>