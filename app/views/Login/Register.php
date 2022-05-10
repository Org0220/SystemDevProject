<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- Animate Title-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Square+Peg&display=swap" rel="stylesheet">
    
    <title>
        Quedescils
    </title>
</head>

<body background="<?php echo URLROOT.'/public/img/'?>Wallpaper.png" style= "background-repeat: no-repeat; background-size: cover;">
<?php echo !isset($data['error']);?>
<?php if (isset($data['error'])): ?>
        <div class="errors">
            <?php foreach($data['error'] as $error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <br><br><br><br>
    <!-- Register title -->
    <section class="login">
    <div class="text-center">
        <div class="headerPage" style="font-family: 'Open Sans', sans-serif; color:#ffffff;">
            <h1 class="animate__animated animate__heartBeat">SIGN UP!</h1><br>
        </div>
    </div>

    
    <form method = "post" style="font-family: 'Open Sans', sans-serif;">
        <div class="d-flex justify-content-center">
            <div class="col-sm-8"><br>
                <input type="text" name="first_name" class="form-control" id="inputFirstName" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid white; color: white;" placeholder="First Name:"><br>
                <input type="text" name="last_name" class="form-control" id="inputLastName" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid white; color: white;" placeholder="Last Name:"><br>
                <input type="text" name="phone_number" class="form-control" id="inputPhone" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid white; color: white;" placeholder="Phone Number:"><br>
                <input type="email" name="email" class="form-control" id="inputEmail" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid white; color: white;" placeholder="Email"><br>
                <input type="password" name="password" class="form-control" id="inputPassword" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid white; color: white;" placeholder="Password:"><br>
                <input type="password" name="verify_password" class="form-control" id="inputConfirmPassword" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid white; color: white;" placeholder="Confirm Password:">
            </div>
        </div><br><br>

        <div class="d-flex justify-content-center">
            <button type="submit" name = "register" class="btn btn-primary" style="height: 50px; width: 50%; border: none; outline: none; border-radius: 60px; font-weight: 600; background: #EFE5FF; color:#CFB0D5;">Register</button>
        </div><br><br>
        <div class="d-flex justify-content-center">
            <div class="col-sm-6">
                <h6 style="color:#94749b;">Already registered? <a href="/SystemDevProject/" style="color:#94749b"><b> Login!</b></a></h6>
            </div>
        </div>
        
    </form>
</section>

</body>
</html>