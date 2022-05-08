<div class="card" style="
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #707070;
            border-radius: 50px;
            height: 150px;
            opacity: 1;
            ">
        <div class="card-body">
   
               <!-- div for client information (example with 20 characters excluding space) -->
               <div style="width: 35%; height:auto;  margin:0px ; float:left; padding: 0px 15px;">
                    <!-- client name -->
                    <h5 class="card-title" style=" 
                    margin: auto;  
                    text-align: left;
                    font: normal normal normal 20px/26px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">
                        <?php echo $appointment->name?>
                    </h5>
                    
                    <!-- client email -->
                    <h6 class="card-title" style="
                    margin: 15px auto;
                    text-align: left;
                    font: normal normal normal 15px/20px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">
                        <?php echo $appointment->email?>
                    </h6>
               </div>

               <!-- div for Description -->
               <div style="float: left; width: 30%; height:150px;">
                    <!-- appointment date -->
                    <h6 class="card-title" style="
                    margin: auto;
                    text-align: center;
                    font: normal normal normal 15px/20px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 0.51;">
                        <?php echo $appointment->date?>
                    </h6>

                    <!-- appointment time -->
                    <h5 class="card-title" style=" 
                    margin: 15px auto;  
                    text-align: center;
                    font: normal normal normal 30px/32px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">
                        <?php echo $appointment->time?>
                    </h5>

               </div>
               
               <!-- div for buttons -->
               <div style="float: left; width:35%; height: 100%; position: relative">
                    
                    <!-- setting buttons on bottom right -->
                    <div style="position: absolute; bottom: 0px; right: 0px">
                        <a class="btn mr-5" href="/SystemDevProject/Appointment/update_appointment/<?php echo $appointment->id?>" style=" 
                            width: 150px;
                            height: 40px;
                            background: #D7E7E4;
                            border: 1px solid #707070;
                            border-radius: 12px;
                            color: black;
                            ">
                        Edit
                        </a>
                        <a class="btn" href="/SystemDevProject/Appointment/delete_appointment/<?php echo $appointment->id?>" style=" 
                            width: 150px;
                            height: 40px;
                            background: #FB3C4F;
                            border: 1px solid #707070;
                            border-radius: 12px;
                            margin-right:5px;
                            color: white;
                            ">
                        Delete
                        </a>
                    </div>
               </div>
           </div>
       </div>