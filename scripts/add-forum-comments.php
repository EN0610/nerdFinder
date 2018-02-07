<?php
// Defining path to session data folder where all session data will be saved/found
require_once('session-save-path.php');
// Resuming current session
session_start();
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');

$postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;



date_default_timezone_set('Europe/London');
$currentTime = date('Y-m-d');

$userid = $_SESSION['userid'];


//retrieving the the fields once the button named 'insert' is pressed
if(isset($_POST['insert']))
{
    //the variables to post
    $commentcontent = $_POST['commentcontent'];


    //insert query to enter in the comment
    $query =   "INSERT INTO nf_comments (postid, userid, commentcontent, posted, approved)
                VALUES ($postid, $userid,'$commentcontent',$currentTime,0)";

                if (mysqli_query($conn, $query)) {
                  header('Location: ' . $_SERVER['HTTP_REFERER']);
                  } else {
                      echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }

}          mysqli_close($conn);

?>
