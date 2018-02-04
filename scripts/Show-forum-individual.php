<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  include('database-connection.php');

  $forumid = isset($_REQUEST['forumid']) ? $_REQUEST['forumid'] : null;
  $postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;


  $postSQL = "SELECT *
              FROM nf_posts INNER JOIN nf_comments
              ON (nf_posts.postid = nf_comments.postid)
              WHERE nf_posts.postid = $postid ";

  $postResults = mysqli_query($conn, $postSQL) or die (mysqli_error($conn));

  $post = '';

  if (mysqli_num_rows($postResults) > 0){
      // At least one row of technical issues
      while ($row = mysqli_fetch_assoc($postResults)) {

          $postcontent = $row ['postcontent'];
          $postid = $row['postid'];
          $commentid = $row['commentid'];
          $commentcontent = $row['commentcontent'];



          $post .= <<<TABLE
              <tr>
                  <td>$postcontent</td>
                  <br><br><br><br>

                  <td>$commentcontent</td>

              </tr>
TABLE;
        }
      }


?>
