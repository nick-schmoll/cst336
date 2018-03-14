<?php
    
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
        $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'lab4';
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
                
                "SELECT `device`.`deviceType`,`device`.`deviceName`,`device`.`price`,`device`.`deviceId`,`device`.`status`,`device`.* FROM device
                ORDER BY `deviceName` ASC";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
            
        echo '<div class="container" style="centered" >';
        //if the increasing alphabetically is selected
        if ($sort == "inc" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `deviceName` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo '</table>';
        }
        else if($sort == "dec" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `deviceName` DESC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo '</table>';
        }
        else if($sort == "avail" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `deviceName` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                if($row['status'] == "Available") {
                    echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            
                }
                }
            echo '</table>';
        }
        else if($sort == "type1" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `deviceType` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo '</table>';
        }
        else if($sort == "type2" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `deviceType` DESC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo '</table>';
        }
        else if($sort == "price1" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `price` ASC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo '</table>';
        }
        else if($sort == "price2" and $button == true) {
            $sql = "SELECT `deviceName`, `deviceType`, `price`, `status` 
                    FROM `device` 
                    ORDER BY `price` DESC
                    LIMIT 0, 50 ";
        
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo '<table style="centered">';
            while ($row = $stmt -> fetch())  {
                echo  '<tr>' . '<td>' . $row['deviceName'] . "</td>" . " " . '<td>' . $row['deviceType'] . '</td>'  . " " . '<td>' . $row['price'] . '</td>'  . " " . '<td>' .  $row['status'] . '</td>'  . '</tr>';
            }
            echo '</table>';
        }
        echo '</div>';
    }
?>
