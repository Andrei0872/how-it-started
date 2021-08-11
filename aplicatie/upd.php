<?php
// including the database connection file
include_once("db/Crud.php");
 
$crud = new Crud();

 
if(isset($_POST['update']))
{    
    $id = $crud->escape_string($_POST['id']);
    
    $g1 = $crud->escape_string($_POST['name']);
    $g2 = $crud->escape_string($_POST['email']);
    $g3 = $crud->escape_string($_POST['mobile']);
    
   
        $result =$crud->execute("UPDATE friends SET name ='$g1', email= '$g2', mobile ='$g3' WHERE id =$id;");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    
}
?>

