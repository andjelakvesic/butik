<?php 

    include('db_config.php'); 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection 'PROC' failed: " . mysqli_connect_error());
    }
    
    mysqli_set_charset($conn,"utf8")
?>