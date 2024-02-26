<?php
require_once "template/header.php";
session_start();
if(isset($_SESSION['username'])){
?>
<?php

        require_once "addstudent.php";
        ?>
<div class=" pt-5">
    <?php
        require_once "allstudents.php";
        ?>
</div>
</div>

</div>

<?php
require_once "template/footer.php";
}else{
    header("Location:login.php");
}
?>