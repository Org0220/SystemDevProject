<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>



<style>
        div > input, div > label, div > textarea {
            font: normal normal normal 16px/20px Lucida Fax;
        }

        
    </style>

    <div class="container" style=" margin: auto; margin-top: 5%; height: auto;  min-height: 100%;">
        <!-- add code here -->

        <!-- title -->
        <h5 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Newsletter</h5>

        <?php if (isset($data['error'])): ?>
        <?php foreach ($data['error'] as $error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>

        <div style="margin-top: 50px;">
            <form action='<?= URLROOT ?>/news/update_news/<?= $data['news']->id ?>' method='post'>
                <div class="mb-5">
                    <div class="mb-4">
                        <label for="newsletterTitle">Title</label>
                        <input id="newsletterTitle" name = "title" class="form-control" type="text" aria-label="titleLabel" value="<?= $data['news']->title ?>">
                    </div>
                    <div class="mb-4">  
                        <label for="newsletterDescription" class="form-label">Content</label>
                        <textarea id="newsletterDescription" name = "description" class="form-control" rows="4"><?= $data['news']->content ?></textarea>
                    </div>
                </div>
                
                <div style="height: 40px;">
                    <a href="<?= URLROOT ?>/news/admin_news" class="btn btn-secondary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <button type="submit" name="Update News" class="btn btn-primary" style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
   
<?php require APPROOT . '/views/includes/footer.php'; ?>