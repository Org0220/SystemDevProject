<?php require APPROOT . '/views/includes/headerAdmin.php';
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

    .img {
        position: relative;
        background-image: url("627864b9265a7.jpg");
        background-size: 100%;
        background-repeat: no-repeat;
        width: 230px;
        height: 230px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 14px;
        display: block;
    }

    .ins {
        position: relative;
        width: 230px;
        height: 230px;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #707070;
        border-radius: 14px;
        display: block;
    }

    .imgModal {
        position: relative;
        background-image: url("627864b9265a7.jpg");
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
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; min-height: 100%; ">
    <!-- add code here -->

    <!-- title -->
    <h4 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Gallery</h4>

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

    <div class="row row-cols-3">

        <!-- button to add a new gallery entry -->
        <div class="col" style="margin-top: 50px;">
            <a class="ins btn" href="<?= URLROOT ?>/showcase/create_showcase">
                <!-- data-bs-toggle="modal" data-bs-target="#addToGallery"> -->
                <div style="width: 30px; height: 110px; background: #D7E7E4; position: absolute; top: 60px; right: 100px;"></div>
                <div style="width: 110px; height: 30px; background: #D7E7E4; position: absolute; top: 100px; right: 60px;"></div>
            </a>

            <!-- <div class="modal fade" id="addToGallery" tabindex="-1" aria-labelledby="addToGalleryLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #D7E7E4;">
                            <h5 class="modal-title" id="exampleModalLabel" ">Create Gallery Entry</h5>
                          <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="img mb-3"></div>
                                <input class="form-control mb-4" type="file" id="formFile">

                                <input class="form-control mb-5" type="text" placeholder="Title" aria-label="titleLabel">

                                <div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="
                                        float: left;
                                        width: 150px;
                                        height: 40px;
                                        background: #A7C7E7;
                                        border: 1px solid #707070;
                                        color: black;
                                    ">Cancel</button>
                                    <button type="submit" name="addShowcase" class="btn btn-primary" style="
                                        float: right;
                                        width: 150px;
                                        height: 40px;
                                        background: #A7C7E7;
                                        border: 1px solid #707070;
                                        color: black;
                                    ">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>

        <?php foreach ($data['showcases'] as $showcase) : ?>
            <!-- gallery entry -->
            <div class="col" style="margin-top: 50px;">
                <div class="img" style="
                    position: relative;
                    background-image: url('<?= URLROOT ?>/public/img/<?= $showcase->image_url ?>');
                    background-size: 100%;
                    background-repeat: no-repeat;
                    width: 230px;
                    height: 230px;
                    margin-left: auto;
                    margin-right: auto;
                    border-radius: 14px;
                    display: block;
                ">
                    <div class="title" style="
                    position: absolute;
                    width: 100%;
                    height: 30px;
                    bottom: 0;
                    border-radius: 8px 8px 14px 14px; 
                    display:block;
                    background: #000000 0% 0% no-repeat padding-box;
                    opacity: 0.40;
                    ">
                        <!-- title -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgView<?= $showcase->id ?>" style="
                        border: none;
                        background-color: inherit;
                        font-size: 16px;
                        color:white;    
                        cursor: pointer;
                        "><?= $showcase->title ?></button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="imgView<?= $showcase->id ?>" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"></button>
                            <div class="modal-content" style="background-color:black;">

                                <div class="modal-body">

                                    <div class="imgModal" style="
                                            position: relative;
                                            background-image: url('<?= URLROOT ?>/public/img/<?= $showcase->image_url ?>');
                                            background-size: 100%;
                                            background-repeat: no-repeat;
                                            width: 470px;
                                            height: 470px;
                                            margin-left: auto;
                                            margin-right: auto;
                                            border-radius: 14px;
                                            display: block;
                                    ">
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
                                                opacity: 1;"><?= $showcase->title ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- buttons -->
                <div style="height: auto; width: 230px; padding: 15px 0px; margin: auto;">
                    <a class="btn" href="<?= URLROOT ?>/showcase/update_showcase/<?= $showcase->id ?>" style="
                        float: left;
                        width: 100px;
                        height: 40px;
                        background: #D7E7E4;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: black;
                        ">
                        Edit
                    </a>
                    <a class="btn" href="<?= URLROOT ?>/showcase/delete_showcase/<?= $showcase->id ?>" style="
                        float: right;
                        width: 100px;
                        height: 40px;
                        background: #FB3C4F;
                        border: 1px solid #707070;
                        border-radius: 12px;
                        color: white;
                        ">
                        Delete
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>