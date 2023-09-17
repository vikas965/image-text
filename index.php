
<?php 

 include "process.php";
 
 
  ?>

<!DOCTYPE html>
<html>
<head>
    <title>Image to Text Converter</title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <script src="https://use.fontawesome.com/3a2eaf6206.js"></script>
</head>
<body>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
   

    .container
    {
        width:100%;
        height: 100vh;
        background: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        display: flex;
        /* align-items: center; */
        /* justify-content: center; */
        /* gap: 70px; */
        padding: 40px;
        gap:40px;
        column-gap: 300px;


        

    }
    .upload{
        display: flex;
        flex-direction: column;
        align-items: center; 
         justify-content: center;
        row-gap: 20px;
    }

    .upload h2{
        font-weight: 500;
        font-style: italic;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .output{
        display: flex;
        text-align: center;
        /* text-transform: capitalize; */
        text-wrap: wrap;
       
       
    }
</style>

<div class="container">

<div class="upload">
<h2>Upload an Image:</h2>
<!-- <form class="form-container" enctype='multipart/form-data' method="post">
	<div class="upload-files-container">
		<div class="drag-file-area">
			<span class="material-icons-outlined upload-icon"> file_upload </span>
			<h3 class="dynamic-message"> Drag & drop any file here </h3>
			<label class="label"> or <span class="browse-files"> <input name="image" type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span> </label>
		</div>
		<span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Please select a file first <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
		<div class="file-block">
			<div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name"> </span> | <span class="file-size">  </span> </div>
			<span class="material-icons remove-file-icon">delete</span>
			<div class="progress-bar"> </div>
		</div>
		<button type="button" class="upload-button"> Upload </button>
	</div>
    
</form> -->

<style>
     input[type="file"]{
  display: none;
  div{
        text-align:center;
        padding:3%;
        border:thin solid black;
      }
      
      input[type="file"]{
        display: none;
      }

      label{
        cursor:pointer;
      }
      
      #imageName{
        color:green;
      }
}
</style>
<div><form method="post" enctype="multipart/form-data">
      <label for="inputTag">
        Select Image <br/>
        <i class="fa fa-2x fa-camera"></i>
        
        <input name="image"  id="inputTag" type="file"/>
        
        <br/>
        <span id="imageName"></span>
      </label>
    </div>
    
        <!-- <input type="file" name="image"  required> -->
        <input type="submit" value="Convert">
    </form>
    <style>
        .fingerprint {
  width: 358px;
  height: 358px;
  border: solid 3px #AAB8BE;
  border-radius:8px;
  background:url('images/<?php echo $file_name;?>');
  background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
}

.fingerprint.scanning::after {
  content: '';
  position: absolute;
  width: 358px;
  height: 38px;
  background-image: linear-gradient(to bottom,
    rgba(170, 184, 190, 0),
    rgba(170, 184, 190, .8));
  animation: scanning .8s linear infinite;
}

@keyframes scanning {
    100% { transform: translate(0, 352px); }
}
    </style>
    
    <!-- <img src="https://i.stack.imgur.com/WiDpa.jpg" alt=""> -->
    <div class="fingerprint scanning">
    
    </div>
    <br>
</div>
<div class="output">
  <pre>
<p class="text">
<?php 

require_once 'vendor/autoload.php'; // Include the Composer autoloader

use thiagoalessio\TesseractOCR\TesseractOCR;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
// Replace 'image.png' with the path to your image file
$imageFile = $_FILES["image"]["name"];
$imagePath = 'images/'.$imageFile;

// Create an instance of TesseractOCR
$tesseract = new TesseractOCR($imagePath);

// Optional: Set the language and other options if needed
$tesseract->setLanguage('eng'); // Set the language to English

// Perform OCR and get the extracted text
$extractedText = $tesseract->run();

// Display the extracted text
echo $extractedText;
}


?>
</p>
</pre>
</div>
</div>
    

<script>
        let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=>{
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
    </script>
    
    

    


<script>
     




</script>
</body>
</html>
