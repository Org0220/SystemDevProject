<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto;  min-height: 100%;">
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
                <form method = 'post' action = '' class="form-inline">
                <div class="form-group mb-2">
                <select name = "searchOption" class="form-select">
                    <option value="name">Name</option>
                    <option value="date">Date</option>
                </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                <input name = "searchText" class="form-control" type="text" style="width: 100%; font: Lucida Fax !important" placeholder="Search">
                
                </div>  
                <div class="form-group mx-sm-3 mb-2">
                <button name = "search" type="submit" class="btn btn-primary ml-1" style="width: 150px;">Search</button>
                
                </div>
                
                </form>

            </div>
        </div>
        

        <!-- card representing an appointment -->
        <?php 
        
        if(isset($data['msg'])) {
            echo '<div class="alert alert-success" role="alert">';
            echo $data['msg'];
            echo '</div>';
        }
        
        if(isset($data['appointments'])) {
             
            foreach ($data['appointments'] as $appointment){
                 require APPROOT . '/views/Divs/AdminAppointmentDiv.php';      
            }
        }
            
    ?>
        
    </div>
</body>
<?php require APPROOT . '/views/includes/footer.php'; ?>