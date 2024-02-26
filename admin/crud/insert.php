<?php
session_start();

if (isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'connection.php'; // Ensure you have access to the $connection variable

        $studentname = $_POST['student_name'];
        $birthdate = $_POST['birth_date'];
        $courses = $_POST['courses'];
        $studentstatus = $_POST['student_status'];
        $stu_img = $_FILES['stu_img'];
        if (!empty($stu_img)) {
            $fileName = $stu_img['name'];
            $fileTemp = $stu_img['tmp_name'];
            $explode = explode('.', $fileName);
            $fileExt = end($explode);
            $allowedExt = ['jpg', 'png', 'jpeg'];
            if (in_array($fileExt, $allowedExt)) {
                move_uploaded_file($fileTemp, "../images/" . $fileName);
                $stu_img = $fileName; 
            } else {
                
                die("Invalid file type!");
            }
        }

        try {
            $insert = $connection->prepare('INSERT INTO students (student_name, birth_date, courses, student_status, stu_img) VALUES (?, ?, ?, ?, ?)');
            $insert->execute([$studentname, $birthdate, $courses, $studentstatus, $stu_img]);

            header("Location: ../index.php"); 
        } catch (PDOException $e) {
            
            die("Error inserting data: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../index.php"); 
}