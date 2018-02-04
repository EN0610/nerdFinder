<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $forumid = isset($_REQUEST['forumid']) ? $_REQUEST['forumid'] : null;

  $postSQL = "SELECT * FROM nf_posts  WHERE forumid = '$forumid'";
  $postResults = mysqli_query($conn, $postSQL) or die (mysqli_error($conn));

  $posts = '';

  if (mysqli_num_rows($postResults) > 0){
      // At least one row of technical issues
      while ($row = mysqli_fetch_assoc($postResults)) {

          $forumid = $row['forumid'];
          $postid = $row['postid'];
          $postcontent = $row['postcontent'];
          $posttime = $row['posttime'];


          $post.= <<<TABLE
              <tr>
                  <td></td>
                  <td><a href=Forum-post-individual.php?forumid={$forumid}&postid={$postid}>{$postcontent}</td>
                  <td>$posttime.</td>

              </tr>
TABLE;
        }
      }
?>
