<?php
// Setting the development enviroment to show errors
require_once('set-environment.php');
// Connecting to the Database
include('database-connection.php');
// php code to Insert data into mysql database from input text
$postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;
$forumid = isset($_REQUEST['forumid']) ? $_REQUEST['forumid'] : null;
$postid = filter_var($postid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$forumid = filter_var($forumid, FILTER_SANITIZE_SPECIAL_CHARS);
$postid = filter_var($postid);
$forumid = filter_var($forumid);
}
if(isset($_POST['insert']))
{

    $postcontent = $_POST['postcontent'];
    $posttime = $_POST['posttime'];
    $forumid = $_POST{'forumid'};
    $postid = $_POST{'postid'};
    $userid = $_POST{'userid'};



    $query =   "INSERT INTO `nf_posts`(`postid`, `userid`, `commentcontent`, `posted`, `approved`)
      VALUES (7,8,'$commentcontent','$posted',0)";

    if (mysqli_query($conn, $query)) {
          ;
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
}

?>
