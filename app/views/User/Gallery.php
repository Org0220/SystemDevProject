<?php require APPROOT . '/views/includes/headerUser.php'; 
?>

<style>
        .img {
            position: relative;
            background-image: url("Example.PNG");
            background-size: 100%;
            background-repeat: no-repeat;
            width: 230px;
            height: 230px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 14px;
            display: block;
        }
        
        .imgModal {
            position: relative;
            background-image: url("Example.PNG");
            background-size: 100%;
            background-repeat: no-repeat;
            width: 470px;
            height: 470px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 14px;
            display: block;
        }
    </style>
<div class="container" style="width:100%; height:auto; margin-top: 5%;">
        <h4 class="card-title" style=" 
        padding-bottom: 50px;
        margin:auto;  
        text-align: center;
        font: normal normal normal 40px/47px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Gallery</h4>

        <!-- 3 column grid -->
        <div class="row row-cols-3">

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

            <!-- img box -->
            <div class="col" style="margin-top: 50px;">
                <div class="img">
                    <div class="title" style="
                    position:absolute;
                    width:100%;
                    height:30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        ">Classic Set</button>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal">
                                        <div class="title" style="
                                         position:absolute;
                                        width:100%;
                                        height:30px;
                                        bottom: 0;
                                        border-radius: 8px 8px 14px 14px; 
                                        display:block;
                                        background: #000000 0% 0% no-repeat padding-box;
                                        opacity: 0.40;
                                        ">
                                            <!-- title -->
                                            <h5 style="
                                                text-align: center;
                                                font: normal normal normal 30px Lucida Fax;
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                opacity: 1;">Classic Set</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

        </div>
    </div>

</body>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>