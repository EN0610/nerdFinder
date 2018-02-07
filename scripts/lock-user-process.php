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
    if (isset($_POST['delete'])) {
        
        $deleteSql = "DELETE FROM nf_users
                      WHERE userid = $userid";

        $deleteSqlResults = mysqli_query($conn, $deleteSql) or die (mysqli_error($conn));

        if ($deleteSqlResults){
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

    } else if (isset($_POST['lock'])) {
        
        $lockCheck = "SELECT locked
                      FROM nf_users
                      WHERE userid = $userid";

        $lockCheckResult = mysqli_query($conn, $lockCheck) or die (mysqli_error($conn));

        if (mysqli_num_rows($lockCheckResult) > 0){

            while ($row = mysqli_fetch_assoc($lockCheckResult)) {

                $locked = $row['locked'];

                if ($locked == 1) {
                    // User already locked
                    $_SESSION['admin-feedback'] = 2;
                    // 
                    $_SESSION['feedback-message'] = 'User already locked';

                } else{
                    // User not locked
                    $sql = "UPDATE nf_users
                            SET locked = 1 
                            WHERE userid = $userid";
                    // Applying the SQL query to the database
                    $sqlResults = mysqli_query($conn, $sql) or die (mysqli_error($conn));
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

    mysqli_close($conn);
    // Sending user back to the admin dashboard
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>