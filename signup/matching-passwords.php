<?php
if(!isset($_POST["password"]) || !isset($_POST["password2"]))
{
    /*if the two POST fields are not set, return an error*/
    exit();
}

else
{
    /*Makes sure password1 and password2 match*/
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $result = "true";

    if($password != $password2)
    {
        $result = "Passwords don't match.";
    }

    echo $result;
}
?>