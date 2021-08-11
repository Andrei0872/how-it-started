<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <title>Aplicatie NIR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- css manual -->
  <link rel="stylesheet" href="styles/style.css">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    a,li {
      outline: none;
    }
  </style>
</head>
<body ng-controller="mainCtrl" >

<!-- Loading screen..  -->
<!-- wrapper ul pt loader -->
<div ng-show="loading" class="loadingWrapper">
  <!-- wrapper pt elementele loader ului -->
  <div class='loader'>
    <!-- elementele loader ului -->
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<div ng-show="!loading">
<!-- End of loading screen -->
<!--//* navbar pt ecrane mici  -->
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
  <!-- header ul -->
    <div class="navbar-header">
    <!-- butonul hamburger -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button> <!--end of hamburger -->
    </div> <!-- end of navbar-header-->

  <!-- elementele navbar ului -->
  <!-- id ul corespunde cu "data-target" de la buton -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="#/dashboard">Dashboardd</a></li>
        <li><a href="#/furnizori">Furnizori</a></li>
        <li><a href="#/produse">Produse</a></li>
        <li data-placement="right" data-toggle="tooltip" title="TVA si Adaos"><a href="#/taxe">Taxe</a></li>
        <li><a href="#/comenzi">Comenzi</a></li> 
        <li><a href="#/documente">Documente</a></li> 
      </ul>
    </div> <!--end of collapse-->
  </div> <!--end of container-fluid-->
</nav> <!--end of nav-->

<div class="container-fluid"  ng-cloak >
  <div class="row content">
    <div class="col-sm-2 col-md-2 sidenav hidden-xs">
      <h2>icon</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#/dashboard">Dashboard</a></li>
        <li><a href="#/furnizori">Furnizori</a></li>
        <li><a href="#/produse">Produse</a></li>
        <li data-placement="right" data-toggle="tooltip" title="TVA si Adaos"><a href="#/taxe">Taxe</a></li>
        <li><a href="#/comenzi">Comenzi</a></li>
        <li><a href="#/documente">Documente</a></li> 
      </ul><br>
    </div>
  <!-- ng-view - pt angular routing. in acest main se va regasi continutul dinamic paginilor, pagini care pot fi selectate din navbar  -->
  <main ng-view class="col-sm-10 col-md-10"></main>
    <br>
    </div>
  </div>
  </div>
<!-- includem scripturile  -->
<!-- pentru Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- pentru AngularJs  -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-messages.js"></script>
<!-- scripturile mele -->
<script src="scripturi/app.js"></script>
<script src="scripturi/config.js"></script>
<script src="scripturi/ptProduse.js"></script>
</body>
</html>
