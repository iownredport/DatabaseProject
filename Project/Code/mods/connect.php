<?php

$servername = "pdb33.awardspace.net";
$username = "2876690_drinker";
$password = "redman123";
$dbname = "2876690_drinker";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>