<?php 
    include('side_menu.php');
    include('db_oo.php'); 

    $filter = isset($kategorijaID) ? " WHERE pro.Kategorija =".$kategorijaID : "";

    $sql = "SELECT pro.ID, pro.Naziv, pro.KratkiOpis, kat.Naziv AS Kategorija, pro.Cijena, pro.Slika 
            FROM proizvodi AS pro
            LEFT JOIN kategorije AS kat 
            ON kat.ID = pro.Kategorija" . $filter . " ORDER BY ID DESC";

    $result = $conn->query($sql);
?>

<div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="./img/banneri/1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="./img/banneri/2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="./img/banneri/3.jpg" alt="Third slide">
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <?php if($result->num_rows > 0){ 
            echo '<div class="row">';
                while($row = $result->fetch_assoc()) {
                    $button = isset($_SESSION['korisnickoIme']) ? '<a href="kupi.php?id='.$row["ID"].'" class="btn btn-primary">Kupi!</a>' : '<a href="./prijava.php" class="btn btn-primary">Prijavi se!</a>';

                    echo '<div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="./img/proizvodi/'.$row["Slika"].'" width="250px" height="250px" style="object-fit: contain"/>
                                <div class="card-body">
                                <h4 class="card-title text-center"><strong>'.$row["Naziv"].'</strong></h4>
                                <h5 class="text-center nav-link">'.$row["Kategorija"].'</h5>
                                <p class="card-text">'.$row["KratkiOpis"].'</p>
                                <h5 class="text-center">'.$row["Cijena"].' KM</h5>
                                </div>
                                <div class="card-footer text-center">'.
                                    $button
                                .'</div>
                            </div>
                        </div>';
                }
            echo '</div>';
        }
        else echo '<div class="row"><h2>Nema proizvoda.</h2></div>'
    ?>
    
</div>

<?php $conn->close() ?>