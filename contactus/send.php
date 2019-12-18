<?php 
if(!isset($_POST["email"]) || !isset($_POST["message"]))
{
    echo "Email not set.";
    exit();
}

$sender = $_POST["email"];
$recipient = 'yousboud@hotmail.com';

$subject = "SUPPORT";
$message = $_POST["message"];
$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= 'From: '.$sender."\r\n";

mail($recipient, $subject, $message, $headers);

echo "Message accepted";

header("Location: ../tours/book-success.php");


?>