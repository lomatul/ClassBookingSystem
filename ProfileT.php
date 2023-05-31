<?php
  require 'config.php';
  session_start();
  if(!empty($_SESSION["ID"])){
      $check=true;
      
      $ID=$_SESSION["ID"];
      $sql="SELECT * From teacher WHERE ID='$ID'";
      $result=mysqli_query($conn, $sql);
      $rows=mysqli_fetch_array($result);
      $name=$rows['Name'];
       
      
  }
  else{
      $check=false;
      echo  
      "<script> alert('Login First'); window.location.href='loginT.php'; </script> ";
      
  }
  
?>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <img src="./assets/images/teacher.png" class="user-pic" onclick="toggleMenu()">
    
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="./assets/images/teacher.png" alt="">
                        <h2><?php echo $name ?></h2>
                    </div>
                    <hr>
    
                    <a href="T_DashBoard.php" class="sub-menu-link">
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
    
                    <a href="LogOUT" class="sub-menu-link">
                      <img src="./assets/images/logout.png">
                      <p>Log Out</p>
                      <span></span>
                    </a>
    
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="box">
            <?php if($check){ ?>
              <img src="./assets/images/teacher.png" alt="">
              <div class="details">
                <p>Name: <span><?php echo $name ?></span></p>
                <p>Teacher<span></span></p>
                <p>ID: <span><?php echo $rows['ID'] ?></span></p>
                <hr>
                <p>Department: <span><?php echo $rows['department'] ?></span></p>
                <hr>
              </div>
              <?php }else{
                echo  
                "<script> alert('Login First'); window.location.href='loginT.php'; </script> ";
              } ?>
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