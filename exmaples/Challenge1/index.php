<?php

    session_start(); 
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $_POST will contain all values provided by 
        // inputs with name attributes
        $guess1 = $_POST["guess1"];
        $guess2 = $_POST["guess2"];
    
        if(!isset($_POST["entered1"])){
            $_SESSION["tries"] = 0; //initializing tries
            $_SESSION["randnumber1"] =  mt_rand(1,10);
            $_SESSION["randnumber2"] =  mt_rand(1,10);
        }
        else if($_POST["guess1"] < $_SESSION["randnumber"]
                && $_POST["guess2"] < $_SESSION["randnumber"])
        {
             // guess1 < rand1 and guess2 < rand2
             $message1 = "the first number should be higher";
             $message2 = "the second number should be higher";
             $_SESSION["tries"]++;
             
        }
        else if($_POST["guess1"] < $_SESSION["randnumber"]
                && $_POST["guess2"] > $_SESSION["randnumber"])
        {
             // guess1 < rand1 and guess2 > rand2
              $message1 = "the first number should be higher";
             $message2 = "the second number should be lower";
             $_SESSION["tries"]++;
             
        }
        else if($_POST["guess1"] > $_SESSION["randnumber"]
                && $_POST["guess2"] < $_SESSION["randnumber"])
        {
             // guess1 > rand1 and guess2 < rand2
             $message1 = "the first number should be lower";
             $message2 = "the second number should be higher";
             $_SESSION["tries"]++;
             
        }
        else if($_POST["guess1"] > $_SESSION["randnumber"]
                && $_POST["guess2"] > $_SESSION["randnumber"])
        {
             // guess1 > rand1 and guess2 > rand2
             $message1 = "the first number should be lower";
             $message2 = "the second number should be lower";
             $_SESSION["tries"]++;
             
        }
        else if($_POST["guess1"] == $_SESSION["randnumber"]
                && $_POST["guess2"] > $_SESSION["randnumber"])
        {
             // guess1 = rand1 and guess2 > rand2
             $message1 = "You've guessed the first number!";
             $message2 = "the second number should be lower";
             $_SESSION["tries"]++;
             
        }
         else if($_POST["guess1"] == $_SESSION["randnumber"]
                && $_POST["guess2"] < $_SESSION["randnumber"])
        {
             // guess1 = rand1 and guess2 < rand2
             $message1 = "You've guessed the first number!";
             $message2 = "the second number should be higher";
             $_SESSION["tries"]++;
             
        }
        else if($_POST["guess1"] < $_SESSION["randnumber"]
                && $_POST["guess2"] == $_SESSION["randnumber"])
        {
             // guess1 < rand1 and guess2 == rand2
             $message1 = "the first number should be higher";
             $message2 = "You've guessed the second number!";
             $_SESSION["tries"]++;
             
        }
         else if($_POST["guess1"] > $_SESSION["randnumber"]
                && $_POST["guess2"] == $_SESSION["randnumber"])
        {
             // guess1 > rand1 and guess2 == rand2
             $message1 = "the first number should be lower";
             $message2 = "You've guessed the second number!";
             $_SESSION["tries"]++;
             
        }
        else if($_POST["guess1"] == $_SESSION["randnumber"]
                && $_POST["guess2"] == $_SESSION["randnumber"])
        {
             // guess1 == rand1 and guess2 == rand2
             $message1 = "You've guessed the first number!";
             $message2 = "You've guessed the second number!";
             $_SESSION["tries"]++;
             
        }
        
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    }
    



    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Guess the Numbers </title>
    </head>
    <body>
        <blockquote>
            <h1> Guess the Numbers</h1>
            <h3> Guess two numbers between 1 and 10.</h3>
            <form method= "POST" action="">
                <div>
                    <label>number1: </label>
                    <input type="text" name = "number1"/>
                </div>
                <div>
                    <label>number2: </label>
                    <input type= "text" name = "number2"/>
                </div>
                <div>
                      <input type="submit" name="Guess numbers" value="guessForm"/>
                </div>
            </form>
            <form method= "POST" action="giveup.php">
                <div>
                      <input type="submit" name="Give Up" value="giveUp"/>
                </div>
                <div>
                      <input type="submit" name="Reset" value="reset"/>
                </div>
            </form>
           
           
            <!--<form input= >-->
            <!--    "-->
                
            <!--            number 1: "-->
            <!--    <input type="text" name="number1">-->
            <!--    <br>-->
            <!--     "-->
                
            <!--            number 2: "-->
            <!--    <input type="text" name="number2">-->
            <!--    <br>-->
            <!--    <br>-->
            <!--    <input type="submit" value= "Guess numbers" name="guessForm">-->
            <!--    <br>-->
            <!--    <br>-->
            <!--    <input type= "submit" value= "Give Up" name= "giveUp">-->
            <!--    // this should be like logout-->
            <!--    <input type= "submit" value= "Reset" name= "reset">-->
            <!--</form>-->
            
            
        </blockquote>
        
        <div>
         
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               echo "$message1 /n ";
               echo "$message2 /n ";
                //var_dump($_SERVER);
            }
            ?>
        </div>
    </body>
</html>