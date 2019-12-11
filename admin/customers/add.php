<?php
session_start();
require("../../database/connection.php");

if(!isset($_POST["first"]) || !isset($_POST["last"]) || !isset($_POST["email"]) || !isset($_POST["address"]))
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
    $email = addslashes($email);
    $address = addslashes($_POST["address"]);
    $phone = addslashes($_POST["phone"]);
    $pass = password_hash("user", PASSWORD_DEFAULT);

    /*query that searches for user with matching email, and returns table*/
    $sql = "SELECT * FROM Customers c WHERE c.email=\"".$email."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result, then an employee already exists with that email*/
    {
        echo "Error: Customer email already exists.";
    }

    /*Email doesn't exist*/
    else
    {
        $sql="INSERT INTO Customers(email, first_name, last_name, password, address) 
                VALUES (\"".$email."\", \"".$first."\", \"".$last."\", \"".$pass."\", \"".$address."\")";
        $result=$connection->query($sql);

        if(isset($_POST["phone"]))
        {
            $query = "SELECT c.customer_id FROM Customers c WHERE c.email = \"".$email."\"";
            $result2 = $connection->query($query);
            $row = $result2->fetch_assoc();

            $query2="INSERT INTO Contact_info(customer_id, email, phone_nb)
                    VALUES(\"".$row["customer_id"]."\", \"".$email."\", \"". $_POST["phone"]."\")";
            $result3 = $connection->query($query2); 
        }

        echo "Success!";
    }
    
}



?>