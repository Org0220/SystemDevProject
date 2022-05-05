<div class="mb-3">
    <?php
        $data['hour'];
        $data['minute'];  
        $data['duration'];
        $data [`endHour`];
        $startMinute = $data['minute'];
        $startHour = $data['hour'];
        $endMinute = $data['minute'] + $data['duration'];
        $endHour = $data['hour'];
        if($endMinute >= 60) {
            $endMinute = $endMinute - 60;
            $endHour = $endHour + 1;
        }
        $data['hour'] = $endHour;
        $data['minute'] = $endMinute;
        
    ?>
    <div class="mb-3">
            <a role="button"  href = "/SystemDevProject/[Controller]/[Method]/ <?php echo  "     The Hour    ";?> " class="btn btn-primary" style="
                width: 250px;
                height: 40px;
                background: #A7C7E7;
                border: 1px solid #707070;
                color: black;
            "><?php echo  $data['hour'] + ':' + $data['minute'] ?></a>
        </div>
</div>