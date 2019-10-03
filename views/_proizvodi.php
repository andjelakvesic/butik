<?php 
    
    include('db_oo.php'); 

    $sql = "SELECT pro.ID, pro.Slika, pro.Naziv, kat.Naziv AS Kategorija, pro.Cijena
            FROM proizvodi AS pro 
            LEFT JOIN kategorije AS kat 
            ON kat.ID = pro.Kategorija";

    $result = $conn->query($sql);

    $sql_kategorije = "SELECT ID, Naziv FROM kategorije";
    $result_kategorije = $conn->query($sql_kategorije);
?>

<div class="container mt-5">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            Proizvodi
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Proizvod_Modal" name="dodaj" id="dodaj">Dodaj</button>
        </h2>
    </div>
    <div class="panel-body mt-4">
        <?php if($result->num_rows > 0){
            echo '<table class="table">
                    <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Slika</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Kategorija</th>
                            <th scope="col">Cijena</th>
                            <th></th>
                            </tr>
                    </thead>
                    <tbody>';
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                                <td scope="row">'.$row["ID"].'</td>
                                <td><img src="./img/proizvodi/'.$row["Slika"].'" width="50px" height="50px" style="object-fit: contain"/></td>
                                <td>'.$row["Naziv"].'</td>
                                <td>'.$row["Kategorija"].'</td>
                                <td>'.$row["Cijena"].'</td>
                                <td>
                                  <button id="'.$row["ID"].'" class="btn btn-info editProizvoda" title="Uređivanje"><i class="fa fa-pencil"></i></button>
                                    <a href="./proizvod/brisi.php?id='.$row["ID"].'" class="btn btn-danger" title="Brisanje"><i class="fa fa-trash-o"></i></a>
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

<div class="modal fade" id="Proizvod_Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proizvod</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="proizvod_form" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" />
        <div class="modal-body">
          <div class="form-group">
            <label for="naziv" class="sr-only">Naziv</label>
            <input type="text" name="naziv" id="naziv" class="form-control" placeholder="Naziv" required>
          </div>
          <div class="form-group">
            <label for="cijena" class="sr-only">Cijena</label>
            <input type="number" step="0.01" min="0" name="cijena" id="cijena" class="form-control" placeholder="Cijena" required>
          </div>
          <div class="form-group">
            <label for="cijena" class="sr-only">Kratki opis</label>
            <textarea rows="4" style="width:100%" name="kratkiOpis" id="kratkiOpis" required></textarea>
          </div>
          <div class="form-group">
            <label for="kategorija" class="sr-only">Kategorija</label>
            <select name="kategorija" id="kategorija" class="form-control">
              <?php 
                  while($row = $result_kategorije->fetch_assoc()) {
                    echo '<option value="'.$row["ID"].'">'.$row["Naziv"].'</option>';
                  }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="slika" class="sr-only">Slika</label>
            <input type="file" name="slika" id="slika">
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