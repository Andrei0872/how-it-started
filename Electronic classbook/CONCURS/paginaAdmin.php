<?php

session_start();

$_SESSION['noua'] = '9';
$_SESSION['zece'] = '10';
$_SESSION['unspe'] = '11';
$_SESSION['doispe'] = '12';
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-dropdown-click {

position:relative;
}

.w3-dropdown-content {

position:absolute;
left: 94%;
top: 8px;
z-index: 4;
}


.w3-bar-item:hover {

background: initial;

}

.w3-button:hover > div {
  display: block;
}
#overlay {
  position: fixed;
  display: none;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0);
    z-index: 2;
    cursor: pointer;
}
.w3-container {
  z-index: 5;
}
</style>

<!-- adaugam culoare body ului  class="w3-orange" -->
<body class="w3-light-grey" style="z-index:-1;">  


<!-- Top container  -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
      <div class="w3-bar-item w3-right"><span>Welcome, <strong>Mike</strong></span><br></div>
</div>

<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Optiunile mele</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    	
    	<div class="w3-quarter">
      	<div class="w3-container w3-red w3-padding-16">
        		 <div class="w3-dropdown-click">
        		<button onclick="myFunction('Demo')" class="w3-button w3-black w3-hover-green">Profesori</button>
		   <div id="Demo" class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
		     <a href="#" class=" w3-button w3-opacity">Clasa a IX-a (A...F)</a>
		     <a href="#" class=" w3-button w3-opacity">Clasa a X-a (A...F)</a>
		     <a href="#" class=" w3-button w3-opacity">Clasa a XI-a (A...F)</a>
		     <a href="#" class=" w3-button w3-opacity">Clasa a XII-a (A...F)</a>
		   </div>
     	</div>
    	    </div>
    	</div>
    
    <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
       	
       	<!-- <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div> -->
			   
      <div class="w3-dropdown-click">
        <button onclick="myFunction('Demo2')"  class="w3-button w3-red">Elevi</button>
        <div id="Demo2" class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
          <a href="cls9.php?tip=<?php echo $_SESSION['noua'];?>" class="w3-bar-item w3-button w3-opacity">Clasa a IX-a (A...F)</a>
          <a href="cls9.php?tip=<?php echo $_SESSION['zece']; ?>" class="w3-bar-item w3-button w3-opacity">Clasa a X-a (A...F)</a>
          <a href="cls9.php?tip=<?php echo $_SESSION['unspe']; ?>" class="w3-bar-item w3-button w3-opacity">Clasa a XI-a (A...F)</a>
          <a href="cls9.php?tip=<?php echo $_SESSION['doispe']; ?>" class="w3-bar-item w3-button w3-opacity">Clasa a XII-a (A...F)</a>
      </div>
</div>
       </div>
    </div>
    
    
    
    <div class="w3-quarter">
      	<div class="w3-container w3-teal w3-padding-16">
        		<div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
			   <div class="w3-right">
				<h3>23</h3>
			   </div>
        		<div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div>
    </div>
    
    
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>


</div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
    
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Countries</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>w3_open
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div> 
    </div>
  </div>    

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>



</body>
</html>

