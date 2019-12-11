<?php
session_start();
require("../../database/connection.php");

if(!isset($_POST["oldemail"]) || !isset($_POST["first"]) || !isset($_POST["last"]) || !isset($_POST["position"]) || !isset($_POST["email"]) || !isset($_POST["address"]) || !isset($_POST["phone"]) || !isset($_POST["salary"]))
{
    echo "fields not set";
    exit();
}

else
{
    $email = strtolower($_POST["email"]);

    /*to avoid SQL injection*/
    $oldemail = addslashes($_POST["oldemail"]);
    $first = addslashes($_POST["first"]);
    $last = addslashes($_POST["last"]);
    $position = addslashes($_POST["position"]);
    $email = addslashes($email);
    $address = addslashes($_POST["address"]);
    $phone = addslashes($_POST["phone"]);
    $salary = addslashes($_POST["salary"]);
    

    /*query that searches for user with matching email, and returns table containing password*/
    $sql = "UPDATE Employees
            SET emp_first = \"".$first."\", emp_last = \"".$last."\", position = \"".$position."\", emp_email = \"".$email."\", address = \"".$address."\", emp_phone = \"".$phone."\", Salaries = \"".$salary."\"
            WHERE emp_email=\"".$oldemail."\"";
    $result=$connection->query($sql);

    echo "success";
    
}



?>