<?php
require_once('database-connection.php');

$sql = "SELECT * 
            FROM nf_users 
            WHERE usertypeid = 2";

$result = $conn->query($sql);

$nerds = "";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $nerds .= "<br> Rate: ". $row["hourlyrate"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";

    }
} else {
    echo "This isn't the Nerd you are looking for";
}

$conn->close();


