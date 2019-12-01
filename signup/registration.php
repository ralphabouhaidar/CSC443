<?php
require("../database/connection.php");

if(!isset($_POST["email"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["password"]) || !isset($_POST["password2"]))
{
    exit("Terminated.");
}

$telephone = null;

if(isset($_POST["telephone"]))
{
    $telephone = $_POST["telephone"];
}

$email = strtolower($_POST["email"]);
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$pass = $_POST["password"];
$pass2 = $_POST["password2"];

/*makes sure that name and last name are strictly letters */
if(!preg_match("/^[a-z]$/i", $firstname) || !preg_match("/^[a-z]$/i", $lastname))
{
    exit();
}

if($pass != $pass2)
{
    exit();
}

/*to avoid SQL injection*/
$email = addslashes($email);
$firstname = addslashes($firstname);
$lastname = addslashes($lastname);
$pass = password_hash($pass, PASSWORD_DEFAULT);

/*query that inserts the user's info into the database with the correct information*/
$sql = "QUERY HERE";
$result=$connection->query($sql);

header("Location: tours.php");

?>