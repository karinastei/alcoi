<?php
$servername = "localhost"; // Replace with your server name
$username = "yourusername"; // Replace with your username
$password = "yourpassword"; // Replace with your password
$dbname = "yourdatabasename"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


