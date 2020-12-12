<!DOCTYPE html>
<html>
<title>TrackHS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("https://image.shutterstock.com/z/stock-photo-empty-gurney-in-a-long-corridor-394445152.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-black">HOME</a>
    </div>
    <div class="w3-col s3">
        <a href="employee_index.php" class="w3-button w3-block w3-black">Employees</a>
    </div>
    <div class="w3-col s3">
      <a href="patients_index.php" class="w3-button w3-block w3-black">Patients</a>
    </div>
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">

  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:60px">Task<br>Hospital Services</span>
  </div>

</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="TrackkHS">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">TrackHS</span></h5>
    <p>TrackHS is the leading platform for all your data needs in the hospital environment. Here you can manage employees & patients as well as manage and view their data.</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Awarded the best Hospital Management Application."</i></p>
      <p>Prof Naranjo</p>

</div>

<!-- Menu Container -->
<div class="w3-container" id="Data">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Manage Employees & Patients</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Employees');" id="myLink">
        <div class="w3-col s6 tablink">Employees</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Patients');">
        <div class="w3-col s6 tablink">Patients</div>
      </a>
    </div>

    <div id="Excel" class="w3-container menu w3-padding-48 w3-card">
      <h5>Planning to put an Excel spreadsheet here for employee data</h5>
      <p class="w3-text-grey">excell here</p><br>
    </div>

    <div id="Branches" class="w3-container menu w3-padding-48 w3-card">
      <h5>This Area will have the Branch information in excell</h5>
      <p class="w3-text-grey">excell here</p><br>
    </div>  
    <img src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fblogs-images.forbes.com%2Frebeccaskilbeck%2Ffiles%2F2019%2F02%2FMaintianing-Motivation-in-employees-Blog-Graphic-1200x861.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
  </div>
</div>

<!-- End page content -->
</div>

<!-- Footer -->

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>

