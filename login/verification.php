<!-- NOTE: SHOULD ALSO SET SESSION VARIABLE FOR NAME -->

<?php
session_start();
require("../database/connection.php");

if(!isset($_POST["email"]) || !isset($_POST["password"]))
{
    /*if the two POST fields are not set, return an error*/
    echo "error in fields";
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
    $sql = "SELECT c.password FROM Customers c WHERE username=\"".$email."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result*/
    {
        $row = $result->fetch_assoc();

        /*Verify password against hashed password, if method returns true, user is signed in*/
        if (password_verify($pass, $row["password"]))
        {
            echo "true";  
            $_SESSION["email"] = $email;
        }
            
        /*Password is not correct*/
        else
            echo "falsepass";
    }

    /*Email is not correct*/
    else
        echo "falseemail";
    
}
?>