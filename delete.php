<?php
include "config.php";
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $sql = "DELETE FROM userinfo WHERE id ='$id'";
    
     $result = $connection->query($sql);
    
     if ($result) {
        $msg = "The record deleted successfully";
        header("Location: index.php?msg=" . $msg);
    
    }else{
    
        echo "Error:" . $sql . "<br>" . $connection->error;
    
    }
    
    } 
    
    ?>
    

?>



