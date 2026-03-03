<?php
$conn = new mysqli("localhost", "root", "", "student_record_system_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

?>
