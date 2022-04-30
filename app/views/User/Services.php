<?php require APPROOT . '/views/includes/headerUser.php'; 
?>




    <div class="container" style="margin-top: 5%; width:100%; height:auto;">

        <?php 
            
            foreach ($data as $service){
                require APPROOT . '/views/Divs/ServiceDiv.php';
                 
            }

        ?>
<div class="card" style="
         margin-top:50px;
         background: #FFFFFF 0% 0% no-repeat padding-box;
         border: 1px solid #707070;
         border-radius: 50px;
         opacity: 1;
         ">
            <div class="card-body">

                <!-- div for header -->
                <div class="first-row" style="width: 100%; height:auto;  margin:0px; float:left;">
                    <h5 class="card-title" style=" margin:auto;  text-align: center;
                     font: normal normal normal 40px/47px Lucida Fax;
                     letter-spacing: 0px;
                     color: #000000;
                     opacity: 1;">Lash Removal + Any Set </h5>


                </div>
                <!-- div for picture and info -->
                <div class="second-row" style="float: left; width:100%; height:150px;">
                    <!-- div for picture -->
                    <div class="first-half" style="width: 30%; float:left;">
                        <img src="<?php echo URLROOT.'/public/img/'?>Example.PNG" style="
                         border-radius: 360px; 
                         opacity: 1; 
                         width:50%; 
                         margin-left:auto; 
                         margin-right:auto; 
                         display:block;
                         top:5%;
                         ">
                    </div>
                    <!-- div for info -->
                    <div class="second-half" style="width:70%; float:left;">
                        <h6 style="
                         margin-top:40px;
                     
                         ">Description: </h6>
                        <p style="text-align: left;
                         font: normal normal normal 10px Segoe UI;
                         letter-spacing: 0px;
                         color: #000000;
                         opacity: 1;">
                        This service combines one of the services listing on the top with the lash removal serivce.
                        </p>
                        <h7>Price: 15$</h7>
                    </div>
                </div>
                <!-- div for button -->
                <div class="third-row" style="float:right; width:100%; height:auto; ">
                    <a href="/SystemDevProject/User/AnotherSevice"><button type="button" class="btn btn-primary"  style=" 
                     float: right;
                     width: 150px;
                     height: 40px;
                     margin-right:5px;
                     background-color: #F8C8DC;
                     border: 1px solid #707070;
                     border-radius: 12px;
                     opacity: 1;">Book Now</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>