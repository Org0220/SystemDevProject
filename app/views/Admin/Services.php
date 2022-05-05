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
        opacity: 1;">Services</h5><br>

        <!-- div to add a new service -->
        <a href = "/SystemDevProject/Services/create_service">
        <button type="submit" name="addServiceBtn" class="btn btn-primary mr-2" style="
        float: right;
        width: 80px;
        height: 40px;
        background: #A7C7E7 0%;
        border: 1px solid #ffffff;
        color: rgb(255, 255, 255);
        ">+
        </button>
        </a>
        <br>
        <br>
    <?php 
        
        if(isset($data['msg'])) {
            echo '<div class="alert alert-success" role="alert">';
            echo $data['msg'];
            echo '</div>';
        }
        if(isset($data['services'])) {
            foreach ($data['services'] as $service){
                 require APPROOT . '/views/Divs/AdminServiceDiv.php';      
            }
        }
            
    ?>

        

    
</div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>