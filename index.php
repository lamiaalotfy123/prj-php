<link rel="stylesheet" href="index.css">

<?php
// Add login functionality and session management here...
require_once "template/header.php";
?>



<?php
// session_start();

if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];

  $connection = new PDO("mysql:dbname=storedb;host=localhost", 'root', '');
  $select = $connection->prepare('SELECT * FROM students');
  $select->execute();
  $students = $select->fetchAll(PDO::FETCH_ASSOC);

  ?>
<div class="container mt-2">
    <div class="row row-cols-1 row-cols-md-3 g-4"> <?php foreach ($students as $student) { ?>
        <div class="col">
            <div class="card shadow-sm  bordered">
                <img src="admin/images/<?= $student['stu_img'] ?>" class="card-img-top" alt="..." width="100"
                    height="100">
                <div class="card-body">
                    <h5 class="card-title"> Name : <?= $student['student_name']; ?></h5>
                    <p class="card-text"> Birth Date :<?= $student['birth_date']; ?></p>
                    <?php if ($student['id'] === $userId) { ?>
                    <a href="details.php?id=<?= $student['id']; ?>" class="btn btn-danger fw-bold ">View Details</a>
                    <?php } else { ?>
                    <button disabled class="btn btn-secondary  ">View Details</button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
} else { ?>
<div class="card text-bg-dark  ">
    <img src="./generalimg/background.png" class="card-img " alt="...">
    <div class="card-img-overlay ">
        <div class="card-body text-end">
          <h5 class="fst-italic text-warning"
            style="font-size: 2vw;  margin-top: 130px; ">
            To view student data Please log in.
          </h5>
          <a href="login.php" class="btn btn-secondary btn-outline-warning rounded-pill">Login</a>
        </div>
    </div>

</div>
<?php
}
?>

<?php
require_once "template/footer.php";
?>