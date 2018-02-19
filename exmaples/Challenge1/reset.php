<?php
    // Every page that has session needs this line.
    session_start();
    
    setcookie (session_id(), "", time() - 3600);
    session_destroy();
    
    header('Location: '. 'index.php');
?>
