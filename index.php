<style>
.card {
    border-radius: 100%;

}

.btn {
    float: right;
}
.view{
  height: 60%;
}
</style>

<?php
// Add login functionality and session management here...
require_once "template/header.php";
?>

<!-- <div class="card text-bg-dark ">
    <img src="generalimg\welcome back.jpg" class="card-img view" alt="...">
    <div class="card fst-italic text-bg-light position-absolute " style="direction: rtl;">            <p class="card-text fst-italic d-flex  text-center" style="font-size: 2vw;">To view student data can
                you first log in .</p>
            <a class="nav-link" href="login.php">
                <button class="btn btn-outline-danger rounded-pill" type="button">Login</button>
            </a>


        </div>
    </div>

</div> -->
<img src="generalimg\Untitled design.png" class="card-img view" alt="...">

<!-- <img src="generalimg\welcome back.jpg" class="img-fluid" alt="..."> -->
<?php
session_start();

if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];

  $connection = new PDO("mysql:dbname=storedb;host=localhost", 'root', '');
  $select = $connection->prepare('SELECT * FROM students');
  $select->execute();
  $students = $select->fetchAll(PDO::FETCH_ASSOC);

  ?>
<div class="container mt-2 ">
    <div class="row row-cols-1 row-cols-md-3 g-4"> <?php foreach ($students as $student) { ?>
        <div class="col">
            <div class="card shadow-sm  bordered">
                <img src="admin/images/<?= $student['stu_img'] ?>" class="card-img-top" alt="..." width="100"
                    height="100">
                <div class="card-body">
                    <h5 class="card-title"> Name : <?= $student['student_name']; ?></h5>
                    <p class="card-text"> Birth Date :<?= $student['birth_date']; ?></p>
                    <?php if ($student['id'] === $userId) { ?>
                    <a href="details.php?id=<?= $student['id']; ?>" class="btn btn-success">View Details</a>
                    <?php } else { ?>
                    <a href="#" class="btn btn-danger disabled">View Details</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
} else { ?>
<!-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-body">
    Hello, To view student data Please log in.
    <div class="mt-2 pt-2 border-top">
      <a href="login.php">
        <button type="button" class="btn btn-primary btn-sm">Login</button></a>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
      </div>
    </div>
  </div> -->
<?php
  echo "<h2 style='color: red;'>  To view student data Please log in .</h2>";
           

    }
    require_once "template/footer.php";
    ?>