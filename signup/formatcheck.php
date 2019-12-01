<?php
if(!isset($_POST["password"]) || !isset($_POST["email"]))
{
    /*if the two POST fields are not set, return an error*/
    exit();
}

else
{
    $password = $_POST["password"];
    $email = $_POST["email"];
    $result = "success";

    /*Checks if the email is in the correct format*/
    if(!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z]+[.][a-zA-Z]{2,3}$/", $email))
    {
        $result = "Wrong email format.";
    }
    
    /*Checks if the password meets all requirements*/
    if(!preg_match("/[a-z]/", $password))
    {
        $result = "Password must contain at least 1 lowercase alphabetical character <br/>";
    }

    if(!preg_match("/[A-Z]/", $password))
    {
        $result = "Password must contain at least 1 uppercase alphabetical character <br/>";
    }

    if(!preg_match("/[0-9]/", $password))
    {
        $result = "Password must contain at least 1 numeric character <br/>";
    }

    if(!preg_match("/([<>!@#\$%\^&~*-])/", $password))
    {
        $result = "Password must contain at least one special character <br/>";
    }

    if(!preg_match("/.{8,}/", $password))
    {
        $result = "Password must must be eight characters or longer <br/>";
    }


    echo $result; //returns result to ajax
}

?>