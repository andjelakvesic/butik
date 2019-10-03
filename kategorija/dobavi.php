<?php  
 
    include('../db_oo.php'); 
    
    if(isset($_POST["id"]))  
    {  
        $sql = "SELECT * FROM kategorije WHERE ID = '".$_POST["id"]."'";  

        $result = $conn->query($sql);  

        $row = $result->fetch_assoc(); 

        echo json_encode($row);  
    }
    
 ?>