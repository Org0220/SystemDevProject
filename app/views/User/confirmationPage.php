<?php require APPROOT . '/views/includes/headerUser.php';
?>
<form method="post" action="<?= URLROOT ?>/payment/order_summary/<?= $data['time'] ?>">
    <div class="container" style="width:100%; height: 100%; margin-top: 5%;">
        <h4 class="card-title" style=" 
        padding-bottom: 50px;
        margin:auto;  
        text-align: center;
        font: normal normal normal 40px/47px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Book</h4>

        <h5 style="border-bottom: 1px solid black; font: normal normal normal 45px Microsoft Yi Baiti;">Confirmation for <?= Payment::$DAYS_OF_THE_WEEK[$_SESSION['weekDay']] ?>, <?= $data['date'] ?></h5>

        <!-- div to display service info -->
        <div class="service" style="margin-top: 5%; ">
            <h5 style="font: normal normal normal 45px Microsoft Yi Baiti;">Service: <?= $data['service_name'] ?></h5>
            <input type="hidden" name="service_name" value="<?= $data['service_name'] ?>">
            <h5 style="font: normal normal normal 45px Microsoft Yi Baiti;">Price: $<?= $data['service_price'] ?></h5>
            <input type="hidden" name="service_price" value="<?= $data['service_price'] ?>">
            <h5 style="font: normal normal normal 45px Microsoft Yi Baiti;"><?= $data['service_start'] . ' - ' . $data['service_end'] ?></h5>
            <input type="hidden" name="service_duration" value="<?= $data['service_start'] . ' - ' . $data['service_end'] ?>">
            <h6 style="font: normal normal normal 40px Microsoft Yi Baiti; margin-top: 50px; opacity: .5;">*Additional 5$ fee if 10min late. 5$ will be added every 5min from then on</h6>
        </div>

        <!-- div to manage the buttons n checkbox -->
        <div class="buttons" style="margin-top: 5%; ">
            <input type="checkbox" id="colorLashes" name="colored">
            <label for="colorLashes">Add color lashes for an extra 5$</label>

            <div class="cancel-confirm" style="margin-top: 20%;">
                <a href="<?= URLROOT ?>/appointment/clear_data" class="btn btn-primary" name="cancel" style=" 
                    float: left;
                    width: 150px;
                    height: 40px;
                    margin-right:5px;
                    background-color: #F8C8DC;
                    border: 1px solid #707070;
                    border-radius: 12px;
                    opacity: 1;">Cancel</a>

                <button type="submit" class="btn btn-primary" name="Confirm Booking" style=" 
                    float: right;
                    width: 150px;
                    height: 40px;
                    margin-right:5px;
                    background-color: #F8C8DC;
                    border: 1px solid #707070;
                    border-radius: 12px;
                    opacity: 1;">Confirm Booking</button>
            </div>
        </div>


    </div>
</form>

<?php require APPROOT . '/views/includes/footer.php'; ?>