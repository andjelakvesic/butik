<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">

    <div class="container">
        
        <a class="navbar-brand" href="./"> <img src="./img/header_logo.png" width="40px" /> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="./">Početna
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <?php if(isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] == "Admin"){
                    echo '<li class="nav-item">
                        <a class="nav-link" href="./admin.php">Adminin Panel</a>
                    </li>';
                }
                ?>

                <li class="nav-item">
                    <?php echo isset($_SESSION['korisnickoIme']) ? '<a class="nav-link" href="./odjava.php">Odjava</a>' : '<a class="nav-link" href="./prijava.php">Prijava</a>' ?>
                </li>

                <?php if(isset($_SESSION['korisnickoIme'])){
                    echo '<li class="nav-item">
                        <a class="nav-link"> Dobrodošli, '.$_SESSION['korisnickoIme'].'</a>
                    </li>';
                }
                ?>
                
            </ul>

        </div>

    </div>
    
</nav>