<?php
    /* CREATED BY HARRY */
    
    // Defining path to session data folder where all session data will be saved/found
    require_once('session-save-path.php');
    // Resuming current session
    session_start();
    // Showing error reporting
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');
    // Getting the Id of the user chosen from the request stream
    $userid = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
    // Validation
    $userid = filter_var($userid, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $userid = filter_var($userid, FILTER_SANITIZE_SPECIAL_CHARS);
    $userid = trim($userid);
    //
    if(isset($_POST["lock"])) {
        //
        $lockCheckSql = "SELECT locked
                    FROM nf_users
                    WHERE userid = $userid";

        $lockCheckSqlResult = mysqli_query($conn, $lockCheckSql) or die (mysqli_error($conn));

        if (mysqli_num_rows($lockCheckSqlResult) > 0){

            while ($row = mysqli_fetch_assoc($lockCheckSqlResult)) {

                $locked = $row['locked'];

                if ($locked == 1) {
                    // User already locked
                    $_SESSION['admin-feedback'] = 2;
                    // 
                    $_SESSION['feedback-message'] = 'User already locked';

                } else{
                    // User not locked (LOCK USER)
                    $lockSql = "UPDATE nf_users
                    SET locked = 1 
                    WHERE userid = $userid";
                    // Applying the SQL query to the database
                    mysqli_query($conn, $lockSql) or die (mysqli_error($conn));

                    //
                    date_default_timezone_set('Europe/London');
                    $messageSent = date('Y-m-d H:i:s');

                    $messageUserSql = "INSERT INTO nf_messages (senderid, recieverid, opened, messagecontent, messagesent)
                                       VALUES (13, $userid, 0, 'Your account has been locked due to inappropriate activity. Email admin@nerdfinder.com to appeal this action.', '$messageSent')";

                    mysqli_query($conn, $messageUserSql) or die (mysqli_error($conn));
                    // Changing the session variable of admin-feedback to approved
                    $_SESSION['admin-feedback'] = 1;
                    //
                    $_SESSION['feedback-message'] = 'User locked';
                }
            }
        } else{
            $_SESSION['admin-feedback'] = 2;
            // 
            $_SESSION['feedback-message'] = 'User not locked, system error';
        }
    }
    if(isset($_POST["delete"])) {
        //
        $deleteSql = "DELETE FROM
                      nf_users
                      WHERE userid = $userid";

        $deleteSqlResult = mysqli_query($conn, $deleteSql) or die (mysqli_error($conn));

        if ($deleteSqlResult){

            // Changing the session variable of admin-feedback to approved
            $_SESSION['admin-feedback'] = 1;
            //
            $_SESSION['feedback-message'] = 'User deleted';

        } else{
            // Changing the session variable of admin-feedback to approved
            $_SESSION['admin-feedback'] = 2;
            //
            $_SESSION['feedback-message'] = 'User not deleted, system error';
        }
    }

    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>