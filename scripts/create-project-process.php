<?php
require_once('database-connection.php');	  // make db connection
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$specialismid = $_POST['projectspecialistarea'];
$projectname = $_POST['projectname'];
$projectdescription = $_POST['projectdescription'];
$budget = $_POST['projectbudget'];
$posted = date('Y/m/d');
$deadline = $_POST['projectdeadline'];
$inspirationimg1 = $_POST['inspirationimg1'];
$inspirationimg2 = $_POST['inspirationimg2'];
$inspirationimg3 = $_POST['inspirationimg3'];

$sql = "INSERT INTO nf_projects (projectid, clientid, nerdid, specialismid, projectname, projectdescription, budget, posted, deadline, approved, finished, inspirationimg1, inspirationimg2, inspirationimg3)
VALUES (null, '3', null, '$specialismid', '$projectname', '$projectdescription', '$budget', '$posted', '$deadline', '0', '0', '$inspirationimg1', '$inspirationimg2', '$inspirationimg3')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); // Closing Connection with Server
?>
