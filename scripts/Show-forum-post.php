<?php
  // Setting the development enviroment to show errors
  require_once('set-environment.php');
  // Connecting to the Database
  require_once('database-connection.php');

  $postid = isset($_REQUEST['postid']) ? $_REQUEST['postid'] : null;
  $forumid = isset($_REQUEST['forumid']) ? $_REQUEST['forumid'] : null;
  $postid = filter_var($postid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $forumid = filter_var($forumid, FILTER_SANITIZE_SPECIAL_CHARS);
  $postid = filter_var($postid);
  $forumid = filter_var($forumid);

  $postSQL = "SELECT *
              FROM nf_posts LEFT JOIN nf_comments
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


          $post.= <<<CONTENT

                      <article class= forum-soft-box>
                        <p class= wrapper>$commentcontent</p>
                      </article>


CONTENT;
        }
      }
?>
