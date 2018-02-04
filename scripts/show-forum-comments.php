<?php
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');
// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{

    $commentcontent = $_POST['commentcontent'];
    $posted = $_POST['posted'];


    $query =   "INSERT INTO `nf_comments`(`postid`, `userid`, `commentcontent`, `posted`, `approved`)
      VALUES (7,8,'$commentcontent','$posted',0)";

    if (mysqli_query($conn, $query)) {
          header("Refresh:0; ");
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
}

?>
