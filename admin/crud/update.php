<?php
session_start();

if (isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
        require_once 'connection.php';

        $studentname = $_POST['student_name'];
        $birthdate = $_POST['birth_date'];
        $courses = $_POST['courses'];
        $studentstatus = $_POST['student_status'];
        $id = $_POST['id'];
        if (!empty($stu_img)) {
            $stu_img = $fileName; 
        } else {
            $stu_img = ""; 
        }

        try {
            $update = $connection->prepare('UPDATE students SET student_name=?, birth_date=?, courses=?, student_status=?, stu_img=? WHERE id=?');
            $update->execute([$studentname, $birthdate, $courses, $studentstatus, $stu_img, $id]);

            header("Location: ../index.php"); 
        } catch (PDOException $e) {
           
            die("Error inserting data: ". $e->getMessage());
        }
    }
} else {
    header("Location: ../index.php"); 
}
