<?php
    require "connect.php";
?>
<form action="" method="POST">
    <label for="">Courses</label>
    <select name="courses[]" id="courses" multiple required>
    <?php
        $sql = "SELECT code FROM course";
        $statment = $conn -> query($sql);
        $courses = $statment->fetchAll(PDO::FETCH_ASSOC);
        foreach($courses as $course){
            $cour = $course["code"];
            echo "<option value='$cour'>$cour</option>";
        }
    ?>
    </select><br><br>
    <input type="submit" value="show"><br><br>
    <a href="index.php">Cancle</a><br><br>
</form>
<?php
    if(isset($_POST["courses"])){
        $sql = "SELECT * FROM student s join student_course sc where s.id = sc.student_id and  sc.course_code in (";
        $courses = $_POST["courses"];
        for($i = 1;$i<=count($courses);$i++){
        /*  $sql .= ":course$i"; */
            $sql .= "?";
            if($i!= count($courses)){
                $sql.= ",";
            }
        }
        $sql .= ")";
        $statment = $conn -> prepare($sql);
        /*
        $arr = array();
        for($i =1;$i<=count($courses);$i++){
            $arr["course$i"] = $courses[$i-1];
        }
        $statment -> execute($arr);
        */
        $statment -> execute($courses);
        $students = $statment->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border='1'>";
        foreach($students as $student){
            echo "<tr>";
            echo "<td>".$student["student_id"]."</td>";
            echo "<td>".$student["Fname"]."</td>";
            echo "<td>".$student["Lname"]."</td>";
            echo "<td>".$student["course_code"]."</td>";
            echo "<td>".$student["mark"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    }

?>
