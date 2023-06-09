<?php
  require 'config.php';
  $currentDay = date("l");
  $currentTime = date("H:i");

  if($currentDay === "Monday" && $currentTime>"00:00" &&$currentTime<"00:15") {
    // Perform your desired actions for Sunday at midnight
    $dlt="DELETE FROM booked WHERE booking_ID IN (SELECT booking_ID FROM booking_request)";
    $check2=mysqli_query($conn, $dlt);
  }else {
    // Perform actions for other days or times
    // echo "It is not Sunday at midnight.";
  }
  session_start();
  if(!empty($_SESSION["ID"])){
      $check=false; 
      $ID=$_SESSION["ID"];
   
  }
  else{
      $check=true;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>

  <!-- 
    - favicon link
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <script type='text/javascript'>document.addEventListener('DOMContentLoaded', function () {window.setTimeout(document.querySelector('svg').classList.add('animated'),1000);})</script>

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header>

    <div class="container">

      
      <div class="navbar-wrapper">

        <button class="navbar-menu-btn" data-navbar-toggle-btn>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

          <ul class="navbar-list">

            <li class="nav-item">
              <a href="#home" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
              <a href="#hero1" class="nav-link">Review</a>
            </li>

            <li class="nav-item">
              <a href="#about" class="nav-link">Features</a>
            </li>

<!--          
            <li class="nav-item">
              <a href="login.php" class="nav-link">Sign in</a>
            </li> -->

            <li class="nav-item">
              <a href="contact.html" class="nav-link">Contact</a>
            </li>

          </ul>
                </nav>

      </div>

    </div>

  </header>





  <main>

    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 hero-title">The Class booking system</h1>

            <p class="hero-text">
              A practical web-based alternative to sprawling spreadsheets, cumbersome calendars and pieces of paper.
            </p>

            
          <?php if($check){ ?>
            <a href="loginT.php"> <button class="btn btn-primary" >Get Started as Teacher</button></a>

            <a href="loginS.php"> <button class="btn btn-primary" >Get Started as Student</button></a>

          <?php } else{
            if($_SESSION["type"]==='S'){?>
            <a href="profileS.php"> <button class="btn btn-primary" >Go TO PROFILE</button></a>
          <?php }
          else if($_SESSION["type"]==='T'){?>
          <a href="profileT.php"> <button class="btn btn-primary" >Go TO PROFILE</button></a>
          <?php }} ?>
          </div>

         

          <div class="hero-banner">
            <img id="gif-image" src="./assets/images/Classroom.gif" alt="shape" class="shape-content">
          </div>

        </div>


      </section>




      
      <!-- 
        - #FEATURES
      -->

      <section class="features" id="features">
        <div class="container">

          <h2 class="h2 section-title">Main objective of the Website</h2>

          <p class="section-text">
            This is a Classroom Booking System.
                As we all know, we have to shift our classes or have to allocate room for quizzes. But it isn't easy to find the free classrooms. So we are making a system where users can view all the classrooms within the institution and check which classrooms are free and which are booked.
                This is the main objective of this Website . 
          </p>


        </div>
      </section>





    




      <!-- 
        - #ABOUT
      -->

      <section class="about" id="about">
        <div class="container">

          <div class="about-top">

            <h2 class="h2 section-title">Our Features</h2>

            <p class="section-text">
              Classroombookings helps to keep your resource usage running smoothly.
            </p>

            <ul class="about-list">

              <li>
                <div class="about-card">
                  <div class="card-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/6051/6051683.png" alt="shape" >
                  </div>
                  <h3 class="h3 card-title">Easy to use</h3>
                  <p class="card-text">
                    The interface has been designed to make sure room availability status is clear and understandable at a glance.
                  </p>
                </div>
              </li>


              
              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/6373/6373999.png" alt="shape" >
                    

                  </div>

                  <h3 class="h3 card-title">Eliminate double bookings</h3>

                  <p class="card-text">
                    Each booking is tied to one person on a given day for the chosen period in the selected room. No clashes.

                  </p>

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/5212/5212389.png" alt="shape" >
                    

                  </div>

                  <h3 class="h3 card-title">Access anywhere</h3>

                  <p class="card-text">
                    Classroombookings is web-based, so a modern web browser and an internet connection are all you need.
                     </p>

                </div>
              </li>


              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/6241/6241506.png" alt="shape" >
                    

                  </div>
                  <h3 class="h3 card-title">Runs on your schedule</h3>

                  <p class="card-text">
                    One-week, two-week or any-number-of-week timetables are supported. Recurring bookings take place at the same time in the same room on the same week.    </p>

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/4823/4823813.png" alt="shape" >
                    

                  </div>

                  <h3 class="h3 card-title">Authentication</h3>

                  <p class="card-text">
                    Integrate with your local directory to allow users to log in with their existing account information.    </p>

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <img src="https://cdn-icons-png.flaticon.com/128/4823/4823620.png" alt="shape" >
                    
  </div>

                  <h3 class="h3 card-title">Custom fields</h3>

                  <p class="card-text">
                    Provide more details about your bookable resources by defining custom fields. Tell people about room capacity or the types of devices it contains.   </p>

                </div>
              </li>

            </ul>

          </div>

        
        </div>
      </section>


      <section class="hero1" id="hero1">
        <div class="hero1">
          <h1>
              Reviews
            </h1>
            <div class="container1">
              <div class="indicator1">
                  <span class="btn1 active"></span>
                  <span class="btn1"></span>
                  <span class="btn1"></span>
                  <span class="btn1"></span>
              </div>
              <div class="testimonial1">
              <div class="slide-row1" id="slide">
                  <div class="slide-col1">
                    <div class="user-text1">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde dolores ex harum mollitia incidunt dicta, esse omnis praesentium dolorem asperiores illum nesciunt autem facilis veniam porro officiis accusantium vero.</p>
                        <h3>Sarah</h3>
                    <p>Zara Inc.</p>
                  </div>
                    <div class="user-img1">
                      <img src="./assets/images/user-2.jpg" alt="">
        
                    </div>
                  </div>
        
                  <div class="slide-col1">
                    <div class="user-text1">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde dolores ex harum mollitia incidunt dicta, esse omnis praesentium dolorem asperiores illum nesciunt autem facilis veniam porro officiis accusantium vero.</p>
                        <h3>Sarah</h3>
                    <p>Zara Inc.</p>
                  </div>
                    <div class="user-img1">
                      <img src="./assets/images/user-3.jpg" alt="">
        
                    </div>
                  </div>
        
                  <div class="slide-col1">
                    <div class="user-text1">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde dolores ex harum mollitia incidunt dicta, esse omnis praesentium dolorem asperiores illum nesciunt autem facilis veniam porro officiis accusantium vero.</p>
                        <h3>Sarah</h3>
                    <p>Zara Inc.</p>
                  </div>
                    <div class="user-img1">
                      <img src="./assets/images/user-4.jpg" alt="">
        
                    </div>
                  </div>
        
                  <div class="slide-col1">
                    <div class="user-text1">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde dolores ex harum mollitia incidunt dicta, esse omnis praesentium dolorem asperiores illum nesciunt autem facilis veniam porro officiis accusantium vero.</p>
                        <h3>Sarah</h3>
                    <p>Zara Inc.</p>
                  </div>
                    <div class="user-img1">
                      <img src="./assets/images/user-5.jpg" alt="">
        
                    </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      
      
      </section>








    </article>

  </main>




  <!-- 
    - #FOOTER
  -->

  <footer>

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">
          <p class="footer-text">Follow us on</p>
          <ul class="social-list">
            <li>
              <a href="https://github.com" class="social-link">
                <ion-icon name="logo-github"></ion-icon>
              </a>
            </li>
            <li>
              <a href="https://instagram.com" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>
            <li>
              <a href="https://youtube.com" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>
            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-link-box">
          <ul class="footer-link-list">
            <li>
              <h3 class="h4 link-title">Company</h3>
            </li>
            <li>
              <a href="#features" class="footer-link">About Us</a>
            </li>
            <li>
              <a href="#about" class="footer-link">Features</a>
            </li>
          </ul>
          <ul class="footer-link-list">
            <li>
              <h3 class="h4 link-title">Contact</h3>
            </li>
            <li>
              <a href="#" class="footer-link">Help Center</a>
            </li>

            <li>
              <a href="contact.html" class="footer-link">Contact</a>
            </li>

          </ul>

          <ul class="footer-link-list">

            <li>
              <h3 class="h4 link-title">Resources</h3>
            </li>

            <li>
              <a href="#" class="footer-link">FAQ’S</a>
            </li>

            <li>
              <a href="#" class="footer-link">Testimonial</a>
            </li>

            <li>
              <a href="#" class="footer-link">Terms & Conditions</a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <p class="copyright">
        &copy; 2023 <a href="#">@BS3</a> All right reserved
      </p>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top active" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>