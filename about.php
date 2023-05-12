<?php
include("./include.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About us</title>
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
            <a href="BeirutBusRoutes.php">Home</a>
            <a href="BeirutBusRoutes.php#map">Map</a>
            <a href="BeirutBusRoutes.php#buses">Buses</a>
            <a href="#about">About</a>
          </div>
            <div class="company" id="about">
              <div class="img">
                <img src="bus.jpg" alt="" />
              </div>
              <div class="company-info">
                <span>TRANSPORT <span class="our">FOR EVERYONE</span></span>
                <br>
                <p>
                  <b>Beirut By Bus</b> is a university project born out of a lack of modern, updated information on the bus routes in Beirut. As broke 
                  university students, we understand the importance of cheap, accessible public transport and likewise, the importance of a platform which
                  provides everything you need to know to use said transport. We hope you find this website helpful.
                </p>
              </div>
            </div>
            <!-- ----------------------------------------footer------------------------------------------ -->
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
                    <li><a href="#about">About Us</a></li>
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

    </body>
</html>