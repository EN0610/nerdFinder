<?php
$conn = mysqli_connect('localhost', 'root', '', 'nerdFinder');
// if no connection then echo the errors onto the screen
if (!$conn) {
    echo ("<p>Connection failed:".mysqli_connect_error()."</p>\n");
}
// Remove special character errors
mysqli_set_charset($conn,"utf8");

$sql = "SELECT * 
            FROM nf_users INNER JOIN nf_userspecialisms 
            ON (nf_users.userid = nf_userspecialisms.userid)
            WHERE usertypeid = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Rate: ". $row["hourlyrate"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
    }
} else {
    echo "This isn't the Nerd you are looking for";
}

$conn->close();


