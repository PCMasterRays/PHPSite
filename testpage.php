<html>
<head></head>
<body>
<h1>Testing database connection</h1>
<?php
require "dbfunctions.php"; //if require fails the script wont run
$result = db_connect(); //run db_connect function from dbfunctions.php
?>
</body>
</html>