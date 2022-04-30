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
                        <input id="serviceTitle" name = "name" class="form-control" value = "<?php echo  $data['service']->name;?>"  type="text" aria-label="titleLabel">
                    </div>
                    
                    <div class="mb-4">  
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea id="serviceDescription" name = "description" class="form-control"   rows="5"><?php echo  $data['service']->description?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="servicePrice">Price</label>
                        <input id="servicePrice" name = "price"class="form-control" type="number" value = "<?php echo  $data['service']->price?>" step="0.01" aria-label="priceLabel">
                    </div>
                    <div class="mb-4">
                        <label for="servicePrice">Duration</label>
                        <input id="duration" name = "duration"class="form-control" type="number" value = "<?php echo  $data['service']->duration?>" step="0.01" aria-label="priceLabel">
                    </div>
                    <div>
                        <label for="servicePicture">Picture</label>
                        <input id="servicePicture" name = "picture" class="form-control mb-4" type="file" >
                    </div>
                </div>
                
                <div style="height: 40px;">
                    <a href="AdminProducts.html" type="button" class="btn btn-secondary"  style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <button type="submit" name="Create_Service" class="btn btn-primary" style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Add Service</button>
                    <button type="submit" name="Update_Service" class="btn btn-primary"  style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Update Service</button>
                </div>
            </form>
            <?php
                if(isset($data['error'])) {
                    foreach($data['error'] as $error) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $error;
                        echo '</div>';}
                }
            ?>
        </div>
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>