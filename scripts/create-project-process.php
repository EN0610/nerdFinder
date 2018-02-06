<?php
require_once('database-connection.php');	  // make db connection
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $specialismid = $_POST['projectspecialistarea'];
// $projectname = $_POST['projectname'];
// $projectdescription = $_POST['projectdescription'];
// $budget = $_POST['projectbudget'];
// $posted = date('Y/m/d');
// $deadline = $_POST['projectdeadline'];
// $inspirationimg1 = $_POST['inspirationimg1'];
// $inspirationimg2 = $_POST['inspirationimg2'];
// $inspirationimg3 = $_POST['inspirationimg3'];

/*----------------------------------------------------
RETRIVING AND VALIDATING SIGN IN DATA
----------------------------------------------------*/

// Retriving data from form fields
$specialismid = isset($_REQUEST['projectspecialistarea']) ? $_REQUEST['projectspecialistarea'] : null;
$projectname = isset($_REQUEST['projectname']) ? $_REQUEST['projectname'] : null;
$projectdescription = isset($_REQUEST['projectdescription']) ? $_REQUEST['projectdescription'] : null;
$budget = isset($_REQUEST['projectbudget']) ? $_REQUEST['projectbudget'] : null;
$posted = date('Y/m/d');
$deadline = isset($_REQUEST['projectdeadline']) ? $_REQUEST['projectdeadline'] : null;
$inspirationimg1 = isset($_REQUEST['inspirationimg1']) ? $_REQUEST['inspirationimg1'] : null;
$inspirationimg2 = isset($_REQUEST['inspirationimg2']) ? $_REQUEST['inspirationimg2'] : null;
$inspirationimg3 = isset($_REQUEST['inspirationimg3']) ? $_REQUEST['inspirationimg3'] : null;
// Sanitising data but not encoding quotes
$specialismid = filter_var($specialismid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$projectname = filter_var($projectname, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$projectdescription = filter_var($projectdescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$budget = filter_var($budget, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$posted = date('Y/m/d');
$deadline = filter_var($deadline, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$inspirationimg1 = filter_var($inspirationimg1, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$inspirationimg2 = filter_var($inspirationimg2, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$inspirationimg3 = filter_var($inspirationimg3, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
// Escaping <,>,& and all ASCII characters with a value below 32
$specialismid = filter_var($specialismid, FILTER_SANITIZE_SPECIAL_CHARS);
$projectname = filter_var($projectname, FILTER_SANITIZE_SPECIAL_CHARS);
$projectdescription = filter_var($projectdescription, FILTER_SANITIZE_SPECIAL_CHARS);
$budget = filter_var($budget, FILTER_SANITIZE_SPECIAL_CHARS);
$posted = date('Y/m/d');
$deadline = filter_var($deadline, FILTER_SANITIZE_SPECIAL_CHARS);
$inspirationimg1 = filter_var($inspirationimg1, FILTER_SANITIZE_SPECIAL_CHARS);
$inspirationimg2 = filter_var($inspirationimg2, FILTER_SANITIZE_SPECIAL_CHARS);
$inspirationimg3 = filter_var($inspirationimg3, FILTER_SANITIZE_SPECIAL_CHARS);
// Trimming data to remove and white/ empty space
$specialismid = trim($specialismid);
$projectname = trim($projectname);
$projectdescription = trim($projectdescription);
$budget = trim($budget);
$posted = date('Y/m/d');
$deadline = trim($deadline);
$inspirationimg1 = trim($inspirationimg1);
$inspirationimg2 = trim($inspirationimg2);
$inspirationimg3 = trim($inspirationimg3);
// Any data left by this point will not be harmful to the database

$sql = "INSERT INTO nf_projects (projectid, clientid, nerdid, specialismid, projectname, projectdescription, budget, posted, deadline, approved, finished, inspirationimg1, inspirationimg2, inspirationimg3)
VALUES (null, '3', null, '$specialismid', '$projectname', '$projectdescription', '$budget', '$posted', '$deadline', '0', '0', '$inspirationimg1', '$inspirationimg2', '$inspirationimg3')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); // Closing Connection with Server
?>
