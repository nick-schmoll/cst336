<?php
    // Start session
    session_start();

    // $_XXXXXX are objects provided by PHP
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $_POST will contain all values provided by 
        // inputs with name attributes
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // You would perform your login check here
        if ($username == $password) {
            $_SESSION["username"] = $username;
            
            // If I take no action, I will go right back to login
            // What do I want to do? Go to player
            header('Location: '. 'player.php');
            exit();
        }
        else {
            // Do nothing
            // Maybe i show an error?
        }
        
        // var_dump($_POST);
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div>
            <h1>Help</h1>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "Login Failed";
                //var_dump($_SERVER);
            }
            ?>
        </div>
        <!--If I don't specify an action, it will send to this page-->
        <!--If I don't specify a method, it will send to GET-->
        <!--method is and HTTP method-->
        <!--action is the page that will process the form-->
        <form method="POST" action="login.php">
            <div>
                <label>Username</label>
                <!--If there is no name attribute, the input does not go to the server-->
                <input type="text" name="username" value="<?php echo $username ?>"/>
            </div>
            <div>
                <label>Password</label>
                <!--If there is no name attribute, the input does not go to the server-->
                <input type="password" name="password"/>
            </div>
            <div>
                <input type="submit" name="submit" value="Login"/>
            </div>
        </form>
    </body>
</html>