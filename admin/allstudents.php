<style>
th,
h3,
td {
    text-align: center;
}
table {
    width: 100vw;
}
</style>
<div class="container-fluid">
    <table class="table table-striped table-hover ">

        <thead class=" border border-danger">
            <tr>
                <h3>Student Data Show & Control </h3>
                <th scope="col">ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Courses</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody class=" border border-danger">
            <?php
        require_once "crud/connection.php";
        require_once "../students.php";
        $select = $connection -> prepare('SELECT * FROM students');
        $select -> execute();
        $students = $select -> fetchAll(PDO::FETCH_CLASS, 'Studetdetails');
        foreach($students as $Studetdetails){
        ?>
            <tr>
                <th scope="row"><?= $Studetdetails -> id; ?></th>
                <td><?= $Studetdetails -> student_name; ?></td>
                <td><?=  $Studetdetails -> birth_date; ?></td>
                <td><?= $Studetdetails -> courses; ?></td>
                <td><?= $Studetdetails -> student_status; ?></td>
                <td>
                    <a href="editstudent.php?id=<?= $Studetdetails -> id ?>" class="btn btn-primary btn-sm">
                        <i class="bx bxs-pen"></i> Edit
                    </a>
                    <a href="crud/delete.php?id=<?=$Studetdetails ->id?>" class="btn btn-danger btn-sm">
                        <i class="bx bxs-trash"></i> Delete</ش>

                </td>
            </tr>
            <?php  ; } ?>
        </tbody>
    </table>

</div>