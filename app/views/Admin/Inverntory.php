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
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; ">
        <!-- add code here -->

        <!-- title -->
        <h4 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Products</h4>

        <div style="text-align: right; height: 40px;" class="mb-4">
            <a class="btn" href="AdminAddProduct.html" style="
                float: right;
                width: 100px;
                height: 40px;
                background: #A7C7E7;
                border: 1px solid #707070;
                border-radius: 12px;
                color: white;
                font: normal normal normal 25px/26px Lucida Fax;
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
                      <th scope="col">Description</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Picture</th>
                      <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row" class="align-bottom">1</th>
                      <td class="align-bottom">Shampoo</td>
                      <td class="align-bottom">this shampoo</td> 
                      <td class="align-bottom">15</td>
                      <td class="align-bottom">$50.95</td>
                      <td>
                            <img class="rounded-circle" src="#" width="50">
                      </td>
                      <td class="text-center align-bottom"><a class="edit-btn" href='AdminEditProduct'>Edit</a></td>
                      <td class="text-center align-bottom"><a class="del-btn" href='#'>Delete</a></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</body>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>