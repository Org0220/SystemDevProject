<?php require APPROOT . '/views/includes/headerUser.php';
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
    $apStartHours = [];
    $apEndHours = [];
    /**
     * Gets each appointment's starting hour
     * Puts the starting hour in the apStartHours array
     * Calculates the ending hour based on the duration and  */
    foreach ($data['appointments'] as $appointment) {
        array_push($apStartHours, $appointment->time);

        $parts = explode(':', $appointment->time);

        $hour = intval($parts[0], 10);
        $minute = intval($parts[1], 10) + $data['duration'];
        if ($minute >= 60) {
            $minute -= 60;
            $hour++;
        }
        // if the minutes is 5, it will become 05 in the output
        if ($minute < 10) {
            $minute = '0' . $minute;
        }
        $minute = floor($minute);
        $endTime = $hour . ':' . $minute;
        array_push($apEndHours,  $endTime);
    }
    
    for ($i = intdiv(900, $data['duration']); $i > 0; $i--) {
        
        $startMinute = $data['minute'];
        $startHour = $data['hour'];
        $endMinute = $data['minute'] + $data['duration'];
        $endHour = $data['hour'];
        if ($endMinute >= 60) {
            $endMinute = $endMinute - 60;
            $endHour = $endHour + 1;
        }
        $data['hour'] = $endHour;
        $data['minute'] = floor($endMinute);

        if ($startMinute < 10) {
            $time =  $startHour . ":0" . $startMinute;
        } else {
            $time =  $startHour . ":" . $startMinute;
        }
        
        $isAvailable = true;
        for($y = 0; $y < count($apStartHours); $y++) {
            if(isTimeBigger( $startHour.':'.$startMinute, $apStartHours[$y]) && !isTimeBigger($time, $apEndHours[$y])) {
                $isAvailable = false;
                
        }}
        if( $isAvailable )
            require APPROOT . '/views/Divs/HourDiv.php';
        
        
    
}

    // returns true if the $time1 > $time2 and false otherwise
    function isTimeBigger($time1, $time2)
    {
        $parts1 = explode(':', $time1);
        $parts2 = explode(':', $time2);
        $hour1 = intval($parts1[0], 10);
        $minute1 = intval($parts1[1], 10);
        $hour2 = intval($parts2[0], 10);
        $minute2 = intval($parts2[1], 10);
        if ($hour1 > $hour2) {
            return true;
        } else if ($hour1 == $hour2) {
            if ($minute1 >= $minute2) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    ?>

</div>
</body>
<?php require APPROOT . '/views/includes/footer.php'; ?>