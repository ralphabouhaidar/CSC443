<?php
session_start();
require("../../database/connection.php");

if(!isset($_POST["location"]) || !isset($_POST["date"]) || !isset($_POST["startlocation"]) || !isset($_POST["endlocation"]) || !isset($_POST["distance"]) || !isset($_POST["meetingpoint"]) || !isset($_POST["meetingtime"]) || !isset($_POST["difficulty"])|| !isset($_POST["price"]))
{
    echo "fields not set";
    exit();
}

else
{ 
    /*to avoid SQL injection*/
    $location = addslashes($_POST["location"]);
    $startlocation = addslashes($_POST["startlocation"]);
    $endlocation = addslashes($_POST["endlocation"]);
    $distance = addslashes($_POST["distance"]);
    $meetingpoint = addslashes(($_POST["meetingpoint"]));
    $meetingtime = addslashes($_POST["meetingtime"]);
    $date = addslashes($_POST["date"]);
    $difficulty = addslashes($_POST["difficulty"]);
    $price = addslashes($_POST["price"]);

    /*query that searches for trails with matching location, and returns table*/
    $sql = "SELECT * FROM Trails a WHERE a.location=\"".$location."\"";
    $result=$connection->query($sql);

    if($result->num_rows > 0) /*if the query returns a non-empty result, then a trail already exists with that email*/
    {
        echo "Error: Trail already exists.";
    }

    /*Email doesn't exist*/
    else
    {
        $sql="INSERT INTO Trails(start_location, end_location, distance, difficulty, location)
                VALUES (\"".$startlocation."\", \"".$endlocation."\", \"".$distance."\", \"".$difficulty."\", \"".$location."\")"; //inserts into trail table
        $result=$connection->query($sql);

        $sql1 = "SELECT a.trail_id FROM Trails a WHERE a.location=\"".$location."\""; //to get the id of the inserted row
        $result1=$connection->query($sql1);
        $row1 = $result1->fetch_assoc();

        $sql="INSERT INTO Trips(trail_id, price, meeting_time, meeting_point, date, emp_id) 
                VALUES (\"".$row1["trail_id"]."\", \"".$price."\", \"".$meetingtime."\", \"".$meetingpoint."\", \"".$date."\", 0)";
        $result=$connection->query($sql);

        // if(isset($_POST["phone"]))
        // {
        //     $query = "SELECT c.customer_id FROM Customers c WHERE c.email = \"".$email."\"";
        //     $result2 = $connection->query($query);
        //     $row = $result2->fetch_assoc();

        //     $query2="INSERT INTO Contact_info(customer_id, email, phone_nb)
        //             VALUES(\"".$row["customer_id"]."\", \"".$email."\", \"". $_POST["phone"]."\")";
        //     $result3 = $connection->query($query2); 
        // }

        echo "Success!";
    }
    
}



?>