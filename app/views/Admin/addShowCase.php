<?php require APPROOT . '/views/includes/headerAdmin.php'; 
?>
<style>
        
        .img {
            position: relative;
            background-size: 100%;
            background-repeat: no-repeat;
            width: 230px;
            height: 230px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 14px;
            display: block;
            /* this is for the img element */
            object-fit: cover;
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
        opacity: 1;">Gallery</h4>

        <div style="margin-top: 50px;">

            <form action='' method='post' enctype="multipart/form-data">
                
                <img id="preview" class="img" src="Example.PNG">

                <div class="mb-5">
                    <div class="mb-4">
                        <label for="showcasePicture">Picture</label>
                        <input onchange="showcasePicturePreview();" id="showcasePicture" name = "picture" class="form-control mb-4" type="file" >
                    </div>
                    <div>
                        <label for="showcaseTitle">Title</label>
                        <input id="showcaseTitle" name = "title" class="form-control" type="text" placeholder="Title" aria-label="titleLabel">
                    </div>
                </div>
                
                <script>
                    function showcasePicturePreview() {
                        //getting files from input
                        var files = showcasePicture.files;

                        //getting url for image (index 0 since single file input)
                        var previewImage = URL.createObjectURL(files[0]);

                        //setting image to preview
                        preview.src = previewImage;
                    }
                </script>

                <div style="height: 40px;">
                    <a href="AdminGallery.html" type="button" class="btn btn-secondary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <button type="submit" name="Create Showcase" class="btn btn-primary" style="
                        float: right;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>