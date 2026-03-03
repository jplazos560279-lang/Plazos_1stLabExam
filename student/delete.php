<?php
include "../db.php";
include "../student_class.php";

if(!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

$student = new Student($conn);
$id = $_GET['id'];
$student->deleteStudent($id);

header("Location: ../index.php");
?>