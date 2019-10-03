<?php 
    session_start();

    if( isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["korisnickoIme"]) && isset($_POST["email"])  && isset($_POST["lozinka"]) && isset($_POST["lozinkaPonovno"]) ){

        $Ime = $_POST["ime"];
        $Prezime = $_POST["prezime"];
        $KorisnickoIme = $_POST["korisnickoIme"];
        $Email = $_POST["email"];
        $Lozinka = $_POST["lozinka"];
        $LozinkaPonovno = $_POST["lozinkaPonovno"];
        $TipKorisnika = isset($_POST["tipKorisnika"]) ? $_POST["tipKorisnika"] : "2";

        if($Lozinka == $LozinkaPonovno) {

            include('../db_oo.php'); 

            $provjeraKorisnikaSQL = "SELECT * FROM korisnici WHERE KorisnickoIme = '" . $Ime . "'";
            $result = $conn->query($provjeraKorisnikaSQL);

            if($result->num_rows == 0){
                
                if($_POST["id"] != ''){
                    $sql = "UPDATE korisnici SET Ime = '".$Ime."' , Prezime = '".$Prezime."', KorisnickoIme = '".$KorisnickoIme."', Email = '".$Email."', Lozinka = '".md5($Lozinka)."', TipKorisnika = '".$TipKorisnika."' WHERE ID = '".$_POST["id"]."'";
                }
                else {
                    $sql = "INSERT INTO korisnici (Ime, Prezime, KorisnickoIme, Email, Lozinka, TipKorisnika) VALUES ('".$Ime."','".$Prezime."','".$KorisnickoIme."','".$Email."','".md5($Lozinka)."','".$TipKorisnika."')";
                }

                if ($conn->query($sql) === TRUE) {

                    $conn->close();

                    if(strpos($_SERVER['HTTP_REFERER'], "registracija") === FALSE){
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                    else {
                        header('Location: /index.php');
                    }
                    
                } else {
                    echo "Greška prilikom dodavanja: " . $conn->error;
                }
                
            }
            else {
                echo "Postoji već korisnik sa tim korisničkim imenom.";
            }
            
        }
        else {
            echo "Lozinke se ne podudaraju, pokušajte ponovno.";
        }
        
    }

?>