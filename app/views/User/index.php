<?php require APPROOT . '/views/includes/headerUser.php'; 
?>

<style>
        .footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }
    </style>
    

    <div class="container" style="width:100%; height:auto;">

        <div class="img" style="height: 50%; margin-top: 100px;">
            <img src="<?php echo URLROOT.'/public/img/';?>HomePage.png" style="position: center; width:100%; height: 100%;">
        </div>

        <div class="about" style="margin-top: 100px; margin-bottom: 100px;">
            <h1 style="text-decoration: underline 1px; font:normal normal normal 50px/51px Microsoft Yi Baiti">About us
            </h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen
                book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                Lorem Ipsum passages, and more
                recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>

            <h1 style="text-decoration: underline 1px; font:normal normal normal 50px/51px Microsoft Yi Baiti">Policies
            </h1>

            <ul class="policies" style="margin-bottom: 100px;">
                <li style="margin-top: 30px;">No eye makeup</li>
                <li>Don't curl your lashes</li>
                <li>No oils</li>
                <li>When you're feeling under the weather, simply reschedule</li>
                <li>10 minutes late results in a 5$ fee</li>
                <li>Every 5 minutes past a 10 minute is a 5$ for being late</li>
                <li>A non refundable deposit is required before booking</li>
            </ul>
        </div>

       
    </div>
    
    
 
    
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>