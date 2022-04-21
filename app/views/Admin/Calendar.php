<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>
<style>
        .footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
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
        opacity: 1;">Appointments</h4>

        <!-- filter options and search-->
        <div style="width: auto; height: 50px; margin: 50px 0px; font: Lucida Fax !important;";>
            <label for="appointmentFilter" class="form-label">Filter</label>
            <div class="input-group" id="appointmentFilter">
                <select class="form-select mr-1">
                    <option value="date">Name</option>
                    <option value="name">Date</option>
                </select>
                <input class="form-control" type="text" style="width: 65%; font: Lucida Fax !important" placeholder="Search">
                <button type="submit" class="btn btn-primary ml-1" style="width: 150px;">Search</button>
            </div>
        </div>
        

        <!-- card representing an appointment -->
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
                        Example Name
                    </h5>
                    
                    <!-- client email -->
                    <h6 class="card-title" style="
                    margin: 15px auto;
                    text-align: left;
                    font: normal normal normal 15px/20px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">
                        example@email.domain
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
                        March 25, 2022
                    </h6>

                    <!-- appointment time -->
                    <h5 class="card-title" style=" 
                    margin: 15px auto;  
                    text-align: center;
                    font: normal normal normal 30px/32px Lucida Fax;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">
                        10:00PM - 10:30PM
                    </h5>

               </div>
               
               <!-- div for buttons -->
               <div style="float: left; width:35%; height: 100%; position: relative">
                    
                    <!-- setting buttons on bottom right -->
                    <div style="position: absolute; bottom: 0px; right: 0px">
                        <a class="btn mr-5" href="#" style=" 
                            width: 150px;
                            height: 40px;
                            background: #D7E7E4;
                            border: 1px solid #707070;
                            border-radius: 12px;
                            color: black;
                            ">
                        Edit
                        </a>
                        <a class="btn" href="#" style=" 
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
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>