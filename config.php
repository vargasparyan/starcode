<?php

define('DB_HOST', 'localhost');
define('DB_PORT', 5432);
define('DB_NAME', 'testtask');
define('DB_USER', 'postgres');
define('DB_PASSWORD', '12345');

$conn_string = "host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD;
$conn = pg_connect($conn_string);