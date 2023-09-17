<?php
// Function to perform image preprocessing
function preprocessImage($imagePath, $outputPath)
{
    // Load the image
    $image = imagecreatefromjpeg($imagePath); // Change the format based on your input image type
    imagefilter($image, IMG_FILTER_NEGATE);
    imagefilter($image, IMG_FILTER_EDGEDETECT);
    // Binarization
    imagefilter($image, IMG_FILTER_GRAYSCALE);
    imagefilter($image, IMG_FILTER_CONTRAST, -100); // Adjust the contrast value as needed
    // imagefilter($image, IMG_FILTER_THRESHOLD, 128); // Adjust the threshold value as needed

    // Noise Reduction (Gaussian Blur)
    imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
   
  // Adjust the threshold value as needed

    // Save the preprocessed image
    imagejpeg($image, $outputPath); // Change the format based on your desired output format

    // Clean up resources
    imagedestroy($image);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Move the uploaded file to a temporary directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Perform image preprocessing
            $preprocessedImage = "images/preprocessed.jpg"; // Adjust the output path as needed
            preprocessImage($target_file, $preprocessedImage);

            // Run Tesseract OCR on the preprocessed image
            $executable = '"C:\Program Files (x86)\Tesseract-OCR\tesseract"';
            $output = shell_exec("$executable $preprocessedImage stdout");

            // Display the extracted text
            echo "<h2>Extracted Text:</h2>";
            echo "<pre>";
            echo $output;
            echo "</pre>";
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "The uploaded file is not an image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image to Text Converter</title>
</head>
<body>
    <h1>Image to Text Converter</h1>

    <h2>Upload an Image:</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Convert">
    </form>
</body>
</html>
