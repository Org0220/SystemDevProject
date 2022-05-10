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
                     opacity: 1;"><?php echo $service->name?></h5>


                </div>
                <!-- div for picture and info -->
                <div class="second-row container">
                    <!-- div for picture -->
<div class="row">
                    <div class="first-half col-2 p-4" >
                        <img src="<?php echo URLROOT.'/public/img/'.$service->imgURL?>" style="
                        border-radius: 50%;
                        max-width: 100%;
                        height: auto;
                        ">
                    </div>
                    <!-- div for info -->
                    <div class="second-half col-10 p-4">
                        <h6 style="
                        margin-top:40px;
                    
                        ">Description:</h6>
                        <p style="text-align: left;
                        font: normal normal normal 10px Segoe UI;
                        letter-spacing: 0px;
                        color: #000000;
                        opacity: 1;"><?php echo $service->description?></p>
                        <h7>Price: $<?php echo $service->price?></h7>
                    </div>
                    </div>
                </div>
                <!-- div for button -->
                <div class="third-row" style="float:right; width:100%; height:auto; ">
                    <a href="/SystemDevProject/Appointment/calendar/<?php echo $service->id?>"><button type="button" class="btn btn-primary"  style=" 
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