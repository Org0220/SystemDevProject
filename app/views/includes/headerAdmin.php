<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT ?>/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <style>
        div > input, div > label, div > textarea {
            font: normal normal normal 16px/20px Lucida Fax;
        }

        
    </style>
    <title>
        Quedescils
    </title>
</head>

<body>
    <header style=" position: sticky">
        <div class="color-bar" style="
        width: 100%;
        height:3%;
        background: transparent linear-gradient(90deg, #A7C7E7 0%, #FBFFE2 100%) 0% 0% no-repeat padding-box;
        border: 1px solid #707070;
        opacity: 1;">
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: 1px solid black;">
            <li class="navbar-brand">
                <a class="nav-link" href="/SystemDevProject/Appointments/admin_appointments"

                    style="font: normal normal normal 25px/25px Lucida Fax; color: black">Que Des Cils</a>
            </li>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <i class="fas fa-bars"></i> -->
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Appointment/admin_appointments"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Appointment/admin_appointments"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Appointments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Services/admin_services"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Shampoos/admin_shampoos"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/News/admin_news"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Newsletter</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Showcase/admin_showcases"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Availabilities/"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Availabilities</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Admin/Database"
                            style="text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Database</a>
                    </li>
                </ul>
				
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="/SystemDevProject/Login/adminLogout"
                            style="float: right; text-align: center; width: 115px; font: 20px Microsoft Yi Baiti;">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>