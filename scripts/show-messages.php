<?php   
    // Defining path to session data folder where all session data will be saved/found
    require_once('scripts/session-save-path.php');
    // Resuming current session
    session_start();
    // Showing error reporting
    require_once('set-environment.php');
    // Connecting to the Database
    require_once('database-connection.php');

    $userid = $_SESSION['userid'];
    $conversations = '';

    $conversationsSql = "SELECT *
                         FROM nf_messages INNER JOIN nf_users
                         ON (nf_messages.recieverid = nf_users.userid)
                         WHERE recieverid = $userid
                         ORDER BY messagesent";

    $conversationsSqlResults = mysqli_query($conn, $conversationsSql) or die (mysqli_error($conn));

    if (mysqli_num_rows($conversationsSqlResults) > 0){
        //
        while ($row = mysqli_fetch_assoc($conversationsSqlResults)) {
            // 
            $senderid = $row['senderid'];
            $profilepic = $row['profilepic'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $messagecontent = $row['messagecontent'];

            $conversations .= <<<CONVERSATION

            <article class="side-panel__conversation">
                <img class="side-panel__conversation-picture" src="img/profile-pics/$profilepic" alt="Conversation User Profile Picture">
                <h2 class="side-panel__conversation-user-name">$firstname $lastname</h2>
                <p class="side-panel__conversation-preview">$messagecontent</p>
                <div class="clearfix"></div>
            </article>

CONVERSATION;

        }
    } else{
        $conversations = '<h2 class="side-panel__conversation-user-name no-messages">Your have no messages</h2>';
    }

?>