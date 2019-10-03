<?php include('db_oo.php'); 

    $sql = "SELECT k.Ime, k.Prezime, k.KorisnickoIme, p.Naziv, p.Cijena
            FROM kupovine AS ku
            LEFT JOIN korisnici AS k ON ku.ID_Korisnik = k.ID
            LEFT JOIN proizvodi AS p ON ku.ID_Proizvod = p.ID";

    $result = $conn->query($sql);

?>

<div class="container mt-5">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            Kupovine
        </h2>
    </div>
    <div class="panel-body mt-4">
        <?php if($result->num_rows > 0){
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ime</th>
                            <th>Prezime</th>
                            <th>Korisnicko Ime</th>
                            <th>Naziv proizvoda</th>
                            <th>Cijena</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                                <td scope="row">'.$row["Ime"].'</td>
                                <td>'.$row["Prezime"].'</td>
                                <td>'.$row["KorisnickoIme"].'</td>
                                <td>'.$row["Naziv"].'</td>
                                <td>'.$row["Cijena"].'</td>
                            </tr>';
                        }             
            echo '</tbody> </table>';
            }
            else {
                echo '<h2>Nema kupovina.</h2>';
            }
        ?>
    </div>
  </div>
</div>