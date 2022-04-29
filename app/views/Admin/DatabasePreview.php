<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>
<style>
        div > table > thead  {
            background-color: #A7C7E7;
        }

        div > table > thead > tr> th:first-child {
            width: 12%;
        }

        tbody > tr:nth-child(odd) {
            background-color: #FBFFE2;
        }

    </style>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; ">
        <!-- add code here -->

        <!-- title -->
        <h4 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Database</h4>

        <div style="font: normal normal normal 40px/47px Lucida Fax; margin-top: 50px;">
            <!-- Clients table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">Clients</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">000001</th>
                            <td>mmmmmm@mmmmmm.com</td>
                            <td>Mmmmmmmmm Mmmmmmmmm</td>
                            <td>(999) 999-9999</td>
                        </tr>
                        <tr>
                            <th scope="row">000002</th>
                            <td>mmmmmm@mmmmmm.com</td>
                            <td>Mmmmmmmmm Mmmmmmmmm </td>
                            <td>(999) 999-9999</td>
                        </tr>
                        <tr>
                            <th scope="row">000003</th>
                            <td>mmmmmm@mmmmmm.com</td>
                            <td>Mmmmmmmmm Mmmmmmmmm</td>
                            <td>(999) 999-9999</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>

            <!-- Services table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">Services</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">100001</th>
                            <td>Classic</td>
                            <td>$55.55</td>
                            <td>2:30</td>
                            <td>Simple lashes</td>
                        </tr>
                        <tr>
                            <th scope="row">100002</th>
                            <td>Lash Removal</td>
                            <td>$55.55</td>
                            <td>0:30</td>
                            <td>Removal of lashes, glue</td>
                        </tr>
                        <tr>
                            <th scope="row">100003</th>
                            <td>Lash Refill</td>
                            <td>$55.55</td>
                            <td>1:30</td>
                            <td>Mmmmmmm mmmmmm mmmmmm</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>

            <!-- Appointments Table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">Appointments</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Client ID</th>
                            <th scope="col">Service ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">200001</th>
                            <td>18/06/2022</td>
                            <td>18:00</td>
                            <td>000001</td>
                            <td>100001</td>
                        </tr>
                        <tr>
                            <th scope="row">200002</th>
                            <td>29/06/2022</td>
                            <td>09:00</td>
                            <td>000002</td>
                            <td>100002</td>
                        </tr>
                        <tr>
                            <th scope="row">200003</th>
                            <td>30/06/2022</td>
                            <td>12:00</td>
                            <td>000003</td>
                            <td>100003</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>

            <!-- Showcase Table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">Showcase</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">300001</th>
                            <td>Showcase Name 1</td>
                            <td><a href="#">url</a></td>
                        </tr>
                        <tr>
                            <th scope="row">300002</th>
                            <td>Showcase Name 2</td>
                            <td><a href="#">url</a></td>
                        </tr>
                        <tr>
                            <th scope="row">300003</th>
                            <td>Showcase Name 3</td>
                            <td><a href="#">url</a></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>

            <!-- News Table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">News</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">400001</th>
                            <td>News Title 1</td>
                            <td>New lashes</td>
                            <td>30/05/2022</td>
                        </tr>
                        <tr>
                            <th scope="row">400002</th>
                            <td>News Title 2</td>
                            <td>nevermind.</td>
                            <td>19/05/2022</td>
                        </tr>
                        <tr>
                            <th scope="row">400003</th>
                            <td>News Title 3</td>
                            <td>Mmmmmm mmmmmm mmmmmm mmmmmm mmmmmm</td>
                            <td>00/00/0000</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>
            
            <!-- Shampoo table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">Shampoo</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">500001</th>
                            <td>Shampoo Name 1</td>
                            <td>$44.44</td>
                            <td>Shampoo Description</td>
                            <td><a href="#">url</a></td>
                        </tr>
                        <tr>
                            <th scope="row">500002</th>
                            <td>Shampoo Name 2</td>
                            <td>$44.44</td>
                            <td>Shampoo Description</td>
                            <td><a href="#">url</a></td>
                        </tr>
                        <tr>
                            <th scope="row">500003</th>
                            <td>Mmmmmm mmmmmm</td>
                            <td>$44.44</td>
                            <td>Mmmmmm mmmmmm</td>
                            <td><a href="#">url</a></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>

            <!-- Availabilites table -->
            <div style="margin-bottom: 115px;">
                <table class="table table-bordered">
                    <caption style="caption-side: top; border: none;">Availabilites</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Day</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">600001</th>
                            <td>Monday</td>
                            <td>09:00</td>
                            <td>12:00</td>
                        </tr>
                        <tr>
                            <th scope="row">600002</th>
                            <td>Tuesday</td>
                            <td>09:00</td>
                            <td>13:00</td>
                        </tr>
                        <tr>
                            <th scope="row">600003</th>
                            <td>Wednesday</td>
                            <td>12:00</td>
                            <td>21:00</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button class="btn" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        font-size: 13px;
                        ">
                    Print Table
                    </button>
                </div>
            </div>
            <!-- Print every table button -->
            <div style="text-align: center;">
                <button class="btn" href="#" style=" 
                width: 150px;
                height: 40px;
                background: #EF4848;
                border: 1px solid #707070;
                color: black;
                ">
            Print Summary
            </button>
            </div>
        </div>
    </div>
</body>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>