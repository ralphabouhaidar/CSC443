<?php
session_start();
require("../../database/connection.php");

if(!isset($_POST["location"]))
{
    echo "fields not set";
    exit();
}

else
{
    /*to avoid SQL injection*/
    $location = addslashes($location);

    /*query that searches for user with matching email, and returns table*/
    $sql = "SELECT * FROM Trails a WHERE a.location=\"".$location."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result*/
    {
        $sql = "DELETE FROM Trails WHERE location=\"".$location."\"";
        $result=$connection->query($sql);
        echo "success";
    }

    /*not correct*/
    else
        echo "false";
    
}



?>