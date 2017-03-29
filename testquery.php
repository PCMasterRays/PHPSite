<html>
<head></head>
<body>
<h1>Testing SQL functions</h1>
<?php
require "dbfunctions.php"; //if require fails the script won't run
    $query = "SELECT * FROM tbl_vehicle";
    $result = db_select($query); //for queries that don't return anything result will be TRUE or FALSE.
    if ($result === false) {
        $error = db_error();
        echo $error;
        echo "No results";
        }
    else {
        foreach ($result as $row) //gets a row
        {
            echo "</br></br>";
            echo "Make :" . $row['vehiclemake']. "</br>";
            echo "Model :" . $row['vehiclemodel']. "</br>";
            echo "Colour :". $row['vehiclecolour']. "</br>";
            echo "Registration :". $row['vehiclereg']. "</br>";
        }
    }
?>
</body>
</html>