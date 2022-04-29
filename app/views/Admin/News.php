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
        <div class="container" style="margin-top: 5%; height: auto;">
            <h4 class="card-title" style=" margin:auto;  text-align: center;
            font: normal normal normal 40px/47px Lucida Fax;
            letter-spacing: 0px;
            color: #000000;
            opacity: 1;">Newsletter
            </h4><br>

        <!-- div to add a new service -->
        <a href="AdminAddNewsletter.html" button type="submit" name="addNewsletterBtn" class="btn btn-primary mr-2" style="
        float: right;
        width: 80px;
        height: 40px;
        background: #A7C7E7 0%;
        border: 1px solid #ffffff;
        color: rgb(255, 255, 255);
        ">+
        </a>
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

           <!-- div for Title and date -->
           <div class="first-row" style="width: 100%; height:auto;  margin:0px; float:left;">
               <h5 class="card-title" style=" margin:auto;  text-align: center;
                font: normal normal normal 40px/47px Lucida Fax;
                letter-spacing: 0px;
                color: #000000;
                opacity: 1;">Title</h5>
                <h6 class="card-title" style=" margin:auto;  text-align: center;
                font: normal normal normal 15px Lucida Fax;
                letter-spacing: 0px;
                color: #000000;
                opacity: 1;">4/13/2022</h6>


           </div>
           <!-- div for Description -->
           <div class="second-row" style="float: left; width:100%; height:150px;">
       
               <h6 style="margin-left: auto; margin-right:auto; width:80%; margin-top: 15px;">Description</h6>
               <p style="margin-left: auto; margin-right:auto; width:80%; margin-top: 15px; ">Description: Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                   Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                   but also the leap into electronic typesetting, remaining essentially unchanged.</p>
           </div>
           <!-- div for signature -->
           <div class="third-row" style="float:right; width:100%; height:auto; ">
               <h3  style="
               float:right;
               font:normal normal normal 13px Lucida Fax; 
                ">-Mary Grace Antonio</h3>
           </div><br>

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
            <a href="AdminUpdateNewsletter.html" name="updateService" type="button" class="btn btn-secondary mr-4" style="
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