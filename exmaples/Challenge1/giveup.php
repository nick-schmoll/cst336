<?php
    // Every page that has session needs this line.
    session_start();
    
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $_POST will contain all values provided by 
        // inputs with name attributes
        $randnumber1 = $_POST["randnumber1"];
        $randnumber2 = $_POST["randnumber2"];
        
        echo "The numbers were: /n $randnumber1 and $randnumber2";
    }
    
    setcookie (session_id(), "", time() - 3600);
    session_destroy();
    
    header('Location: '. 'index.php');
?>
