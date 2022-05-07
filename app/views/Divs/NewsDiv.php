<!-- div representing news card -->
<div class="card" style="
     margin-top:50px;
     background: #FFFFFF 0% 0% no-repeat padding-box;
     border: 1px solid #707070;
     border-radius: 50px;
     opacity: 1;
     ">
        <div class="card-body">

            <!-- div for Title and date -->
            <div class="first-row" style="width: 100%; height:auto;  margin:0px; float:left;">
                <h5 class="card-title" style=" margin:auto;  text-align: center;
                 font: normal normal normal 40px/47px Lucida Fax;
                 letter-spacing: 0px;
                 color: #000000;
                 opacity: 1;"><?= $news->title ?></h5>
                 <h6 class="card-title" style=" margin:auto;  text-align: center;
                 font: normal normal normal 15px Lucida Fax;
                 letter-spacing: 0px;
                 color: #000000;
                 opacity: 1;"><?= $news->date ?></h6>


            </div>
            <!-- div for Description -->
            <div class="second-row" style="float: left; width:100%; height:150px;">
        
                <h6 style="margin-left: auto; margin-right:auto; width:80%; margin-top: 15px;">Description</h6>
                <p style="margin-left: auto; margin-right:auto; width:80%; margin-top: 15px; "><?= $news->content ?></p>
            </div>
            <!-- div for signature -->
            <div class="third-row" style="float:right; width:100%; height:auto; ">
                <h3  style="
                float:right;
                font:normal normal normal 13px Lucida Fax; 
                 ">-Mary Grace Antonio</h3>
            </div>
        </div>
    </div>