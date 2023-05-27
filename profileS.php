<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="hero">
        <nav>
          
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <img src="./assets/images/user.png" class="user-pic" onclick="toggleMenu()">
    
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="./assets/images/user.png">
                        <h2>Lomatul Mahzabin</h2>
                    </div>
                    <hr>
    
                    <a href="S_DashBoard.html" class="sub-menu-link">
                      <img src="./assets/images/profile.png">
                      <p>Show Dashboard</p>
                      <span></span>
                    </a>
    
                    <a href="#" class="sub-menu-link">
                      <img src="./assets/images/setting.png">
                      <p>Settings and Privacy</p>
                      <span></span>
                    </a>
    
                    <a href="#" class="sub-menu-link">
                      <img src="./assets/images/help.png">
                      <p>Help and Support</p>
                      <span></span>
                    </a>
    
                    <a href="#" class="sub-menu-link">
                      <img src="./assets/images/logout.png">
                      <p>Log Out</p>
                      <span></span>
                    </a>
    
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="box">
              <img src="./assets/images/user.png" alt="">
              <div class="details">
                <p>Name: <span>Lomatul Mahzabin</span></p>
                <p>CR <span></span></p>
                <hr>
                <p>Student ID: <span>200042113</span></p>
                <hr>
                <p>Department: <span>Computer Science and Engineering</span></p>
                <hr>
                <p>Program: <span>Software Engineering</span></p>
                <hr>
                <p>Batch: <span>20</span></p>
                <hr>
              </div>
            </div>
          </div>
          
    </div>
    
<script>
    let subMenu = document.getElementById("subMenu");
  
    function toggleMenu()
    {
      subMenu.classList.toggle("open-menu");
    }
  </script>
</body>
</html>