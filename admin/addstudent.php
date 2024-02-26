<div class="container-fluid  bg-light border border-danger">
    <form action="crud/insert.php" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="student_name">Student Name:</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
        </div>

        <div class="form-group mb-3">
            <label for="stu_img">Student Image (optional):</label>
            <input type="file" class="form-control" id="stu_img" name="stu_img" accept="image/*">
        </div>

        <div class="form-group mb-3">
            <label for="birth_date">Birth Date:</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
        </div>

        <div class="form-group mb-3">
            <label for="courses">Courses:</label>
            <select class="form-control" id="courses" name="courses" required>
                <option value="">Select Course</option>
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="php">PHP</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="student_status">Student Status:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="available_status" name="student_status"
                    value="available" required>
                <label class="form-check-label" for="available_status">Available</label>
            </div>
            <div class="form-check form-check-inline">


                <input class="form-check-input" type="radio" id="not_available_status" name="student_status"
                    value="not available" required>
                <label class="form-check-label" for="not_available_status">Not Available</label>
            </div>
        </div>

                                    <div class="form-group mb-5">
                                        <button type="submit" class="btn btn-primary btn-m rounded-pill float-end">
                                            <i class="bx bx-plus"></i> Add Student
                                        </button>
                                    </div>
    </form>
</div>