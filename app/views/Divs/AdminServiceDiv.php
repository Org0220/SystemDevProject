<!-- div representing service card -->
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
                    <h5 class="card-title" style=" margin:auto;  text-align: left;
                    font: normal normal normal 40px/47px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;"><?php echo $service->name?></h5>


                </div>
                <!-- div for picture and info -->
                <div class="second-row" style="float: left; width:100%; height:150px;">
                    <!-- div for picture -->
                    <div class="first-half" style="width: 30%;   float:left;">
                        <img src="<?php echo URLROOT.'/public/img/'.$service->imgURL?>" style="
                        border-radius: 360px; 
                        opacity: 1; 
                        width:50%; 
                        height: 100%;
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
                    
                        ">Description:</h6>
                        <p style="text-align: left;
                        font: normal normal normal 10px Segoe UI;
                        letter-spacing: 0px;
                        color: #000000;
                        opacity: 1;"><?php echo $service->description?></p>
                        <h7>Price: $<?php echo $service->price?></h7>
                    </div>
                </div> <br><br><br>
                
                <!-- Div for edit and delete buttons -->
                <div style="height: 50px;"><br><br>
                    <a href = "/SystemDevProject/Services/delete_service/<?php echo $service->id?> ">
                    <button type="submit" name="deleteService" class="btn btn-primary" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #ba2c2c;
                        border: 1px solid #707070;
                        color: rgb(255, 255, 255);
                        ">Delete
                    </button>
                    </a>
                    <a href="/SystemDevProject/Services/update_service/<?php echo $service->id?>" name="updateService" type="button" class="btn btn-secondary mr-2" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #94cd8b;
                        border: 1px solid #707070;
                        color: black;
                    ">Edit</a>
                </div>
            </div>
        </div>