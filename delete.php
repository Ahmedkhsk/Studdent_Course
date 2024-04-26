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
    <form action="" method="POST">
        <label for="fname">Fname:</label>
        <input type="text" name="fname" required><br><br>
        <label for="lname">Lname:</label>
        <input type="text" name="lname" required><br><br>
        <input type="submit" value="Delete"><br><br>
        <a href="index.php">Cancle</a><br><br>
    </form>
</body>
</html>

<?php
    if(isset($_POST["lname"])){
        $sql = "DELETE FROM student where Fname = :fn and Lname = :ln";
        $statment = $conn-> prepare($sql);
        $statment->execute(array(
            ":fn" => $_POST["fname"],
            ":ln" => $_POST["lname"]
        ));
    }

?>