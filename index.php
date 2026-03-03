<?php
include "db.php";
include "student_class.php";

$student = new Student($conn);

/* LOGOUT */
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

/* LOGIN */
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username != "" && $password != "") {
        $_SESSION['user'] = $username;
    } else {
        $error = "Please enter username and password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Record System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php if(!isset($_SESSION['user'])) { ?>

    <!-- LOGIN FORM -->
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" name="login">Login</button>
    </form>

<?php } else { ?>

    <!-- DASHBOARD -->
    <div class="dashboard-header">
        <h2>Welcome, <?php echo $_SESSION['user']; ?></h2>
        <div class="dashboard-actions">
            <a href="student/add.php" class="btn-add">Add Student</a>
            <a href="index.php?logout=true" class="btn-logout">Logout</a>
        </div>
    </div>

    <p class="total-students">Total Students: <?php echo $student->countStudents(); ?></p>

    <table>
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $student->getStudents();
        while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['id_number']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td>
                    <a href="student/edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                    <a href="student/delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php } ?>

</div>
</body>
</html>