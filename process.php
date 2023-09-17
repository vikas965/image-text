<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $file_name = $_FILES['image']['name'];
        // Check if the file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to a temporary directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Perform OCR using Tesseract
                $executable = '"C:\Program Files (x86)\Tesseract-OCR\tesseract"';
                $output = shell_exec("$executable $target_file stdout");


                // Display the extracted text
                // echo "<h2>Extracted Text:</h2>";
                // echo "<pre>";
                // $myfile = fopen("stdout.txt", "r") or die("Unable to open file!");
                // $output =  fread($myfile,filesize("stdout.txt"));
                // echo $output;
                // fclose($myfile);
                // echo "</pre>";
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "The uploaded file is not an image.";
        }
    }
    ?>
