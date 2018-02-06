<?php
	/* CREATED BY JACK */

    // connecting to the database
    $conn = mysqli_connect('localhost', 'root', '', 'NerdFinder');
    // if no connection then echo the errors onto the screen
    if (!$conn) {
        echo ("<p>Connection failed:".mysqli_connect_error()."</p>\n");
    }
    // Remove special character errors
    mysqli_set_charset($conn,"utf8");
