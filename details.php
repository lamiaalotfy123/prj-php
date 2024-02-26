<?php
require_once "template/header.php";

$connection = new PDO("mysql:dbname=storedb;host=localhost", 'root', '');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    $select = $connection->prepare('SELECT * FROM students WHERE id = ?');
    $select->execute([$id]);
    $student = $select->fetch(PDO::FETCH_ASSOC);
    
    if ($student) { ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="admin/images/<?= $student['stu_img'] ?>" class="img-fluid rounded-circle" alt="..." width="350"
                height="350">
        </div>
        <div class="col-md-8">
            <h1><?= $student['student_name']; ?></h1>
            <p>ID: <?= $student['id']; ?></p>
            <p>Birth Date: <?= $student['birth_date']; ?></p>
            <div class="card mb-3">
                <div class="card-header">
                    Courses
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach (explode(",", $student['courses']) as $course) { ?>
                    <li class="list-group-item"><?= $course; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    Status
                </div>
                <div class="card-body">
                    <?= $student['student_status']; ?>
                </div>
            </div>
            
            <a href="index.php" >
            <button type="submit" class="btn btn-secondary mt-3 btn-m rounded-pill float-end">Esc
            </button>
            </a>
        </div>
    </div>
</div>

<?php } else {
        echo "<p style='color: red;'>Invalid student ID!</p>";
    }
} else {
    echo "<p style='color: red;'>Missing student ID!</p>";
}
require_once "template/footer.php";
?>