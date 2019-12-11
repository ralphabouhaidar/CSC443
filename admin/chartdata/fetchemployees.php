<?php
session_start();
require("../../database/connection.php");

/*query that searches for user with matching email, and returns table*/
$sql = "SELECT e.emp_first, e.emp_last, e.Salaries FROM Employees e";
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