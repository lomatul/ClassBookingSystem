<?php
require 'config.php';
session_start();

$ID=$_SESSION["ID"];
$sql1="SELECT * From cr WHERE ID='$ID'";
$result1=mysqli_query($conn, $sql1);
$row=mysqli_fetch_array($result1);
$name=$row['Name'];

if (isset($_POST['search'])) {
    $tag = $_POST["searx"];
    header("location: routine.php?tag=$tag");
}

$sql2 = "SELECT * FROM booking_request br,booking b WHERE br.booking_ID = b.booking_ID AND br.cr_ID = '$ID' ORDER BY req_ID DESC LIMIT 3";
$result2=mysqli_query($conn, $sql2);

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
  <link rel="stylesheet" href="./assets/css/dashboard.css">

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
                    <h2><?php echo $name?></h2>
                </div>
                <hr>

                <a href="profileS.html" class="sub-menu-link">
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

                <a href="logout.php" class="sub-menu-link">
                  <img src="./assets/images/logout.png">
                  <p>Log Out</p>
                  <span></span>
                </a>

            </div>
        </div>
    </nav>

    <div class="About">
        
      <ul>
          <h3>Search Classroom for booking</h3>
          <form action="#" method="post">
            <div class="search">
                <input type="search" name= "searx" id="searx" placeholder="Search Room no">
                <button type="submit" name="search"><i class="fa fa-search icon-search"></i></button>
            </div>
          </form>
        </ul>
     
      <table>


          <tr class="row">
            <th>Date</th>
            <th>Slot</th>
            <th>Room No</th>
            <th>Approved/Rejected</th>
          </tr>

          <?php
            while($rows=$result2->fetch_assoc()){
          ?>
      
      
          <tr>
          <td><?php echo $rows['Day']; ?></td>
          <td><?php echo $rows['Slot_ID']; ?></td>
          <td><?php echo $rows['classroom_ID']; ?></td>
          <td><?php echo $rows['approved']; ?></td>
          </tr>
  
          <?php }
          ?>
        </table>

        
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
