<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_mitigasi');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
$database = mysql_select_db(DB_DATABASE);
?>
