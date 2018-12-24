<?php

$servername = "pdb33.awardspace.net";
$username = "2876690_drinker";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>