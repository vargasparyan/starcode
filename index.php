<?php
require_once('config.php');
//Creating a table with name "table1"
$query_create_table = 'CREATE TABLE IF NOT EXISTS public.table1
                    (
                        id SERIAL  NOT NULL,
                        happen_date text NOT NULL,
                        happen_time text NOT NULL,
                        ip text NOT NULL,
                        url_from text NOT NULL,
                        url_to text NOT NULL,
                        CONSTRAINT table1_pkey PRIMARY KEY (id)
                    )
                    WITH (
                        OIDS = FALSE
                    )
                    TABLESPACE pg_default;';

pg_query($conn, $query_create_table);

try {
    read_file_and_isert_datatable('first.txt',$conn, 'table1');
    echo "The table1 was successfuly created.<br>";
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

//Creating a table with name "table2"
$query_create_table = 'CREATE TABLE IF NOT EXISTS public.table2
                    (
                        id SERIAL  NOT NULL,
                        ip text NOT NULL,
                        browser_name text NOT NULL,
                        os_name text NOT NULL,
                        CONSTRAINT table2_pkey PRIMARY KEY (id)
                    )
                    WITH (
                        OIDS = FALSE
                    )
                    TABLESPACE pg_default;';

pg_query($conn, $query_create_table);
try {
    read_file_and_isert_datatable('second.txt',$conn, 'table2');
    echo "The table2 was successfuly created.<br>";
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

function read_file_and_isert_datatable($filename,$connection, $tablename) {
    //reading file .txt file
    $myfile = fopen($filename, "r") or die("Unable to open file!");
    while(!feof($myfile)) {
        $insertable_data='';
        $insertable_data = str_replace("\n", "", fgets($myfile));
        $insertable_data = str_replace("\r", "", $insertable_data);
        $insertable_data = str_replace("|", "','", $insertable_data);
        $insertable_data = "'".$insertable_data."'";
        if($tablename == 'table1') {
            $query_insert_row = 'INSERT INTO public.' . $tablename . '(
	                    happen_date, happen_time, ip, url_from, url_to
	                    )
	                    VALUES (' . $insertable_data . ' );';
        } elseif ($tablename == 'table2') {
            $query_insert_row = 'INSERT INTO public.' . $tablename . '(
	                    ip, browser_name, os_name
	                    )
	                    VALUES (' . $insertable_data . ' );';
        }
        //inserting data into table from .txt file
        $result = pg_query($connection, $query_insert_row);
        if(!$result){
            throw new Exception('Error has occured.<br>');
        }
    }
    fclose($myfile);
}

//$result = pg_query($conn, "select * from company");
//print_r(pg_fetch_all($result));
