<?php

session_start();

echo "Your items: . <br/>";
$cart = $_POST['items'];
for($i=0; $i < count($cart); $i++){
    echo $cart[$i] .  "<br/>";
}
var_dump ($cart);
?>