<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "csv_files";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// echo "connected successfully";

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}