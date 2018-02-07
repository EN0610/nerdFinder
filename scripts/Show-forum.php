<?php
    /* CREATED BY DAL */

    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    $postSQL = "SELECT *
                FROM nf_posts INNER JOIN nf_forums
                ON (nf_posts.forumid = nf_forums.forumid)
                ORDER BY posttime DESC";

    $postResults = mysqli_query($conn, $postSQL) or die (mysqli_error($conn));

    $posts = '';

    if (mysqli_num_rows($postResults) > 0){
    // At least one row
        while ($row = mysqli_fetch_assoc($postResults)) {

            $postid = $row['postid'];
            $forumid = $row['forumid'];
            $postcontent = $row['postcontent'];
            $forumname = $row['forumname'];
            $posttime = $row['posttime'];

            $posts .= <<<POSTS

                <a href=forum-post.php?postid={$postid}&forumid={$forumid} class="wrapper">
                    <article class="soft-box soft-box--padded forum-post">
                        <h2 class="forum-post__content">{$postcontent}</h2>
                        <p>In topic: {$forumname}</p>
                    </article>
                </a>

POSTS;
        }
    }
?>
