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
        <button type="submit" name="addServiceBtn" class="btn btn-primary mr-2" style="
        float: right;
        width: 80px;
        height: 40px;
        background: #A7C7E7 0%;
        border: 1px solid #ffffff;
        color: rgb(255, 255, 255);
        ">+
        </button>
        <br>

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
                    opacity: 1;">Classic</h5>


                </div>
                <!-- div for picture and info -->
                <div class="second-row" style="float: left; width:100%; height:150px;">
                    <!-- div for picture -->
                    <div class="first-half" style="width: 30%; float:left;">
                        <img src="Example.PNG" style="
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
                    
                        ">Description:</h6>
                        <p style="text-align: left;
                        font: normal normal normal 10px Segoe UI;
                        letter-spacing: 0px;
                        color: #000000;
                        opacity: 1;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <h7>Price: 60$</h7>
                    </div>
                </div> <br><br><br>
                
                <!-- Div for edit and delete buttons -->
                <div style="height: 50px;"><br><br>
                    <button type="submit" name="deleteService" class="btn btn-primary" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #ba2c2c;
                        border: 1px solid #707070;
                        color: rgb(255, 255, 255);
                        ">Delete
                    </button>
                    <a href="AdminUpdateService.html" name="updateService" type="button" class="btn btn-secondary mr-2" style="
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
                opacity: 1;">Classic</h5>


            </div>
            <!-- div for picture and info -->
            <div class="second-row" style="float: left; width:100%; height:150px;">
                <!-- div for picture -->
                <div class="first-half" style="width: 30%; float:left;">
                    <img src="Example.PNG" style="
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
                
                    ">Description:</h6>
                    <p style="text-align: left;
                    font: normal normal normal 10px Segoe UI;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <h7>Price: 60$</h7>
                </div>
            </div> <br><br><br>
            
            <div style="height: 50px;"><br><br>
                <button type="submit" name="deleteService" class="btn btn-primary" style="
                    float: right;
                    width: 100px;
                    height: 40px;
                    background: #ba2c2c;
                    border: 1px solid #707070;
                    color: rgb(255, 255, 255);
                    ">Delete
                </button>
                <a href="AdminUpdateService.html" name="updateService" type="button" class="btn btn-secondary mr-2" style="
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
                opacity: 1;">Classic</h5>


            </div>
            <!-- div for picture and info -->
            <div class="second-row" style="float: left; width:100%; height:150px;">
                <!-- div for picture -->
                <div class="first-half" style="width: 30%; float:left;">
                    <img src="Example.PNG" style="
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
                
                    ">Description:</h6>
                    <p style="text-align: left;
                    font: normal normal normal 10px Segoe UI;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <h7>Price: 60$</h7>
                </div>
            </div> <br><br><br>
            
            <div style="height: 50px;"><br><br>
                <button type="submit" name="deleteService" class="btn btn-primary" style="
                    float: right;
                    width: 100px;
                    height: 40px;
                    background: #ba2c2c;
                    border: 1px solid #707070;
                    color: rgb(255, 255, 255);
                    ">Delete
                </button>
                <a href="AdminUpdateService.html" name="updateService" type="button" class="btn btn-secondary mr-2" style="
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
                opacity: 1;">Classic</h5>


            </div>
            <!-- div for picture and info -->
            <div class="second-row" style="float: left; width:100%; height:150px;">
                <!-- div for picture -->
                <div class="first-half" style="width: 30%; float:left;">
                    <img src="Example.PNG" style="
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
                
                    ">Description:</h6>
                    <p style="text-align: left;
                    font: normal normal normal 10px Segoe UI;
                    letter-spacing: 0px;
                    color: #000000;
                    opacity: 1;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <h7>Price: 60$</h7>
                </div>
            </div> <br><br><br>
            
            <div style="height: 50px;"><br><br>
                <button type="submit" name="deleteService" class="btn btn-primary" style="
                    float: right;
                    width: 100px;
                    height: 40px;
                    background: #ba2c2c;
                    border: 1px solid #707070;
                    color: rgb(255, 255, 255);
                    ">Delete
                </button>
                <a href="AdminUpdateService.html" name="updateService" type="button" class="btn btn-secondary mr-2" style="
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
</div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>