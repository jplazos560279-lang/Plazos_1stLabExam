<?php
include "../db.php";
include "../student_class.php";

if(!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

$student = new Student($conn);
$id = $_GET['id'];

if(isset($_POST['update'])) {
    $student->updateStudent(
        $id,
        $_POST['id_number'],
        $_POST['name'],
        $_POST['email'],
        $_POST['course']
    );
    header("Location: ../index.php");
}

$data = $student->getStudentById($id);
$row = $data->fetch_assoc();
?>

<link rel="stylesheet" href="../style.css">

<div class="container">
<h2>Edit Student</h2>

<form method="POST">
<input type="text" name="id_number" value="<?php echo $row['id_number']; ?>"><br>
<input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
<input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
<input type="text" name="course" value="<?php echo $row['course']; ?>"><br>
<button name="update">Update</button>
</form>

<a href="../index.php">Back</a>
</div>