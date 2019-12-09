
<?php
session_start();
require("../database/connection.php");

if(!isset($_POST["first"]) || !isset($_POST["last"]) || !isset($_POST["position"]) || !isset($_POST["email"]) || !isset($_POST["address"]) || !isset($_POST["phone"]))
{
    echo "fields not set";
    exit();
}

else
{ 
    $email = strtolower($_POST["email"]);

    /*to avoid SQL injection*/
    $first = addslashes($_POST["first"]);
    $last = addslashes($_POST["last"]);
    $position = addslashes($_POST["position"]);
    $email = addslashes($email);
    $address = addslashes($_POST["address"]);
    $phone = addslashes($_POST["phone"]);
    $pass = password_hash("admin", PASSWORD_DEFAULT);

    /*query that searches for user with matching email, and returns table*/
    $sql = "SELECT * FROM Employees e WHERE e.emp_email=\"".$email."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result, then an employee already exists with that email*/
    {
        echo "Error: Employee email already exists.";
    }

    /*Email doesn't exist*/
    else
    {
        $sql="INSERT INTO Employees(emp_email, emp_first, emp_last, password, address, emp_phone, position) 
                VALUES (\"".$email."\", \"".$first."\", \"".$last."\", \"".$pass."\", \"".$address."\", \"".$phone."\", \"".$position."\")";
        $result=$connection->query($sql);
        echo "Success!";
    }
    
}



?>