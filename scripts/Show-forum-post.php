<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;
  $forumid = isset($_REQUEST['forumid']) ? $_REQUEST['forumid'] : null;

  $postSQL = "SELECT *
              FROM nf_posts INNER JOIN nf_comments
              ON (nf_posts.postid = nf_comments.postid)
              WHERE nf_posts.postid = $postid ";

  $postResults = mysqli_query($conn, $postSQL) or die (mysqli_error($conn));

  $post = '';

  if (mysqli_num_rows($postResults) > 0){

      while ($row = mysqli_fetch_assoc($postResults)) {

          $postid = $row['postid'];
          $commentid = $row['commentid'];
          $postcontent = $row ['postcontent'];
          $commentcontent = $row['commentcontent'];



          $post.= <<<TABLE
              <tr>

                  <td class= wrapper>$commentcontent</td>

              </tr>
TABLE;
        }
      }
?>
