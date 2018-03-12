<!--Derived from these articles:-->
<!--HTML Forms: https://edu.showdeo.com/csumb/scd/content/php/html-forms.md-->
<!--PHP and MySQL: https://edu.showdeo.com/csumb/scd/content/php/rdbms.md-->
<!--SQL DB Dump: https://edu.showdeo.com/csumb/scd/content/rdbms/sql/dml.md-->

<?php
$filterText = '';

// We only care about the filter if we are posting back
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $filterText = $_POST['filterText'];
}

// Prepare the connection and connect
$host = getenv('IP');
$port = 3306;
$dbname = 'crime_tips';
$username = getenv('C9_USER');
$password = '';

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Raise error if something is wrong with the connection
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Compose the SQL statement
$sql = "SELECT  ch.`charge_id`,
                ch.`name` AS  'charge_name',
                c.`case_id` ,  
                c.`name` AS  'case_name',
                ct.`id` AS 'charge_type_id',
                ct.`name` AS 'charge_type_name',
                cs.id AS 'charge_severity_id',
                cs.`name` AS 'charge_severity_name',
                v.`name` AS 'victim_name',
                a.`name` AS 'accused_name'
        FROM `charge` AS ch
        INNER JOIN `case` AS c ON ch.case_id = c.case_id
        LEFT JOIN `charge_type` AS ct ON ct.id = ch.charge_type_id
        LEFT JOIN `charge_severity` AS cs ON ct.charge_severity_id = cs.id
        INNER JOIN `victim` AS v ON ch.victim_id = v.victim_id
        LEFT JOIN `accused` AS a ON ch.accused_id = a.accused_id";

// Add the filter...we want to filter for any field we can see, any partial match
$sql = $sql."
WHERE ch.`name` LIKE CONCAT('%', :filterText, '%')
OR c.`name` LIKE CONCAT('%', :filterText, '%')
OR v.`name` LIKE CONCAT('%', :filterText, '%')
OR a.`name` LIKE CONCAT('%', :filterText, '%')
";

// Prepare the statement
$stmt = $dbConn->prepare($sql);

// Execute the statement, passing in array of parameters
$stmt->execute(array(':filterText' => $filterText));

?>

<!--Include the header HTML-->
<?php include 'includes/header.inc.php'; ?>

<div class="app-body">
  <!--Include the side bar menu HTML-->
  <?php include 'includes/sidebar.inc.php'; ?>
  
  <!-- Main content -->
  <main class="main">
    <div class="container-fluid">
      
      <!--CODE FOR TUTORIAL HERE-->
      <style>
        .filter-area {
          margin-top:20px;
          margin-bottom:20px;
        }
      </style>
      
      <!--Filter Section-->
      <form action="index.php" method="POST">
      <div class="input-group filter-area">
        <input type="text" name="filterText" class="form-control" 
        aria-label="Text input with segmented dropdown button" 
        value="<?php echo $filterText; ?>"
        >
        <div class="input-group-append">
          <input type="submit" value="Filter" class="btn btn-outline-secondary">
        </div>
      </div>
      </form>

      <!--Results Section-->
      <?php
        // Process the results
        // http://php.net/manual/en/pdostatement.rowcount.php
        if ($stmt->rowCount() > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '  <tr>';
            echo '    <th scope="col">#</th>';
            echo '    <th scope="col">Charge/Case Name</th>';
            echo '    <th scope="col">Victim</th>';
            echo '    <th scope="col">Accused</th>';
            echo '    <th></th>';
            echo '  </tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $stmt->fetch()) {
                // <tr>
                echo '<tr>';

                //   <th scope="row">1</th>
                echo '  <th scope="row">'.$row['charge_id'].'</th>';

                //   <td>Mark</td>
                echo '  <td>'.$row['charge_name'].' under '.$row['case_name'].'</td>';

                //   <td>Otto</td>
                echo '  <td>'.$row['victim_name'].'</td>';

                //   <td>@mdo</td>
                echo '  <td>'.$row['accused_name'].'</td>';

                //   <td></td>
                $chargeId = $row['charge_id'];
                echo  "<td><a href=\"charge.php?id=$chargeId\">Open Details</a></td>";

                // </tr>
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5">No Charges Found</td></tr>';
        }

        // End the table
        echo '</tbody>';
        echo '</table>';
      ?>
      <!--END OF CODE FOR TUTORIAL-->
    </div>
    <!-- /.container-fluid -->
  </main>
</div>
<!-- /.app-body -->

 <!--Include the footer HTML-->
<?php include 'includes/footer.inc.php'; ?>