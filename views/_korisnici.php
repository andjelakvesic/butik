<?php include('db_oo.php'); 

    $filter = isset($kategorijaID) ? " WHERE pro.Kategorija =".$kategorijaID : "";

    $sql = "SELECT kor.ID, kor.Ime, kor.Prezime, kor.KorisnickoIme, kor.Email, tip.Naziv AS TipKorisnika 
            FROM korisnici AS kor 
            LEFT JOIN tipovi_korisnika AS tip 
            ON kor.TipKorisnika = tip.ID";

    $result = $conn->query($sql);

    $sql_tipoviKorisnika = "SELECT ID, Naziv FROM tipovi_korisnika";
    $result_tipoviKorisnika = $conn->query($sql_tipoviKorisnika);
?>

<div class="container mt-5">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            Korisnici
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Korisnik_Modal" name="dodaj" id="dodaj">Dodaj</button>
        </h2>
    </div>
    <div class="panel-body mt-4">
        <?php if($result->num_rows > 0){
            echo '<table class="table">
                    <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Korisnicko Ime</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Tip Korisnika</th>
                            <th></th>
                            </tr>
                    </thead>
                    <tbody>';
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                                <td scope="row">'.$row["ID"].'</td>
                                <td>'.$row["Ime"].'</td>
                                <td>'.$row["Prezime"].'</td>
                                <td>'.$row["KorisnickoIme"].'</td>
                                <td>'.$row["Email"].'</td>
                                <td>'.$row["TipKorisnika"].'</td>
                                <td>
                                    <button id="'.$row["ID"].'" class="btn btn-info editKorisnika" title="Uređivanje"><i class="fa fa-pencil"></i></button>
                                    <a href="./korisnik/brisi.php?id='.$row["ID"].'" class="btn btn-danger" title="Brisanje"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>';
                        }             
            echo '</tbody> </table>';
            }
            else {
                echo '<h2>Nema korisnika.</h2>';
            }
        ?>
    </div>
  </div>
</div>

<div class="modal fade" id="Korisnik_Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Korisnik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="korisnik_form">
        <input type="hidden" name="id" id="id" /> 
        <div class="modal-body">
          <div class="form-group">
            <label for="ime" class="sr-only">Ime</label>
            <input type="text" id="ime" name="ime" class="form-control" placeholder="Ime" required autofocus>
          </div>
          <div class="form-group">
            <label for="prezime" class="sr-only">Prezime</label>
            <input type="text" name="prezime" id="prezime" class="form-control" placeholder="Prezime" required>
          </div>
          <div class="form-group">
            <label for="korisnickoIme" class="sr-only">Korisničko ime</label>
            <input type="text" name="korisnickoIme" id="korisnickoIme" class="form-control" placeholder="Korisničko ime" required>
          </div>
          <div class="form-group">
            <label for="email" class="sr-only">E-mail</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="form-group">
            <label for="lozinka" class="sr-only">Lozinka</label>
            <input type="password" name="lozinka" id="lozinka" class="form-control" placeholder="Lozinka" required>
          </div>
          <div class="form-group">
            <label for="lozinkaPonovno" class="sr-only">Lozinka</label>
            <input type="password" name="lozinkaPonovno"  id="lozinkaPonovno" class="form-control" placeholder="Ponovno Lozinka" required>
          </div>
          <div class="form-group">
            <label for="tipKorisnika" class="sr-only">Tip korisnika</label>
            <select name="tipKorisnika" id="tipKorisnika" class="form-control">
              <?php 
                  while($row = $result_tipoviKorisnika->fetch_assoc()) {
                    echo '<option value="'.$row["ID"].'">'.$row["Naziv"].'</option>';
                  }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
            <button type="submit" class="btn btn-primary" name="dodaj" id="dodaj" value="dodaj">Spremi</button>
        </div>
      </form>
    </div>
  </div>
</div>