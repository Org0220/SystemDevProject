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

<footer style="position:sticky; margin-top:70px;">
    <div class="color-bar" style="
    width: 100%;
    height:3%;
    background: transparent linear-gradient(90deg, #A7C7E7 0%, #FBFFE2 100%) 0% 0% no-repeat padding-box;
    border: 1px solid #707070;
    opacity: 1;">
    </div>
</footer>

</html>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>