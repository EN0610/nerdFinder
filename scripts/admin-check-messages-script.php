<?php
    /* CREATED BY HARRY */

    // Setting the development enviroment to show errors
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    if(isset($_SESSION['admin-message-userid1']) && isset($_SESSION['admin-message-userid2'])){
        // Message info exists in SessionData
        $userid1 = $_SESSION['admin-message-userid1'];
        $userid2 = $_SESSION['admin-message-userid2'];
    } else{
        $userid1 = 7;
        $userid2 = 6;
    }
    /*----------------------------------------------------
    POPULATING THE DROP DOWNS
    ----------------------------------------------------*/
    $dropdownSQL = "SELECT userid, firstname, lastname, username FROM nf_users ORDER BY firstname";
    $dropdownSqlResults = mysqli_query($conn, $dropdownSQL) or die (mysqli_error($conn));
    $usersDropDown1 = '';
    $usersDropDown2 = '';

    if (mysqli_num_rows($dropdownSqlResults) > 0){
        // At least one user matches SQL query
        while ($row = mysqli_fetch_assoc($dropdownSqlResults)) {
            
            $userid = $row['userid'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            // Check if current user is the message sender shown, if it is show dropdown option as selected
            if ($userid == $userid1) {
                // Current iteration matches the userid of messages shown
                $usersDropDown1 .= "<option value='$userid' selected>$firstname $lastname ($username)</option>";
            } else{
                // Current iteration is a different user for the messages shown
                $usersDropDown1 .= "<option value='$userid'>$firstname $lastname ($username)</option>";
            }
            // Check if current user is the message reciever shown, if it is show dropdown option as selected
            if ($userid == $userid2) {
                // Current iteration matches the userid of messages shown
                $usersDropDown2 .= "<option value='$userid' selected>$firstname $lastname ($username)</option>";
            } else{
                // Current iteration is a different user for the messages shown
                $usersDropDown2 .= "<option value='$userid'>$firstname $lastname ($username)</option>";
            }
        }
    } else{
        // SQL returned no rows (No users in database)
        $pageContent = '<h2 class="light-grey-text">No users in database</h2>';
    }
    /*----------------------------------------------------
    DISPLAYING MESSAGES
    ----------------------------------------------------*/
    if ($userid1 == $userid2) {
        // Sender and reciever are the same user
        $pageContent = '<h2>Sender a reciever are same user</h2>';
    }
    // SQL for showing any messages from users
    $messagesSQL = "SELECT messagecontent, messagesent, firstname, lastname, username, senderid, recieverid
                    FROM nf_messages INNER JOIN nf_users ON (nf_messages.senderid = nf_users.userid)
                    WHERE senderid = $userid1 AND recieverid = $userid2 OR senderid = $userid2 AND recieverid = $userid1
                    ORDER BY messagesent";
    
    $messagesdropdownSQLResults = mysqli_query($conn, $messagesSQL) or die (mysqli_error($conn));
    
    if (mysqli_num_rows($messagesdropdownSQLResults) > 0){

        $pageContent = '';

        while ($row = mysqli_fetch_assoc($messagesdropdownSQLResults)) {
            // 
            $messagecontent = $row['messagecontent'];
            $recieverid = $row['recieverid'];
            $senderid = $row['senderid'];

            if ($userid1 == $senderid) {
                // User 1 is sender
                $pageContent .= '<p class="user-message user-message__sent">' . $messagecontent . '</p>';

            } else if ($userid1 == $recieverid) {
                // User 2 is sender
                $pageContent .= '<p class="user-message user-message__recieved">' . $messagecontent . '</p>';
            }
        }
    } else{
        // Users selected have not messaged each other before
        $pageContent = '<h2 class="light-grey-text">No messages between selected users</h2>';
    }
?>