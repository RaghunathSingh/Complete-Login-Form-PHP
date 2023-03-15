<?php
$HOSTNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DATABASE="signupforms";

// to established a connection with the php database

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if(!$con){
    die(mysqli_error($con));
}
?>