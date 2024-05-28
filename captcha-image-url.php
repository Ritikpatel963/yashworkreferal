<?php
session_start();

function generateCaptchaText($length = 6)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captchaText = '';
    for ($i = 0; $i < $length; $i++) {
        $captchaText .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return $captchaText;
}

function createCaptchaImage($captchaText)
{
    $width = 120; // Increase width to accommodate larger text
    $height = 40; // Increase height to accommodate larger text
    $image = imagecreate($width, $height);

    // Colors
    $backgroundColor = imagecolorallocate($image, 255, 255, 255); // white
    $textColor = imagecolorallocate($image, 0, 0, 0); // black
    $lineColor = imagecolorallocate($image, 64, 64, 64); // gray
    $pixelColor = imagecolorallocate($image, 0, 0, 255); // blue

    // Fill the background
    imagefill($image, 0, 0, $backgroundColor);

    // Add some random lines for obfuscation
    for ($i = 0; $i < 10; $i++) {
        imageline($image, 0, mt_rand() % $height, $width, mt_rand() % $height, $lineColor);
    }

    // Add some random dots for obfuscation
    for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, mt_rand() % $width, mt_rand() % $height, $pixelColor);
    }

    // Add the text to the image using TrueType font
    $fontPath = 'roboto.ttf'; // Path to the TrueType font file
    $fontSize = 16; // Font size
    $textX = 15; // X coordinate of the text
    $textY = 30; // Y coordinate of the text (adjust as needed)
    imagettftext($image, $fontSize, 0, $textX, $textY, $textColor, $fontPath, $captchaText);

    // Output the image
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
}

$captchaText = generateCaptchaText();
$_SESSION['captcha'] = $captchaText;

createCaptchaImage($captchaText);
