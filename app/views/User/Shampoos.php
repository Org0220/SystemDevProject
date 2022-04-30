<?php require APPROOT . '/views/includes/headerUser.php'; 
?>

<div class="container" style="width:100%; height:auto; margin-top: 5%;">
        <h4 class="card-title" style=" 
        padding-bottom: 50px;
        margin:auto;  
        text-align: center;
        font: normal normal normal 40px/47px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Shampoos</h4>
        
        <div class="row row-cols-3">

        <?php 
            
            foreach ($data as $shampoo){
                require APPROOT . '/views/Divs/ShampooDiv.php';
                 
            }

        ?>



        </div>
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>