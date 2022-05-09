<?php require APPROOT . '/views/includes/headerAdmin.php';
?>




<style>
    div>input,
    div>label,
    div>textarea {
        font: normal normal normal 16px/20px Lucida Fax;
    }
</style>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto;  min-height: 100%;">
    <!-- add code here -->

    <!-- title -->
    <div class="container" style="margin-top: 5%; height: auto;">
        <h4 class="card-title" style=" margin:auto;  text-align: center;
            font: normal normal normal 40px/47px Lucida Fax;
            letter-spacing: 0px;
            color: #000000;
            opacity: 1;">Newsletter
        </h4><br>

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

        <!-- div to add a new service -->
        <a href="<?= URLROOT ?>/news/create_news" button type="submit" name="addNewsletterBtn" class="btn btn-primary mr-2" style="
        float: right;
        width: 80px;
        height: 40px;
        background: #A7C7E7 0%;
        border: 1px solid #ffffff;
        color: rgb(255, 255, 255);
        ">+
        </a>
        <br>

        <?php foreach ($data['news'] as $news) : ?>
            <!-- div representing service card -->
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
                        <h3 style="
               float:right;
               font:normal normal normal 13px Lucida Fax; 
                ">-Mary Grace Antonio</h3>
                    </div><br>

                    <!-- Div for edit and delete buttons -->
                    <div style="height: 50px;"><br><br>
                        <a href="<?= URLROOT ?>/news/delete_news/<?= $news->id ?>" class="btn btn-primary" style="
                float: right;
                width: 100px;
                height: 40px;
                background: #ba2c2c;
                border: 1px solid #707070;
                color: rgb(255, 255, 255);
                ">Delete
                            </button>
                            <a href="<?= URLROOT ?>/news/update_news/<?= $news->id ?>" class="btn btn-secondary mr-4" style="
                float: right;
                width: 100px;
                height: 40px;
                background: #94cd8b;
                border: 1px solid #707070;
                color: black;
            ">Edit</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>


    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>