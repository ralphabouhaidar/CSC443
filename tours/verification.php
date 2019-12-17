<?php 
    session_start();
    require("../database/connection.php");

    if(!isset($_GET["trip_id"]))
    {
        echo "Error";
        header("Location: ../404/index.php");
    }

    if(!isset($_SESSION["cid"]))
    {
        echo "Not signed in";
        header("Location: ../login/index.php");
    }

    else
    {
        $cid = $_SESSION["cid"];
        $trip_id = $_GET["trip_id"];

        /*query that searches for user with matching email, and returns table containing password*/
        $sql = "INSERT INTO Reservations(discount, trip_id, cutomer_id) VALUES (\"0\", \"".$trip_id."\", \"".$cid."\")";
        $result=$connection->query($sql);

        header("Location: book-success.php");
    }
?>