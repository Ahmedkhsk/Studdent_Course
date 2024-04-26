<?php
    require "connect.php";
    session_start();
    if(isset($_SESSION["insertstudent"])){
        echo "<h2 style='color: #2b499f;'>Record Added</h2>";
        unset($_SESSION["insertstudent"]); 
    }
        if(isset($_SESSION["message"])){
            echo "<h2 style='color: #2b499f;'>Grade Update</h2>";
            unset($_SESSION["message"]); 
        }
   
    // $query3 = 'SELECT student_course.student_id ,student.Fname,student.Lname,student_course.course_code 
    // from student , student_course 
    // where student.id = student_course.student_id';

    $sql = "SELECT * FROM student s join student_course sc where s.id = sc.student_id";
    $stetment = $conn->query($sql);
    $data = $stetment->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=1px>";
            foreach($data as $student){
                echo "<tr>";
                echo "<td>".$student["student_id"]."</td>";
                echo "<td>".$student["Fname"]."</td>";
                echo "<td>".$student["Lname"]."</td>";
                echo "<td>".$student["course_code"]."</td>";
                echo "<td>".$student["mark"]."</td>";
                $id = $student["student_id"];
                $Course = $student["course_code"];
                echo "<td><a href='grade.php?ID=$id&Course=$Course' id='gr'>Grading</a></td>";
                echo "</tr>";
            }

        echo "</table><br><br>";

         echo "<a href='addstudent.php'>Register New Student</a><br><br>
         <a href='List_Sby.php'>List Student by Courses</a><br><br>
         <a href='delete.php'>Delete</a><br><br>";
?>
