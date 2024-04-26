<?php
    require 'connect.php';
    $id=$_GET['ID'];
    $course=$_GET['Course'];
    echo "<h3>Grading a student with ID = $id in the course $course</h3>";

?>

<form action="" method="POST">
    <label for="mark">Grade</label>
    <input type="number" name="mark" required><br><br>
    <input type="submit" value="Grade"><br><br>
    <a href="index.php">Cancle</a><br><br>
</form>

<?php
    if(isset($_POST["mark"])){
        $sql = "UPDATE student_course SET mark = :m where student_id =:id and course_code=:cc";
        $statement = $conn->prepare($sql);
        $statement->execute(array(
            ":m"=>$_POST["mark"],
            ":id"=>$id,
            ":cc"=>$course
        ));
    session_start();
    $_SESSION["message"] = true;
    header("Location: index.php");
    }

?>