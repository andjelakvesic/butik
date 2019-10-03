<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>H&A Butik | Registracija</title>

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

        <form class="form-signin" method="post" action="./korisnik/dodaj.php">
            <img class="mb-4" src="./img/header_logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Registrirajte se</h1>
            <label for="ime" class="sr-only">Ime</label>
            <input type="text" name="ime" class="form-control" placeholder="Ime" required autofocus>
            <label for="prezime" class="sr-only">Prezime</label>
            <input type="text" name="prezime" class="form-control" placeholder="Prezime" required>
            <label for="korisnickoIme" class="sr-only">Korisničko ime</label>
            <input type="text" name="korisnickoIme" class="form-control" placeholder="Korisničko ime" required>
            <label for="email" class="sr-only">E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail" required>
            <label for="lozinka" class="sr-only">Lozinka</label>
            <input type="password" name="lozinka" class="form-control" placeholder="Lozinka" required>
            <label for="lozinkaPonovno" class="sr-only">Lozinka</label>
            <input type="password" name="lozinkaPonovno" class="form-control" placeholder="Ponovno Lozinka" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Registracija</button>
            <p class="mt-5 mb-3 text-muted">Imate račun - <a href="./prijava.php">Prijavite se</a></p>
            <p class="mt-5 mb-3 text-muted">Copyright &copy; Helena Vasilj 2019</p>
        </form>

    </body>

</html>