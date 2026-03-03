<?php
include "../db.php";
include "../student_class.php";

if(!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

$student = new Student($conn);

if(isset($_POST['add'])) {
    $student->addStudent(
        $_POST['id_number'],
        $_POST['name'],
        $_POST['email'],
        $_POST['course']
    );
    header("Location: ../index.php");
}
?>

<link rel="stylesheet" href="../style.css">

<div class="container">
<h2>Add Student</h2>

<form method="POST">
<input type="text" name="id_number" placeholder="ID Number" required><br>
<input type="text" name="name" placeholder="Name" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="text" name="course" placeholder="Course" required><br>
<button name="add">Add Student</button>
</form>

<a href="../index.php">Back</a>
</div>