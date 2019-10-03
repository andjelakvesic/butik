<?php 

    if( isset($_POST["naziv"]) ){

        $Naziv = $_POST["naziv"];
  
            include('../db_oo.php'); 

            if($_POST["id"] != ''){
                $sql = "UPDATE kategorije SET Naziv = '".$Naziv."' WHERE ID = '".$_POST["id"]."'";
            } else {
                $sql = "INSERT INTO kategorije (Naziv) VALUES ('".$Naziv."')";
            }

            if ($conn->query($sql) === TRUE) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Greška prilikom dodavanja: " . $conn->error;
            }

            $conn->close();
    }

?>