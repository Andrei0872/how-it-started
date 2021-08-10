<?php
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }
//obtinem id ul pt care vrem sa inseram 
include_once 'db/crud.php';
$id1 = $_GET['id'];
// echo $id;
$_SESSION['idElev'] = $id1;
$conn = new Crud(); //creez o noua instanta

$sql = "SELECT nume,prenume FROM elevi WHERE id=$id1";

$result = $conn->getData($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/note.css">
    <title>Inserare Note</title>
    <script>
   $( function() {
    $(document).find($(".datepicker")).datepicker({showOtherMonths: true,
      selectOtherMonths: true,
        dateFormat: "yy-mm-dd"});
  } );
    </script>
</head>
<body>
   <div class="w3-container w3-margin w3-padding w3-responsive">
       <h3 class="w3-center">Inserare note pentru elevul <span class="w3-text-green"><?php echo ucfirst($result[0]['nume']); echo " "; echo ucfirst($result[0]['prenume']);?></span></h3>
       <div ng-app="myApp" ng-controller="myCtrl">
           <form  id="add_form"> <!-- name pt serialize-->
               <label for="materie" class="w3-text-blue">Materia</label>
               <input type="text" style="cursor:pointer;" name="materie" id="materie" class="w3-input"  placeholder="Materie.." ng-model="mat" ng-keyup="complete(mat)" autocomplete="off" >
               <ul class="w3-ul w3-hoverable" ng-model="hideThis" ng-hide="hideThis"> <!-- ng-model pt ca vrem sa obtinem inf din app angular-->
                   <li ng-repeat="materie in filterMaterie" ng-click="fill(materie)">{{materie}}</li>
               </ul> 
               <div class="w3-container">
               <br><br>
               
            
               <table class="w3-table-all w3-hoverable " id="tabel">
               
               <tr>
                   <td style="width:25%;"><input style="width:100px;height:40px;" type="number" min="1" max="10"  class="w3-input materii" placeholder="Nota.."></td>
                   <td><input style="border:none;width:135px;height:40px;border-radius:20px;" class="dati datepicker" type="text"   placeholder="Date"></td>
                   <td style="width:25%"> <label class="check">
                            <input type="checkbox" class="checkInput"    > <span class="label-text">Teza</span>
                        </label>
                   </td>   
               </tr>
               </table>
               </div>
               <br><br>
               <input type="submit" id="submit" name="submit" class="w3-btn w3-blue w3-text-white w3-round-large" value="trimite">
                <span id="error_message" class="w3-text-red w3-center"></span>
                <span id="success_message" class="w3-text-green w3-center"></span>
            </form>
       </div>
   </div>
  <script src="scripturi/ang.js"></script>
  <script src="scripturi/upd.js"></script>
</body>
</html>
