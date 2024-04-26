<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register A New Student</h1>
    <form action="" method="POST">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" required><br><br>
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" required><br><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="courses[]">Course:</label>
        <select name="courses[]" id="courses" multiple>
        <?php
            $sql = 'SELECT code FROM course';
            $statment = $conn -> query($sql);
            $courses = $statment->fetchAll(PDO::FETCH_ASSOC);
            foreach($courses as $course){
                //$c = $course['code'];
                echo "<option value='".$course["code"]."'>".$course["code"]."</option>";
            }
        ?>
        </select><br><br>
        <input type="submit" value="Register"><br><br>
        <a href="index.php">Cancle</a><br><br>
    </form>
</body>
</html>
<?php
    if(isset($_POST["fname"])){
        $sql = "INSERT INTO student (Fname,Lname,Email) VALUES (:f,:l,:e)";
        $statment = $conn->prepare($sql);
        $statment->execute(array(
            ':f' => $_POST["fname"],
            ':l' => $_POST["lname"],
            ':e' => $_POST["email"]
        ));
        $sid=$conn->lastInsertId();

        foreach($_POST["courses"] as $course){
            $sql = "INSERT INTO student_course(	student_id,	course_code) VALUES (:i,:cc)";
            $statment =$conn -> prepare($sql);
            $statment->execute(array(
                ':i' => $sid,
                ':cc' => $course 
            ));
        }
        session_start();
        $_SESSION["insertstudent"] = true;
        header("Location:index.php");
    }
?>