<?php

$username = "root";
$password = "";
$dbName = "lms";
$host = "localhost";

$dbConn = mysqli_connect($host, $username, $password, $dbName);

if (mysqli_error($dbConn)) {
    print_r(mysqli_error($dbConn));
    exit(0);
}
