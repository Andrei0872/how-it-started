<?php

include_once("db/Crud.php");

$crud = new Crud();

$nr = $crud->escape_string($_GET['id']);

$result =  $crud->getData("SELECT * FROM friends WHERE `id`=$nr");
foreach($result as $res) {
	$unu = $res['name'];
	$doi = $res['email'];
	$trei = $res['mobile'];

}

?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2> Inregistrarea numarul <?php echo $nr; ?></h2>

  <div class="w3-card-4 w3-display-middle" style="width:70%">
    <header class="w3-container w3-light-grey">
      <h3>
      
      	<?php
      		echo $unu;
      	?>
      </h3>
    </header>
    <div class="w3-container">
      <p>1 new friend request</p>
      <hr>
      <img src="man-head.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
    </div>
    <button class="w3-button w3-block w3-dark-grey">+ Connect</button>
  </div>
</div>

</body>
</html>

