<?php
// database functions
// source - https://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
function db_connect() {

    //define connection as a static variable, to avoid connecting more than once
    static $connection;

    //If there is no existing connection, try to connect to the database
    if(!isset($connection)) {
        $config = parse_ini_file('../../dbconfig.ini'); // Parse ini file
        $connection = mysqli_connect($config['server'], $config['username'], $config['password'], $config['dbname']);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        echo 'Failed to connect to database'; //or do something more fancy!
        return mysqli_connect_error();
    }
    echo 'connected'; // Just for  testing
    return $connection;
}

function db_query($query) {
    // connect to the database
    $connection = db_connect();
    // query the database
    $result = mysqli_query($connection,$query);
    return $result;
}

function db_select($query) {
    //function to run SELECT query
    $rows = array();
    $result = db_query($query);
    //if query failed return 'false'
    if($result === false){
        return false;
    }
    //if the query was successful, retrieve all the rows as an associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function db_error() {
    // Fetches the last error from the database
    $connection = db_connect();
    return mysqli_error($connection);
}

function db_quote($value) {
    // quote and escape value for use in a database query
    $connection = db_connect();
    return "'" .mysqli_real_escape_string($connection,$value). "'";
}