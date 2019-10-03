<?php
    session_start();
    
    if(isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] == "Admin"){
        $page = isset($_GET["page"]) ? $_GET["page"] : NULL;

        $title = 'Admin Panel';
        $childView = 'views/_admin.php';
        include('layout.php');
    }
    else {
        header('Location: ./index.php');
    }  

?>

<script>  
 $(document).ready(function(){
    $('#dodaj').click(function(){  
           $('#dodaj').val("dodaj");  
           $('#korisnik_form')[0].reset();  
    }); 
    $(document).on('click', '.editKorisnika', function(){  
        var id = $(this).attr("id");  
        $.ajax({  
            url:"korisnik/dobavi.php",  
            method:"POST",  
            data:{id:id},  
            dataType:"json",  
            success:function(data){  
                  $('#id').val(data.ID);
                  $('#ime').val(data.Ime);  
                  $('#prezime').val(data.Prezime);  
                  $('#korisnickoIme').val(data.KorisnickoIme);  
                  $('#email').val(data.Email);  
                  $('#tipKorisnika').val(data.TipKorisnika);  
                  $('#Korisnik_Modal').modal('show');  
            }  
        });  
    });
    $(document).on('click', '.editKategorije', function(){  
        var id = $(this).attr("id");  
        $.ajax({  
            url:"kategorija/dobavi.php",  
            method:"POST",  
            data:{id:id},  
            dataType:"json",  
            success:function(data){  
                  $('#id').val(data.ID);
                  $('#naziv').val(data.Naziv);    
                  $('#Kategorija_Modal').modal('show');  
            }  
        });  
    });
    $(document).on('click', '.editProizvoda', function(){  
        var id = $(this).attr("id");  
        $.ajax({  
            url:"proizvod/dobavi.php",  
            method:"POST",  
            data:{id:id},  
            dataType:"json",  
            success:function(data){  
                  $('#id').val(data.ID);
                  $('#naziv').val(data.Naziv);    
                  $('#kategorija').val(data.Kategorija);  
                  $('#kratkiOpis').val(data.KratkiOpis);  
                  $('#cijena').val(data.Cijena);  
                  $('#Proizvod_Modal').modal('show');  
            }  
        });  
    });
    $('#korisnik_form').on("submit", function(event){  
        event.preventDefault();  
        
        $.ajax({  
            url:"korisnik/dodaj.php",  
            method:"POST",  
            data:$('#korisnik_form').serialize(),  
            beforeSend:function(){  
                $('#dodaj').val("Spremanje");  
            },  
            success:function(data){  
                $('#korisnik_form')[0].reset();  
                $('#Korisnik_Modal').modal('hide');
                location.reload(); 
            }  
        });  
    });
    $('#kategorija_form').on("submit", function(event){  
        event.preventDefault();  
        
        $.ajax({  
            url:"kategorija/dodaj.php",  
            method:"POST",  
            data:$('#kategorija_form').serialize(),  
            beforeSend:function(){  
                $('#dodaj').val("Spremanje");  
            },  
            success:function(data){  
                $('#kategorija_form')[0].reset();  
                $('#Kategorija_Modal').modal('hide');
                location.reload(); 
            }  
        });  
    });
    $('#proizvod_form').on("submit", function(event){  
        event.preventDefault();  
        
        $.ajax({  
            url:"proizvod/dodaj.php",  
            method:"POST",  
            data:new FormData (this),
            processData: false,
            contentType: false,
            beforeSend:function(){  
                $('#dodaj').val("Spremanje");  
            },  
            success:function(data){  
                $('#proizvod_form')[0].reset();  
                $('#Proizvod_Modal').modal('hide');
                location.reload(); 
            }  
        });  
    });
  }); 
</script>