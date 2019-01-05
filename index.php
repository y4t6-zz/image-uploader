<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Example</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="jumbotron text-center">
 <h1>Multiple Image Upload </h1>
 <p>Using Simple Jquery Ajax In PHP</p> 
</div>
 
<div class="container">
 <div class="row">
 <form action="upload.php" method="post" id="upload_form">
 <div class="col-md-6">
 <input type="file" id="gallery-photo-add" class="form-control" name="files[]" multiple>
 </div>
 <div class="col-md-6">
 <button class="btn btn-primary">Submit</button>
 </div>
 </form>
 </div>
 <div class="row" id="output">
 
 </div>
 <div class="gallery"></div>
</div>

<script>
 jQuery(document).ready(function() {
    $('#upload_form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(result){
                $('#output').html(result);
            }
        });
    });

    // Multiple images preview in browser
    function imagesPreview(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {  
        imagesPreview(this, 'div.gallery');
    });

 });
</script>

</body>
</html>
