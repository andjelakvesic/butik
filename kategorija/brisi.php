<?php 
    session_start();

    if( isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] == "Admin"){

       if( isset($_GET["id"]) && is_numeric($_GET["id"])){
            $IDKategorije = $_GET["id"];

            include('../db_oo.php'); 

            $sql = "DELETE FROM kategorije WHERE ID = " . $IDKategorije;

            if ($conn->query($sql) === TRUE) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Greška prilikom brisanja: " . $conn->error;
            }
            
            $conn->close();
       }

    }
    else {
        header('Location: /index.php');
    }
    
?>