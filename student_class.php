<?php
class Student {

    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function addStudent($id, $name, $email, $course) {

        // String functions
        $name = strtoupper($name);
        $email = strtolower($email);

        $sql = "INSERT INTO students (id_number, name, email, course)
                VALUES ('$id','$name','$email','$course')";
        return $this->conn->query($sql);
    }

    public function getStudents() {
        return $this->conn->query("SELECT * FROM students ORDER BY id DESC");
    }

    public function getStudentById($id) {
        return $this->conn->query("SELECT * FROM students WHERE id=$id");
    }

    public function updateStudent($id, $idnum, $name, $email, $course) {
        $sql = "UPDATE students SET
                id_number='$idnum',
                name='$name',
                email='$email',
                course='$course'
                WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function deleteStudent($id) {
        return $this->conn->query("DELETE FROM students WHERE id=$id");
    }

    public function countStudents() {
        $result = $this->conn->query("SELECT * FROM students");
        return $result->num_rows;
    }
}
?>