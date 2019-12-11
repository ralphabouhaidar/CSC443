<?php
session_start();
require("../../database/connection.php");

if(!isset($_POST["email"]))
{
    echo "fields not set";
    exit();
}

else
{
    /*Checks database*/ 
    $email = strtolower($_POST["email"]);

    /*to avoid SQL injection*/
    $email = addslashes($email);

    /*query that searches for user with matching email, and returns table*/
    $sql = "SELECT * FROM Employees e WHERE e.emp_email=\"".$email."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result*/
    {
        $sql = "DELETE FROM Employees WHERE emp_email=\"".$email."\"";
        $result=$connection->query($sql);
        echo "success";
    }

    /*Email is not correct*/
    else
        echo "falseemail";
    
}



?>