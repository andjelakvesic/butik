<?php

    $korisnickoime = $lozinka = $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["korisnickoImeUnos"]) && isset($_POST["lozinkaUnos"])){
            $korisnickoime = $_POST["korisnickoImeUnos"];
            $lozinka = $_POST["lozinkaUnos"];

            include('db_oo.php');

            $sql = "SELECT KorisnickoIme, Lozinka, tip.Naziv AS TipKorisnika FROM korisnici AS kor LEFT JOIN tipovi_korisnika AS tip ON kor.TipKorisnika = tip.ID WHERE LOWER(KorisnickoIme) = LOWER('" . $korisnickoime ."')";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                
                if(md5($lozinka) == $row["Lozinka"]){
                    session_start();
                    $_SESSION['korisnickoIme'] = $row["KorisnickoIme"];
                    $_SESSION['tipKorisnika'] = $row["TipKorisnika"];

                    $conn->close();

                    if($row["TipKorisnika"] == "Admin"){
                        header("Location: admin.php");
                    }
                    else {
                        header("Location: index.php");
                    }
                }
                else {
                    $error = 'Neispravna lozinka.';
                }
            }
            else {
                $error = 'Ne postojeći korisnik';
            }

            $conn->close();
        }
        
    }
    
?>

<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>H&A Butik | Prijava </title>

        <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="./css/site.css" rel="stylesheet">
        <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        </style>

        <link href="./css/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <img class="mb-4" src="./img/header_logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Prijavite se</h1>
            <?php echo empty($error) ? '' : '<h4 class="alert alert-danger">'. $error .'</h4>' ?>
            <label for="korisnickoImeUnos" class="sr-only">Korisničko ime</label>
            <input type="text" name="korisnickoImeUnos" class="form-control" placeholder="Korisničko ime" required autofocus>
            <label for="lozinkaUnos" class="sr-only">Lozinka</label>
            <input type="password" name="lozinkaUnos" class="form-control" placeholder="Lozinka" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Prijava</button>
            <p class="mt-5 mb-3 text-muted">Nemate račun - <a href="./registracija.php">Registrirajte se</a></p>
            <p class="mt-5 mb-3 text-muted">Copyright &copy; Helena Vasilj 2019</p>
        </form>

    </body>

</html>