<?php 

    if( isset($_POST["naziv"]) && isset($_POST["cijena"]) && isset($_POST["kratkiOpis"])  && isset($_POST["kategorija"])){

        $Naziv = $_POST["naziv"];
        $Cijena = $_POST["cijena"];
        $KratkiOpis = $_POST["kratkiOpis"];
        $Kategorija = $_POST["kategorija"];

        $direktorij = "../img/proizvodi/";
        $nazivSlike = time() . '_' . basename($_FILES["slika"]["name"]);
        $datoteka = $direktorij . $nazivSlike;

        if (move_uploaded_file($_FILES["slika"]["tmp_name"], $datoteka)) {

            include('../db_oo.php'); 

            if($_POST["id"] != ''){
                $sql = "UPDATE proizvodi SET Naziv = '".$Naziv."', Slika = '".$nazivSlike."', Kategorija = '".$Kategorija."', KratkiOpis = '".$KratkiOpis."', Cijena ='".$Cijena."' WHERE ID = '".$_POST["id"]."'";
            }
            else {
                $sql = "INSERT INTO proizvodi (Naziv, Slika, Kategorija, KratkiOpis, Cijena) VALUES ('".$Naziv."','".$nazivSlike."','".$Kategorija."','".$KratkiOpis."','".$Cijena."')";
            }


            if ($conn->query($sql) === TRUE) {
                if(strpos($_SERVER['HTTP_REFERER'], "registracija") === FALSE){
                    //header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                else {
                    header('Location: /index.php');
                }
                
            } else {
                echo "Greška prilikom dodavanja: " . $conn->error;
            }

            $conn->close();

        } 
        else {
            echo "Problem prilikom uploadanja slike.";
        }
  
    }

?>