<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs3319";
$dbname = "zkaawanassign2db";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
    die("Database Connection Failed:".
    mysqli_connect_errno()."(".mysqli_connect_errno().")");
} // End of if statement
?>
