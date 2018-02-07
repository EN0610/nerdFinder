<?php
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');

//retrieving the the fields once the button named 'insert' is pressed
if(isset($_POST['insert']))
{
    //the variables to post
    $commentcontent = $_POST['commentcontent'];
    $posted = $_POST['posted'];


    //insert query to enter in the comment
    $query =   "INSERT INTO `nf_comments`(`postid`, `userid`, `commentcontent`, `posted`, `approved`)
                VALUES (7,8,'$commentcontent','$posted',0)";

                if (mysqli_query($conn, $query)) {
                  echo 'success';
                  } else {
                      echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }

}          mysqli_close($conn);

?>
