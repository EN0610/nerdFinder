<?php

    /*----------------------------------------------------
    VALIDATING DROP DOWN OPTIONS
    ----------------------------------------------------*/

    // Retriving data from form fields
    $userid1 = isset($_REQUEST['userid1']) ? $_REQUEST['userid1'] : null;
    $userid2 = isset($_REQUEST['userid2']) ? $_REQUEST['userid2'] : null;
    // Sanitising data but not encoding quotes
    $userid1 = filter_var($userid1, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid2 = filter_var($userid2, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    // Escaping <,>,& and all ASCII characters with a value below 32
    $userid1 = filter_var($userid1, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid2 = filter_var($userid2, FILTER_SANITIZE_SPECIAL_CHARS);
    // Trimming data to remove and white/ empty space
    $userid1 = trim($userid1);
    $userid2 = trim($userid2);

    $_SESSION['admin-message-userid1'] = $userid1;
    $_SESSION['admin-message-userid2'] = $userid2;

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>