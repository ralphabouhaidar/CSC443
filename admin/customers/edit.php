<?php
session_start();
require("../../database/connection.php");

if(!isset($_POST["oldemail"]) || !isset($_POST["first"]) || !isset($_POST["last"]) || !isset($_POST["email"]) || !isset($_POST["address"]))
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
    $email = addslashes($email);
    $address = addslashes($_POST["address"]);
    $phone = addslashes($_POST["phone"]);
    

    /*query that searches for user with matching email, and returns table containing password*/
    $sql = "UPDATE Customers
            SET first_name = \"".$first."\", last_name = \"".$last."\", email = \"".$email."\", address = \"".$address."\"
            WHERE email=\"".$oldemail."\"";
    $result=$connection->query($sql);

    if(isset($_POST["phone"]))
    {
        if($_POST["phone"] == "")
        {
            $sql2 = "DELETE FROM Contact_info WHERE email = \"".$oldemail."\"";
            $result2 = $connection->query($sql2);
        }

        else
        {
            $sql2 = "UPDATE Contact_info SET phone_nb = \"". $_POST["phone"] ."\", email = \"".$email."\"";
            $result2 = $connection->query($sql2);
        }
    }

    echo "success";
    
}



?>