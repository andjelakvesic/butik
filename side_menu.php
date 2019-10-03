<?php 
    include('db_proc.php'); 

    $sql = "SELECT ID, Naziv FROM kategorije";
    $result = mysqli_query($conn, $sql);
?>

<div class="col-lg-3">
    <div class="side_menu_sticky">
        <h1 class="my-4 text-center">Kategorije</h1>
        <div class="list-group text-center">
            <?php 
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {

                        $active = (isset($kategorijaID) && $kategorijaID == $row["ID"]) ? "active" : "";
                        $link = (isset($kategorijaID) && $kategorijaID == $row["ID"]) ? "./" : "./?id=".$row["ID"];

                        echo "<a href='" . $link . "' class='nav-link list-group-item border-0 ".$active."'>" . $row["Naziv"] . "</a>";
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php mysqli_close($conn); ?>