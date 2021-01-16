<!DOCTYPE html>
<html>
<title>Vuachon college's</title>
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
  background-image: url("picture/pic2.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->

  <div class="w3-row w3-padding w3-black">
  <a href="index.php" class="w3-button w3-black">Login</a>
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:90px">VuaChon College's</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT THE COLLEGE</span></h5>
    <p>Vuachon College's was established in 2020 by TonOak Foundation, which already ran Nursery, Primary and Secondary schools.</p>
    <p>The Bells Educational Foundation is owned by sir.Oak, the student of CPE KMUTT.</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>The quote of college: "8 Billion Smiles but yours is my No.1"</i></p>
      <p>Sir, developer and owner: Oak Natthakrit</p>
    </div>
    <img src="picture/pic1.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Location:</strong> Western Washington, covers some 2,100 square miles extending from the crest of the Cascade Range to Puget Sound</p>

  </div>
</div>

<!-- Menu Container -->
<div class="w3-container" id="menu">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Campus and College Representative</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'reputation');" id="myLink">
        <div class="w3-col s6 tablink">reputation</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'facility');">
        <div class="w3-col s6 tablink">facility</div>
      </a>
    </div>

    <div id="reputation" class="w3-container menu w3-padding-48 w3-card">
      <h5>The best college in the world</h5>
      <p class="w3-text-grey">10 years award the best college in the world, anouced by UNISCO.</p><br>
    
      <h5>Technology</h5>
      <p class="w3-text-grey">NO.1 of technology.</p><br>
    
      <h5>Education</h5>
      <p class="w3-text-grey">self-learning and online assignment is avoided, prefessor will teach what you want to know.</p><br>
    
      <h5>Professor</h5>
      <p class="w3-text-grey">10 year minimum require experience before acception.</p><br>
    
    </div>

    <div id="facility" class="w3-container menu w3-padding-48 w3-card">
      <h5>Internet</h5>
      <p class="w3-text-grey">Super high speed internet around the campus.</p><br>
    
      <h5>Building</h5>
      <p class="w3-text-grey">Air condition supportation and dust filterization.</p><br>
    
      <h5>Sport</h5>
      <p class="w3-text-grey">Every type of sport field.</p><br>
    
      <h5>Canteen</h5>
      <p class="w3-text-grey">Free meal, snack with dessert and beverage.(international food)</p><br>
    
    </div>  
    <img src="picture/pic3.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
  </div>
</div>

<!-- Contact/Area Container -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Contact US</span></h5>
    <p><strong>Email:</strong>  oakoakku@hotmail.com</p>
    <p><strong>Owner and developer:</strong> Oak Natthakrit Kulareerat </p>
    <div class="col-6 col-md-4 col-lg-3 mb-5 mb-md-6 px-4 px-lg-5">
      <div class="mb-3 p-1 d-flex square rounded-circle bg-blue-light aos-init" data-aos="flip-right" data-aos-duration="1000">
        <img src="picture/oak.jpg" style="width:200px">
      </div>
    <p><span class="w3-tag">FYI!</span> We offer full-service.</p>
    <p>Join us, we waiting for you!</p>
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
