<?php
include("./include.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beirut By Bus</title>
        <link rel="stylesheet" href="{% static 'about.css' %}" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="icon" href="{% static 'PICO-LOGO-SHORT.png' %}" type="image/gif">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <style>
            body,h1,h2,h3,h4,h5,h6,a {font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif, sans-serif};
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
            <a href="#home">Home</a>
            <a href="#map">Map</a>
            <a href="buses.php#buses">Buses</a>
            <a href="about.php#about">About</a>
          </div>
          <div id="map">
            <br><br>
            <h1 style="padding-left: 50px;">Bus Map:</h1>
            <br><br>
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1RVHooV7HqkibdrW14rkU1xbj2fr2LZY&ehbc=2E312F" width="100%" height="80%" style="padding: 0 150px;border: none;"></iframe>
          </div>
            <br><br>
            <br>
            <div class="container mt-5" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif, sans-serif; color:white;background-color:#333; border-radius:10px">
        <h1>Feedback:</h1>
        <form class="row g-3" action="https://formsubmit.co/beirutbybus@gmail.com" method="POST">
          <!-- Honeypot -->
          <input type="text" name="_honey" style="display: none;">

          <!-- Disable Captcha -->
          <input type="hidden" name="_captcha" value="false">

          <input type="hidden" name="_next" value="https://haydn5.github.io/formsubmitdemo/success.html" >

          <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" name="name" id="firstName" required>
          </div>
          <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="Last&nbsp;Name" id="lastName" required>
          </div>
          <div class="col-md-8">
            <label for="emailInfo" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="emailInfo" required>
          </div>
          <div class="col-md-4">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="phoneNumber" placeholder="+1 (415) 867-5309">
          </div>
          <div class="col-md-12">
            <label for="comments" class="form-label">Comments, questions?</label>
            <textarea class="form-control" id="comments" name="comments,&nbsp;questions" rows="3" required></textarea>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary" style="background-color:white;color:#333">Submit</button>
          <br><br>
          </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
    <div>
      
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