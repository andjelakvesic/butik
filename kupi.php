<?php
    session_start();

    if(isset($_SESSION['korisnickoIme']) && isset($_GET["id"])){

        $korisnikIme = $_SESSION['korisnickoIme'];
        $proizvodId = $_GET['id'];

        include('db_oo.php');

            $korisnikIdSql = "SELECT ID FROM korisnici WHERE KorisnickoIme = '".$korisnikIme."'";

            $result = $conn->query($korisnikIdSql);

            if($result->num_rows > 0){

                $user = $result->fetch_assoc();

                $sql = "INSERT INTO kupovine (ID_Korisnik, ID_Proizvod) VALUES ('".$user["ID"]."','".$proizvodId."')";

                if ($conn->query($sql) === TRUE) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    echo "Greška prilikom dodavanja: " . $conn->error;
                }
            }

            $conn->close();
    }
    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>