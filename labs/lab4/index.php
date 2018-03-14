<?php
    include 'functions.php';
?>

<?php
    if (isset($_POST["sort"])) {
        $sort = $_POST["sort"];
        $button = $_POST["submit"];
    }
    if (!$_POST["sort"]) {
        $error = "There is an error.";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4 </title>
        <link href="/labs/lab4/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
       <main>
        <h1> Tech Checkout </h1>
   
          <form method="post">
          	  Sort by: 
          	   <select name="sort">
          	   	  <option value="inc" selected> Name A-Z </option>
          	   	  <option value="dec"> Name Z-A </option>
          	   	  <option value="avail"> Available </option>
          	   	  <option value="type1"> Type A-Z </option>
          	   	  <option value="type2"> Type Z-A </option>
          	   	  <option value="price1"> Price $-$$ </option>
          	   	  <option value="price2"> Price $$-$ </option>
          	   </select>
          	  <input type="submit" value="Display!!" name="submit" />
          </form>
          <hr>
          
          <?php
            showTable();
          ?>
        </main>
    </body>
</html>
