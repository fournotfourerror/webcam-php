<!doctype html>
<html>
<head>
    <title>Capture picture from your webcam</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

    <script src="jquery.js"> </script>
</head>

<body>
    <div id="camera" style="height:auto;width:auto; text-align:left;"></div>

    <!--FOR THE SNAPSHOT-->
    <input type="button" value="Take a Snap" id="btPic" onclick="takeSnapShot()" /> 
    <p id="snapShot"></p>
    <button onclick="show()"> upload </button>

    <div id="image_data"> 

    </div>
</body>

<script>
    // CAMERA SETTINGS.
    Webcam.set({
        width: 220,
        height: 190,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    Webcam.attach('#camera');

    // SHOW THE SNAPSHOT.
    takeSnapShot = function () {
        Webcam.snap(function (data_uri) {
            document.getElementById('snapShot').innerHTML = 
                '<img src="' + data_uri + '" width="70px" height="50px" id="image"/>';
        });
    }

    function show(){
        var imageData=document.getElementById('image').src;
        $.ajax({
            url:"insertImage.php",
            method:"POST",
            data:{image:imageData},
            success:(data)=>{
                $("#image_data").html(data);
            }
        })
    }
</script>
</html>
