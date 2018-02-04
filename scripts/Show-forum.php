
<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $postSQL = "SELECT * FROM nf_forums ORDER BY forumid";
  $postResults = mysqli_query($conn, $postSQL) or die (mysqli_error($conn));

  $posts = '';

  if (mysqli_num_rows($postResults) > 0){
      // At least one row of technical issues
      while ($row = mysqli_fetch_assoc($postResults)) {


          $forumid = $row['forumid'];
          $forumname = $row['forumname'];


          $post.= <<<TABLE
              <tr>
                  <td></td>
                  <td><a href=forum-post.php?forumid={$forumid} class="wrapper">{$forumname}</td>


              </tr>
TABLE;
        }
      }
?>
