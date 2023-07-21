<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <title>Webcam</title>
</head>
<body>

    <div class="container">
    <div id='webcam' class='border mb-2 rounded'>

    </div>
    <button onclick='snap(this)' class='btn btn-primary'>CAPTURE</button>
    <button onclick='preview()' class='btn btn-warning'>PREVIEW</button>
    <button onclick='unpreview()' class='btn btn-warning'>NEXT</button>
    </div>

    <script src="webcam.min.js"></script>
    <script>



        Webcam.set({
            width : 400,
            height : 300,
            flip_horiz:true,
            image_type : 'jpeg',
            jpeg_quality : 100,
        });
        Webcam.attach('#webcam');
        function preview(){
            Webcam.freeze();
        }

        function snap(e){
            Webcam.snap(function(data){
                Webcam.upload(data,'upload.php',function(code,text){
                   alert("Data berhasil di rekam")
                });
            });
        }

        function unpreview(){
            Webcam.unfreeze();
        }
      
    </script>
</body>
</html>