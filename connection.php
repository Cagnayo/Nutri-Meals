<?php

$localhost = "localhost";
$username = "root";
$password = "";
$database = "nutri-meals";

$con = new mysqli ($localhost, $username, $password, $database);
if (!$con){
    die(mysqli_error("Error"+$conn));
}

?>