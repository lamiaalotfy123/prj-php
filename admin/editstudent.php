<?php
require_once "template/header.php";
if($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['id'])){
    require_once "crud/connection.php";
    require_once "../students.php";
    $select = $connection -> prepare('SELECT * FROM students WHERE id=?');
    $select -> execute([$_GET['id']]);
    $select -> setFetchMode(PDO::FETCH_CLASS, 'Studetdetails');
    $Studetde = $select -> fetch();
    ?>

<div class="container-fluid  pt-3 bg-light border border-danger" >
    <h3 style="text-align:center;">Edit student Data</h3>
    <form action="crud/update.php" method="post" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <input type="hidden" name="id" id="id" value="<?= $Studetde->id ?>">
        <label for="student_name">Student Name:</label>
        <input type="text" class="form-control" id="student_name" name="student_name" value="<?= $Studetde->student_name ?>" required>
        </div>

        <div class="form-group mb-4">
            <label for="stu_img">Student Image (optional):</label>
            <input type="file" class="form-control" id="stu_img" name="stu_img" accept="image/*" value="<?= $Studetde->stu_img ?>">
        </div>

        <div class="form-group mb-3">
            <label for="birth_date">Birth Date:</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $Studetde->birth_date ?>" required>
        </div>

        <div class="form-group mb-4">
            <label for="courses">Courses:</label>
            <select class="form-control" id="courses" name="courses"  value="<?= $Studetde->courses ?>" required>
                <option value="">Select Course</option>
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="php">PHP</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="student_status">Student Status:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="available_status" name="student_status"
                    value="available"  required>
                <label class="form-check-label" for="available_status">Available</label>
            </div>
            <div class="form-check form-check-inline">


                <input class="form-check-input" type="radio" id="not_available_status" name="student_status"
                    value="not available" required>
                <label class="form-check-label" for="not_available_status">Not Available</label>
            </div>
        </div>

        <div class="form-group pb-5">
            <button type="submit" class="btn btn-primary btn-m rounded-pill float-end ">
                <i class="bx bx-pencil"></i> Update
            </button>
        </div>
    </form>
</div>

<?php
}
require_once "template/footer.php";
?>