<?php require APPROOT . '/views/includes/headerUser.php'; 
?>




    <div class="container" style="margin-top: 5%; width:100%; height:auto;">

        <?php 
            
            foreach ($data as $service){
                require APPROOT . '/views/User/ServiceDiv.php';
                 
            }

        ?>

    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>