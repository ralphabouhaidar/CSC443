<?php
require("../database/connection.php");

if(!isset($_POST["email"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["password"]) || !isset($_POST["password2"]))
{
    exit("Terminated.");
}

if(isset($_POST["telephone"]))
{
    $telephone = $_POST["telephone"];
}

$email = strtolower($_POST["email"]);
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$pass = $_POST["password"];
$pass2 = $_POST["password2"];

/*to avoid SQL injection*/
$email = addslashes($email);

$pass = addslashes($pass);
$pass2 = addslashes($pass2);


?>