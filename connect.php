<?php
    $dsn = 'mysql:host=localhost;dbname=sh7'; //data source name
    $dpuser = 'root';
    $pass = '';

    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    try{
        $conn = new PDO($dsn, $dpuser, $pass,$option);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo 'connected successfully<br>';
    }
    catch(PDOException $e){
        die("Failed to connect to MySQL: ". $e->getMessage()."<br>");
    }
    /*
        $q = "INSERT INTO item (name) VALUES ('product3')";
        $conn_>exec($q);
    */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url(d.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            /* opacity: .5; */
        }
        table{
            width:50%;
            text-align: center;
            background-color: #98afa9;
            color: white;
        }
        label{
            color: #2b499f;
            font-size: 20px;
            font-weight: bold;
        }
        h1,h3{
            color: #2b499f;
            font-weight: bold;
        }
        a{
            color: #2b499f;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
            
        }
        input[type="submit"]{
            background-color: #2b499f;
            color: white;
            font-weight: bold;
            border: none;
            padding: 7px;
            text-align: center;
            border-radius: 10px;
        }
        input{
            text-align: center;
            border-radius: 15px;
        }
        #email{
            margin-left: 40px;
        }
        select{
            background-color: #2b499f;
            color: white;
        }
        #gr{
            color: #2b499f;
        }
    </style>
</head>
<body>
    
</body>
</html>