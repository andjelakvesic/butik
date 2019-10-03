<?php include('db_oo.php'); 

    $sql = "SELECT * FROM kategorije";

    $result = $conn->query($sql);

?>

<div class="container mt-5">
  <div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            Kategorije
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Kategorija_Modal" name="dodaj" id="dodaj">Dodaj</button>
        </h2>
    </div>
    <div class="panel-body mt-4">
        <?php if($result->num_rows > 0){
            echo '<table class="table">
                    <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naziv</th>
                            <th></th>
                            </tr>
                    </thead>
                    <tbody>';
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                                <td scope="row">'.$row["ID"].'</td>
                                <td>'.$row["Naziv"].'</td>
                                <td>
                                    <button id="'.$row["ID"].'" class="btn btn-info editKategorije" title="Uređivanje"><i class="fa fa-pencil"></i></button>
                                    <a href="./kategorija/brisi.php?id='.$row["ID"].'" class="btn btn-danger" title="Brisanje"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>';
                        }             
            echo '</tbody> </table>';
            }
            else {
                echo '<h2>Nema kategorija.</h2>';
            }
        ?>
    </div>
  </div>
</div>

<div class="modal fade" id="Kategorija_Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kategorija</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="kategorija_form">
        <input type="hidden" name="id" id="id" /> 
        <div class="modal-body">
          <div class="form-group">
            <label for="naziv" class="sr-only">Naziv</label>
            <input type="text"  name="naziv" id="naziv" class="form-control" placeholder="Naziv kategorije" required autofocus>
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