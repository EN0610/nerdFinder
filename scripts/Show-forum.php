
<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');


  $postSQL = "SELECT *
              FROM nf_posts INNER JOIN nf_forums
              ON (nf_posts.forumid = nf_forums.forumid) ";



  $postResults = mysqli_query($conn, $postSQL) or die (mysqli_error($conn));

  $posts = '';

  if (mysqli_num_rows($postResults) > 0){
      // At least one row of technical issues
      while ($row = mysqli_fetch_assoc($postResults)) {


          $postid = $row['postid'];
          $forumid = $row['forumid'];
          $postcontent = $row['postcontent'];
          $forumname = $row['forumname'];



          $posts.= <<<TABLE
              <tr>
                  <td></td>
                  <td><a href=forum-post.php?postid={$postid}&forumid={$forumid} class="wrapper">{$postcontent}</td>
                  <td>{$forumname}</td>


              </tr>
TABLE;
        }
      }
?>
