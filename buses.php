<?php
include("./include.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Buses</title>
        <link rel="stylesheet" href="{% static 'about.css' %}" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="icon" href="{% static 'PICO-LOGO-SHORT.png' %}" type="image/gif">
        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif, sans-serif};
            </style>
            
    </head>
    <body>
        
    <header class="header" id="home" >
            <br><br><br>
            <h1><br>Beirut By Bus<br></h1><br>
                <form action="" method="GET" name="myform">
                    <input type="search" placeholder="Where To?..." class="input" name="k" autocomplete="off">
                    <button type="submit" name=""></button>
                </form>
                <div class="results" style="margin-left:auto;margin-right:auto;max-width:650px" >
                <?php 
                //CHECKS TO SEE IF KEYWORDS WERE ENTERED
                if (isset($_GET['k']) && $_GET['k'] != ''){
                  //saves keywords
                  $k = trim($_GET['k']);
                  //create a base query and words string
                  $query_string="SELECT * FROM mydata WHERE ";
                  $display_words = "";
                  //adds keywords into array and separates them by space
                  $keywords = explode(' ',$k);
                  foreach($keywords as $word){
                    $query_string .=" keywords LIKE '%".$word."%' OR ";
                    $display_words .=$word." ";
                  }
                  $query_string = substr($query_string, 0, strlen($query_string) - 3);
                  //connect to database
                  $conn= mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
                  $query = mysqli_query($conn,$query_string);
                  $result_count=mysqli_num_rows($query);

                  //check if results were returned
                  if($result_count>0){
                    //display counter
                    echo '<b><u>'.$result_count.'</u></b> results found. ';
                    echo'Buses that stop by <i>'.$display_words.'</i>:';
                    echo '<table style="margin-left:auto;margin-right:auto;">';
                    while($row = mysqli_fetch_assoc($query)){
                        echo '<tr style="color:white;">
                        
                        <td ><a href='.$row['url'].' style="color:white;"><br><h2>Bus '.$row['id'].' ('.$row['sum'].')</h2></a></td>
                        
                        </tr>';
                    }
                    echo '<tr style="color:white;">
                    <td><i><br>[Click on Bus for more info]</i></td>
                    
                    </tr>
                    
                    </table>';
                    //display results

                   }
                   else{
                    echo 'Zero Results Found.';
                    echo '<br>Click <a href="buses.php#buses">here</a> for complete bus list';
                }
                }
                else{
                    echo '';
                }
                ?>
              </div>
                <br><br><br><br><br><br>
            </header>
        <div id="navbar">
            <a href="BeirutBusRoutes.php#home">Home</a>
            <a href="BeirutBusRoutes.php#map">Map</a>
            <a href="#buses">Buses</a>
            <a href="about.php#about">About</a>
          </div>
          <br><br><br>
          <div class="buses" id="buses">
            <h1 style="padding-left: 50px;">Buses:</h1>
            <div class="content">

	<ul class="team">
		<li class="member" id="bus15"  style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\CornicheArialView.jpg"></div>
			<div class="description">
				<h3>Bus 15</h3>
				<p>Distance :17 KM <br>Estimated Time :01:40:00 <br>Timings:6am-8pm<br><a>price: 70,000 L.L.</a></p>
			</div>
		</li>
		<li class="member" id="bus12"  style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\DownTownjpeg.jpeg"></div>
			<div class="description">
				<h3>Bus 12</h3>
				<p>Distance :8 KM <br>Estimated Time :01:30:00 <br>Timings: 5am-7pm<br><a>price:50,000 L.L.</a></p>
			</div>
		</li>
		<li class="member" id="bus2"  style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\MartyrSquare.jpg"></div>
			<div class="description">
				<h3>Bus 2</h3>
				<p>Distance :10 KM <br>Estimated Time :01:30:00 <br>Timings: 5am-7pm<br><a>price:60,000 L.L.</a></p>
			</div>
		</li>
		<li class="member" id="bus6" style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\roundabout.jpg"></div>
			<div class="description">
				<h3>Bus 6</h3>
        <p>Distance :19 KM <br>Estimated Time :01:20:00 <br>Timings: 5am-7pm<br><a>price:50,000 L.L.</a></p>			</div>
		</li>
		<li class="member" id="bus9" style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\stairs.jpg"></div>
			<div class="description">
				<h3>Bus 9</h3>
        <p>Distance :10 KM <br>Estimated Time :01:00:00 <br>Timings: 5am-11pm<br><a>price:40,000 L.L.</a></p>			</div>
		</li>
		<li class="member" id="bus22" style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\port.jpg"></div>
			<div class="description">
				<h3>Bus 22</h3>
        <p>Distance :13 KM <br>Estimated Time :00:50:00 <br>Timings: 6am-6pm<br><a>price:70,000 L.L.</a></p>			</div>
		</li>
		<li class="member" id="bus16" style="margin-right:auto;margin-left:auto;width:100%">
			<div class="thumb"><img src="images\corniche.jpg"></div>
			<div class="description">
				<h3>Bus 35</h3>
        <p>Distance :8 KM <br>Estimated Time :01:15:00 <br>Timings: 5am-9pm<br><a>price:150,000 L.L.</a></p>			</div>
		</li>
	</ul>

  </div>
            <br><br>
            <br><br>
</div>
<br>
<footer>
    <div class="content">
      <div class="top">
        <div class="logo-details">
          <span class="logo_name">Beirut By Bus</span>
        </div>
        <div class="media-icons">
          <a target="on_blank" href="https://www.facebook.com/BusMapProject/"><i class="fab fa-facebook"></i></a>
          <a target="on_blank" href="https://www.instagram.com/busmapproject/?hl=en"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="link-boxes">
        <ul class="box">
          <li class="link_name">Links</li>
          <li><a href="BeirutBusRoutes.php">Home</a></li>
          <li><a href="about.php#about">About Us</a></li>
          <li><a href="BeirutBusRoutes.php#map">Map</a></li>
          <li><a href="BeirutBusRoutes.php#buses">Buses</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Contact</li>
          <li><a target="on_blank" href="tel:+123456789">+123456789</a></li>
          <li><a target="on_blank" href="mailto:'beirutbybus@gmail.com'">beirutbybus@gmail.com</a></li>
        </ul>
        <ul class="box">
          
        </ul>
        <ul class="box">
          
        </ul>
      </div>
    </div>

    <div class="bottom-details">
      <div class="bottom_text">
        <span class="copyright_text">By Karen & Chaza © 2023 <a href="#">:)</a></span>
      </div>
    </div>
  </footer>
  <!-- ---------------------------------------------------------------------------------------- -->

  <script type="text/javascript">
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
      } else {
      navbar.classList.remove("sticky");
      }
    }
          </script>
    </body>
</html>