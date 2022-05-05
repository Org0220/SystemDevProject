<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; text-align: center;">
        <h4 class="card-title" style=" 
        padding-bottom: 10px;
        font: normal normal normal 40px/47px Lucida Fax;
        color: #000000;">
            Time for Appointment
        </h4>

        <h5 class="card-title" style=" 
        padding-bottom: 50px;
        font: normal normal normal 30px/40px Lucida Fax;
        color: #000000">
            on <?php echo $_SESSION['date']; ?>
        </h5>
        
        <?php
            for($i = intdiv(900,$data['duration']); $i > 0; $i-- ) {
                require APPROOT . '/views/Divs/HourDiv.php';
            }
        ?>

    </div>
</body>
<?php require APPROOT . '/views/includes/footer.php'; ?>