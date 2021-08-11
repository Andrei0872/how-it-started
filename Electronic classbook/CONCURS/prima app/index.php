<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index-php-Bootstrap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h2> CRUD Friends index file </h2>
            </div>
            <div class="col-4"><img src="http://www.digitalprojection.com/wp-content/uploads/2014/11/dp-logo-for-s2.jpg" class="rounded" alt="qwerty" width="90%"></div>
            <div class="col-4"><a href="create.php" class="btn btn-primary"><sub><i class="material-icons">add_circle</i></sub><span class="lead">Add Friend</span></a></div>
        </div>
        <p>My friends are below:</p>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Email Address </th>
                    <th> Mobile Number </th>
                    <th> Add Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once("db/Crud.php");
                    $crud = new Crud();
                    $result = $crud->getData("SELECT * FROM friends ORDER BY id DESC");
                    foreach ($result as $key => $row) {
                        echo "<tr><td>";
                        echo $row['name'];
                        echo "</td><td>";
                        echo $row['email']; echo "</td><td>"; echo $row['mobile']; 
                        echo "</td><td>";
                        echo "<a href=\"read.php?id=".$row['id']."\" class=\"btn btn-info\"><sub><i class=\"material-icons\">format_color_text</i></sub><span class=\"lead\">Read</span></a>&nbsp;&nbsp;"; 
                        echo "<a href=\"update.php?id=".$row['id']."\" class=\"btn btn-success\"><sub><i class=\"material-icons\">settings</i></sub><span class=\"lead\">Update</span></a>&nbsp;&nbsp;"; 
                        echo "<button onclick=\"document.getElementById('id01').style.display='block'\" class=\"w3-button w3-red w3-round\"><sub><i class=\"material-icons\">highlight_off</i></sub><span class=\"lead\">Delete</span></button><div id=\"id01\" class=\"w3-modal\"><div class=\"w3-modal-content\"><br><div class=\"w3-container\"><p style=\"color:black;\">Are you sure you want to delete this friend?</p><a href=\"delete.php?id=".$row['id']."\" class=\"btn btn-danger\"><span class=\"lead\">Yes</span></a>&nbsp;&nbsp;<span onclick=\"document.getElementById('id01').style.display='none'\" style=\"color:black;\" class=\"w3-button w3-round\">No</span></div><br></div></div>"; 
                        echo "</td></tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>

</html>
