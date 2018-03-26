<?php
    session_start();
    
        $sort;
    function showTable(){
        global $sort;
        global $button;
        
        $connUrl = getenv('JAWSDB_MARIA_URL');
        //$connUrl = "mysql://et5b1stvqztwx4zt:iu9s61yehpdjbaft@bfjrxdpxrza9qllq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/xtmoqy928kg85di4";
        $hasConnUrl = !empty($connUrl);
        
        $connParts = null;
        if ($hasConnUrl) {
            $connParts = parse_url($connUrl);
        }
        
        //var_dump($hasConnUrl);
        $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
        $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'project_1';
        $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
        $password = $hasConnUrl ? $connParts['pass'] : 'Lalaland1!';
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         
        // $dbHost = '127.0.0.1';
        // $dbPort = 3306;
        // $dbName = 'lab4';
        // $username = 'nickschmoll';
        // $password = 'Lalaland1!';
        
        // $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        // $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $sql = //"SELECT `deviceName`, `deviceType`, `price`, `status` 
                //FROM `device` 
                
                "SELECT `food`.`foodType`,`food`.`foodName`,`food`.`price`,`food`.`foodId`,`food`.`status`,`food`.* FROM food
                ORDER BY `foodName` ASC";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        
        
        
        echo '<div class="container" style="centered" >';
        //if the increasing alphabetically is selected
        if ($sort == "inc" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status`
                    FROM `food` 
                    ORDER BY `foodName` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            echo "<form method='post' action='cart.php'>";
            while ($row = $stmt -> fetch())  {
                
                // echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
                 echo  '<tr>' . '<td><input type="checkbox" name="items[]" value = "' . $row['foodName'] . "  " .  $row['price'] . '"  />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';

                
            }
            echo "<input type='submit' value='add to Cart' />";
            echo "</form>";
            echo '</table>';
        }
        else if($sort == "dec" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status`
                    FROM `food` 
                    ORDER BY `foodName` DESC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            echo "<form>";
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo "</form>";
            echo '</table>';
        }
        else if($sort == "avail" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status` 
                    FROM `food` 
                    ORDER BY `foodName` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            echo "<form>";
            while ($row = $stmt -> fetch())  {
                if($row['status'] == "Available") {
                    echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
                }
                echo "</form>";
                }
            echo '</table>';
        }
        else if($sort == "type1" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status` 
                    FROM `food` 
                    ORDER BY `foodType` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            echo "<form>";
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo "</form>";
            echo '</table>';
        }
        else if($sort == "type2" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status` 
                    FROM `food` 
                    ORDER BY `foodType` DESC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            
            // form here
            echo "<form>";
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo "</form>";
            echo '</table>';
        }
        else if($sort == "price1" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status` 
                    FROM `food` 
                    ORDER BY `price` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            echo "<form>";
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo "</form>";
            echo '</table>';
        }
        else if($sort == "price2" and $button == true) {
            $sql = "SELECT `foodName`, `foodType`, `price`, `status` 
                    FROM `food` 
                    ORDER BY `price` DESC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            echo "<form>";
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td><input type="checkbox" name="items[]" />' . $row['foodName'] . "</td>" . " " . '<td>' . $row['foodType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo "</form>";
            echo '</table>';
        }
        echo '</div>';
    }
?>