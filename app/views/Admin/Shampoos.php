<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>

<style>
        tr {
            font: normal normal normal 20px/22px Microsoft Yi Baiti;
        }

        a.edit-btn {
            color: #2FA43B;
        }

        a.del-btn {
            color: #CC1616;
        }


</style>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto;  min-height: 100%;">
        <!-- add code here -->

        <!-- title -->
        <h4 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Products</h4>

        <div style="text-align: right; height: 40px;" class="mb-4">
            <a class="btn" href="/SystemDevProject/Shampoos/create_shampoo" style="
                float: right;
        width: 80px;
        height: 40px;
        background: #A7C7E7 0%;
        border: 1px solid #ffffff;
        color: rgb(255, 255, 255);
        ">
            +
            </a>
        </div>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Picture</th>
                      <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <?php 
            if(isset($data['shampoos'])){
                foreach ($data['shampoos'] as $shampoo){
                    require APPROOT . '/views/Divs/AdminShampooDiv.php'; 
                 
                }
            }
            if(isset($data['msg'])) {
                echo '<div class="alert alert-success" role="alert">';
                echo $data['msg'];
                echo '</div>';
            }

                ?>
            </table>
        </div>
    </div>
</body>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>