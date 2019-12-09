<?php

session_start();
require("../database/connection.php");

if(!isset($_POST["email"]) || !isset($_POST["password"]))
{
    /*if the two POST fields are not set, return an error*/
    echo "Error!";
    exit();
}

else
{
    /*Checks database*/ 
    $email = strtolower($_POST["email"]);
    $pass = $_POST["password"];

    /*to avoid SQL injection*/
    $email = addslashes($email);
    $pass = addslashes($pass);

    /*query that searches for user with matching email, and returns table containing password*/
    $sql = "SELECT * FROM Customers c WHERE email=\"".$email."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result*/
    {
        $row = $result->fetch_assoc();

        /*Verify password against hashed password, if method returns true, user is signed in*/
        if (password_verify($pass, $row["password"]))
        {
            $_SESSION["admin"] = false;
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $row["first_name"];
            $_SESSION["last_name"] = $row["last_name"];
            $_SESSION["cid"] = $row["customer_id"];

            echo "Success!";  
        }
            
        /*Password is not correct*/
        else
            echo "Wrong password!1";
    }

    /*Not in Customers table? Check employees table!*/
    else
    {
        $sql = "SELECT * FROM Employees e WHERE emp_email=\"".$email."\"";
        $result=$connection->query($sql);

        if($result->num_rows > 0) /*if the query returns a non-empty result*/
        {
            $row = $result->fetch_assoc();

            /*Verify password against hashed password, if method returns true, user is signed in*/
            if (password_verify($pass, $row["password"]))
            {
                $_SESSION["admin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["first_name"] = $row["emp_first"];
                $_SESSION["last_name"] = $row["emp_last"];
                // $_SESSION["eid"] = $row["employee_id"];
                
                echo "Successfully signed in as admin!";
            }
                
            /*Password is not correct*/
            else
                echo "Wrong password!2";
        }

        else
            echo "Wrong email!";
    }
    
}
?>