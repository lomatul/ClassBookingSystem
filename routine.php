<?php
  require 'config.php';
  
  $mapM=array(
    '01'=>false,'02'=>false,'03'=>false,'04'=>false,'05'=>false,'06'=>false
  );
  $sqlM="SELECT * FROM booking WHERE Day='Monday'";
  $resultM=mysqli_query($conn, $sqlM);
    if(mysqli_num_rows($resultM)>0){
      while($rowsM=$resultM->fetch_assoc()){
        $keyv=$rowsM['Slot_ID'];
        $mapM[$keyv]=true;
      }
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

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/routine.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

                <a href="profileS.php" class="sub-menu-link">
                  <img src="./assets/images/profile.png">
                  <p>Show profile</p>
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

                <a href="LogOUT.php" class="sub-menu-link">
                  <img src="./assets/images/logout.png">
                  <p>Log Out</p>
                  <span></span>
                </a>

            </div>
        </div>
    </nav>

    <div class="About">
  
      <ul>
        <h1>
            Class Routine
          </h1>
            <h3>Room No 302</h3>
         

           </ul>
     
           <table>


            <tr class="row">
              <th>Days</th>
              <th>8:00 - 9:15</th>
              <th>9:15-10.30</th>
              <th>10:30-11:45</th>
              <th>11:45-1:00</th>
              <th> Break Time </th>
              <th>2:30-3:45</th>
              <th>3:45-5:00</th>
            </tr>
        
        
            <tr>
            <td>Monday</td>
            <?php
            if($mapM['01']){?> 
            <td class="booked">This is booked</td><?php }
            else{ ?>
            <td class="not-booked">This is Not booked</td> <?php } ?>
            <?php
            if($mapM['02']){?> 
            <td class="booked">This is booked</td><?php }
            else{ ?>
            <td class="not-booked">This is Not booked</td> <?php } ?>
            <?php
            if($mapM['03']){?> 
            <td class="booked">This is booked</td><?php }
            else{ ?>
            <td class="not-booked">This is Not booked</td> <?php } ?>
            <?php
            if($mapM['04']){?> 
            <td class="booked">This is booked</td><?php }
            else{ ?>
            <td class="not-booked">This is Not booked</td> <?php } ?>
            <td></td>
            <?php
            if($mapM['05']){?> 
            <td class="booked">This is booked</td><?php }
            else{ ?>
            <td class="not-booked">This is Not booked</td> <?php } ?>
            <?php
            if($mapM['06']){?> 
            <td class="booked">This is booked</td><?php }
            else{ ?>
            <td class="not-booked">This is Not booked</td> <?php } ?>
            
            </tr>
            
            <tr>
              <td>Tuesday</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
        
              <tr>
                <td>Wednesday</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
        
        
              <tr>
                  <td>Thursday</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
        
        
              <tr>
                    <td>Friday</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
              </tr>
        
          </table>

        
  </div>

  
</div>

<script src="./assets/js/script.js"></script>

<!-- 
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
  let subMenu = document.getElementById("subMenu");

  function toggleMenu()
  {
    subMenu.classList.toggle("open-menu");
  }
</script>

</body>
</html>