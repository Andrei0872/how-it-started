<?php
    include_once("db/Crud.php");
    $crud = new Crud();
    $nr = $crud -> escape_string($_GET['id']);
    $result = $crud -> execute("DELETE FROM `friends` WHERE `id` =$nr");
?>
<html>
    <script>
        var newUrl = "index.php";
        window.location.replace(newUrl);
    </script>
</html>