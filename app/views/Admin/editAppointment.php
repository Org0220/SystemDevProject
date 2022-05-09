<?php require APPROOT . '/views/includes/headerAdmin.php'; 
$dt = new DateTime("now", new DateTimeZone("America/New_York"));
?>



<style>
        div > input, div > label, div > textarea {
            font: normal normal normal 16px/20px Lucida Fax;
        }

        
    </style>

    <div class="container" style=" margin: auto; margin-top: 5%; height: auto; min-height: 100%; ">
        <!-- add code here -->

        <!-- title -->
        <h5 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Appointment</h5>

        <?php if (isset($data['error'])): ?>
        <?php foreach ($data['error'] as $error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
        
        <div style="margin-top: 50px;">
            <form action=' <?= URLROOT ?>/Appointment/update_appointment/<?= $data['appointment']->id ?>' method='post'>
                <div class="mb-5">
                    <div class="mb-4">
                        <label for="timeInput">Title</label>
                        <input id = "timeInput" name = "time" class="form-control" type="time" value = "<?php echo $data['appointment']->time ?>" min = "<?php echo $dt->format("h:i")?>" max = "23:59:99" />
                    </div>
                    <div class="mb-4">  
                        <label for="dateInput" class="form-label">Content</label>
                        <input id = "dateInput" name = "date" class="form-control" type="date"  value="<?php 
                        $parts = explode('/', $data['appointment']->date);
                        if(intval($parts[0], 10) < 10) 
                            $parts[0] = '0' . $parts[0];
                        if(intval($parts[1], 10) < 10)
                            $parts[1] = '0' . $parts[1];
                           
                        echo $parts[2] . '-' . $parts[1] . '-' . $parts[0];
                        
                         ?>" min = "<?php echo $dt->format("Y-m-d")?>"/>
                    </div>
                </div>
                
                <div style="height: 40px;">
                    <a href="<?= URLROOT ?>/Appointment/admin_appointments" class="btn btn-secondary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <button name='Update_Appointment' type="submit"  class="btn btn-primary" style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Update</button>
                </div>
            </form>
        </div>
    </div>
   
</body>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>