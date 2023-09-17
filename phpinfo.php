<?php 

require_once 'vendor/autoload.php'; // Include the Composer autoloader

use thiagoalessio\TesseractOCR\TesseractOCR;
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
// Replace 'image.png' with the path to your image file
$imagePath = 'images/l002-social.jpg';

// Create an instance of TesseractOCR
$tesseract = new TesseractOCR($imagePath);

// Optional: Set the language and other options if needed
$tesseract->setLanguage('eng'); // Set the language to English

// Perform OCR and get the extracted text
$extractedText = $tesseract->run();

// Display the extracted text
echo $extractedText;



?>