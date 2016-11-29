<?php
$servername = "localhost";
$username = "vikrant_db";
$password = "vikrant_db";
$dbname = "lib_manager";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 