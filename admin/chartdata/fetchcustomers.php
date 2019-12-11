<?php
session_start();
require("../../database/connection.php");

/*query that searches for user with matching email, and returns table*/
$sql = "SELECT r.customer_id, COUNT(r.reservation_id) FROM Reservations r GROUP BY r.customer_id";
$result=$connection->query($sql);

if($result->num_rows > 0) /*if the query returns a non-empty result, then an employee already exists with that email*/
{
    $data = [];

    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }

    echo json_encode($data);
}

else
{
    echo "ERROR";
}
?>