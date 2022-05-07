<?php require APPROOT . '/views/includes/headerAdmin.php';
?>

<div class="container" style="
    width:100%;
    height: 100%; 
    text-align: center;
    margin-top: 50px;">
    <h1 style="font: normal normal normal 40px/47px Lucida Fax;">Availabilities</h1>

    <div class="messages">
        <?php if (isset($data['message'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $data['message'] ?>
            </div>
        <?php elseif (isset($data['errors'])) : ?>
            <?php foreach ($data['errors'] as $error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="left-side" style="width: 50%; margin-top: 5%; float:left;">
        <h5 style="font: normal normal normal 45px Microsoft Yi Baiti;"> Choose availability</h5>
        <form method="post" action="<?= URLROOT ?>/availabilities/create_availabilities" style="margin-top: 30px;">

            <label for="availability" style="float:left;">Date</label>
            <select class="form-control" name="day" id="availability">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>

            <label for="startTime" style="float:left; margin-top:20px;">Opening Time</label>
            <input type="time" name="start" class="form-control" id="startTime" min="8:00" max="22:00" style="margin-top: 30px;">

            <label for="endTime" style="float:left; margin-top:20px;">Closing Time</label>
            <input type="time" name="end" class="form-control" id="endTime" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" name="Create Availability" style=" 
                    float: left;
                    margin-top: 30px;
                    width: 150px;
                    height: 40px;
                    margin-right:5px;
                    background-color: #F8C8DC;
                    border: 1px solid #707070;
                    border-radius: 12px;
                    opacity: 1;">Add availability</button>

        </form>

    </div>

    <div class="right-side" style="width: 50%; height: 80%;  float:left; overflow-y: auto;">
        <?php foreach ($data['avails'] as $avail) : ?>
            <div class="card" style="
            margin: auto;
            margin-top:50px;
            width: 85%; 
            height: auto;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #707070;
            border-radius: 50px;
            opacity: 1;
            ">
                <a href="<?= URLROOT ?>/availabilities/delete_availability/<?= $avail->id ?>" style="border-radius:360px ; background-color:rgb(197, 56, 56); height:20px; width:20px; float:left; font-size: 10px; color:white">X</a>
                <div class="card-body">
                    <h5 class="date" style=" margin:auto;  text-align: center;
                        font: normal normal normal 20px  Lucida Fax;
                        letter-spacing: 0px;
                        color: #000000;
                        opacity: 1;"><?= $avail->day ?></h5>
                    <h6 class="dayNTime" style=" margin:auto;  text-align: center;
                        font: normal normal normal 15px Lucida Fax;
                        letter-spacing: 0px;
                        color: #000000; 
                        opacity: 1;"><?= $avail->start ?> - <?= $avail->end ?></h6>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>