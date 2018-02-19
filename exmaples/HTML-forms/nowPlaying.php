<?php
    // Every page that has session needs this line.
    session_start();
    
    if (empty($_SESSION["username"])) {
        header('Location: '. 'login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Now Playing</title>
    </head>
    <body>
        <div>
            Playlist 1 is now playing
        </div>
    </body>
</html>