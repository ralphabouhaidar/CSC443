<?php
require("../database/connection.php");

if(!isset($_POST["email"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["password"]) || !isset($_POST["password2"]) || !isset($_POST["address"]))
{
    echo "Error";
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
$address = $_POST["address"];
$pass = $_POST["password"];
$pass2 = $_POST["password2"];

/*makes sure that name and last name are strictly letters */
if(!preg_match("/^[a-z A-Z]+$/", $firstname) || !preg_match("/^[a-z A-Z]+$/", $lastname))
{
    echo "Wrong formatted name.";
    exit();
}

if($pass != $pass2)
{
    echo "Passwords don't match.";
    exit();
}

/*to avoid SQL injection*/
$email = addslashes($email);
$firstname = addslashes($firstname);
$lastname = addslashes($lastname);
$address = addslashes($address);
$pass = password_hash($pass, PASSWORD_DEFAULT);

/*query that inserts the user's info into the database with the correct information*/
$sql = "INSERT INTO Customers(email, first_name, last_name, password, address) 
        VALUES (\"".$email."\", \"".$firstname."\", \"".$lastname."\", \"".$pass."\", \"".$address."\")";
$result=$connection->query($sql);

header("Location: ../index.php");

?>