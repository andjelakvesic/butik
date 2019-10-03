<?php 
    include('side_menu_admin.php');
?>

<div class="col-lg-9">
    <?php 
        if(isset($page)){
            switch ($page){
                case 'korisnici' :  include('views/_korisnici.php');
                                    break;
                case 'kategorije' :  include('views/_kategorije.php');
                                    break;
                case 'proizvodi' :  include('views/_proizvodi.php');
                                    break; 
                case 'kupovine' :  include('views/_kupovine.php');
                                    break;
                default :   include('views/_adminIndex.php');
                            break;
            }
        }
        else {
            include('views/_adminIndex.php');
        }
    ?>
</div>