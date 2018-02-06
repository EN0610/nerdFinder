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

    /*--------------------------
    CONVERSATIONS
    --------------------------*/

    $userid1 = $_SESSION['userid'];

    if (isset($_SESSION['message-userid2'])) {
        $userid2 = $_SESSION['message-userid2'];
    } else{
        $userid2 = 6;
    }
    
    $conversations = '';

    $conversationsSql = "SELECT *
                         FROM nf_messages INNER JOIN nf_users
                         ON (nf_messages.recieverid = nf_users.userid)
                         WHERE recieverid = $userid1 OR senderid = $userid1
                         GROUP BY recieverid, senderid
                         ORDER BY messagesent DESC";

    $conversationsSqlResults = mysqli_query($conn, $conversationsSql) or die (mysqli_error($conn));

    if (mysqli_num_rows($conversationsSqlResults) > 0){
        // 
        while ($row = mysqli_fetch_assoc($conversationsSqlResults)) {
            // 
            $senderid = $row['senderid'];
            $recieverid = $row['recieverid'];
            $profilepic = $row['profilepic'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $messagecontent = $row['messagecontent'];

            if ($recieverid == $userid2){
                $background = 'side-panel__conversation--current';
            } else{
                $background = '';
            }
            
            if ($recieverid != $userid1) {

                $conversations .= <<<CONVERSATION

                <a href="scripts/change-conversation.php?userid2=$recieverid" class="conversation">
                    <article class="side-panel__conversation $background">
                        <img class="side-panel__conversation-picture" src="img/profile-pics/$profilepic" alt="Conversation User Profile Picture">
                        <h2 class="side-panel__conversation-user-name">$firstname $lastname</h2>
                        <p class="side-panel__conversation-preview">$messagecontent</p>
                        <div class="clearfix"></div>
                    </article>
                </a>
CONVERSATION;
            }
        }
    } else{
        $conversations = '<h2 class="side-panel__conversation-user-name no-messages">No conversations</h2>';
    }
    /*--------------------------
    MESSAGES
    --------------------------*/
    $messagesSQL = "SELECT *
                    FROM nf_messages INNER JOIN nf_users ON (nf_messages.senderid = nf_users.userid)
                    WHERE senderid = $userid1 AND recieverid = $userid2 OR senderid = $userid2 AND recieverid = $userid1
                    ORDER BY messagesent";

    $messagesSQLResults = mysqli_query($conn, $messagesSQL) or die (mysqli_error($conn));

    $messages = '<h2 class="grey-text--light center-text">End of conversation history</h2>';

    if (mysqli_num_rows($messagesSQLResults) > 0){
        // 
        while ($row = mysqli_fetch_assoc($messagesSQLResults)) {
            // 
            $messagecontent = $row['messagecontent'];
            $recieverid = $row['recieverid'];
            $senderid = $row['senderid'];

            if ($userid1 == $senderid) {
                // User 1 is sender
                $messages .= '<p class="user-message user-message__sent">' . $messagecontent . '</p>';

            } else if ($userid1 == $recieverid) {
                // User 2 is sender
                $messages .= '<p class="user-message user-message__recieved">' . $messagecontent . '</p>';
            }
        }
    } else{
        //
        $messages = '<h2 class="grey-text--light center-text">No messages</h2>';
    }
    /*--------------------------
    NEW CONVERSATION / MESSAGE
    --------------------------*/
    $userDropdownSQL = "SELECT userid, firstname, lastname, username FROM nf_users ORDER BY firstname";
    $userDropdownSQLResults = mysqli_query($conn, $userDropdownSQL) or die (mysqli_error($conn));
    $usersDropDown = '';

    if (mysqli_num_rows($userDropdownSQLResults) > 0){
        // At least one row
        while ($row = mysqli_fetch_assoc($userDropdownSQLResults)) {
            //
            $userid = $row['userid'];
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];

            $usersDropDown .= "<option value='$userid'>$firstname $lastname ($username)</option>";            
        }
    }

    mysqli_close($conn);