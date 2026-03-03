<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // hide notices & warnings
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "student_record_system_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>