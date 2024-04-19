<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

// Create a new PDO connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

?>