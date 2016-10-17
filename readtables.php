<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type\n");
//header('content-type: application/json; charset=utf-8');
require_once('config.php');

//Selecting all the fields of table1 and table2 by joining these tables where ip are the same.
$query = "SELECT * FROM table1 t1 INNER JOIN table2 t2 ON (t1.ip = t2.ip);";
$result = pg_query($conn, $query);
$result = pg_fetch_all($result);
exit(json_encode($result));