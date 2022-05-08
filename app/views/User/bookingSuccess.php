<?php require APPROOT . '/views/includes/headerUser.php'; ?>

<div class="container" style="width:100%; height: 100%; margin-top: 5%;">
    <div style="width: 50%; text-align:center; margin-left: auto; margin-right: auto;">
        <h1 style="
            margin-top:20%;
            text-align:center;
            font: normal normal normal 45px Microsoft Yi Baiti;
            ">Payment Successful!</h1>
        <h6 style="font: normal normal normal 20px Microsoft Yi Baiti; opacity: .8;">Thank You for booking with Quedescils, Can't wait to see you on: </h6>
        <h5 style="border-bottom: 1px solid black; font: normal normal normal 35px Microsoft Yi Baiti; margin-top: 30px;"><?= $data['proper_date'] ?></h5>

        <div class="service" style="margin-top: 5%; ">
            <h5 style="font: normal normal normal 20px Microsoft Yi Baiti;">Service: <?= $data['service_name'] ?></h5>
            <h5 style="font: normal normal normal 20px Microsoft Yi Baiti;">Price: $<?= $data['service_price'] ?></h5>
            <h5 style="font: normal normal normal 20px Microsoft Yi Baiti;"><?= $data['service_duration'] ?></h5>
            <div class="return" style="margin-top: 50px;"><a href="<?= URLROOT ?>/Home">Return Home</a></div>
        </div>


    </div>

</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>