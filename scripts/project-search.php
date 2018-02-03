<?php
require_once('database-connection.php');

$sql = "SELECT * 
            FROM nf_projects
            WHERE approved = 0";

$result = $conn->query($sql);

$projects = "";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $projects .= "<br> Project: ". $row["projectname"]. " - What & When: ". $row["projectdescription"]. " " . $row["posted"] . "<br>";

    }
} else {
    echo "Currently no projects on!";
}

$conn->close();