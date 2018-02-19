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
        <title>Player</title>
    </head>
    <body>
        <div>
            <a href="nowPlaying.php">Now Playing</a>
        </div>
        <div>
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <ul>
                <li>Playlist 1</li>
                <li>Playlist 2</li>
            </ul>
        </div>
    </body>
</html>