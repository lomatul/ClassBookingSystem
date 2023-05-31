<?php
      require 'config.php';
      session_start();
      $TID=$_SESSION["ID"];
      $sqlname="SELECT * From teacher WHERE ID='$TID'";
      $resultname=mysqli_query($conn, $sqlname);
      $rowName=mysqli_fetch_array($resultname);
      $name=$rowName['Name'];
      $query="SELECT * FROM booking_request WHERE teacher_ID='$TID' AND approved IS NULL";
      $result=mysqli_query($conn, $query);
      if(mysqli_num_rows($result)>0){
        $check=true;
      }else{
        $check=false;
        echo "<script> alert('No result found'); </script> ";
      }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>

  <link rel="stylesheet" href="./assets/css/table.css">
  <link rel="stylesheet" href="./assets/css/nav.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
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
          <h2><?php echo $name ?></h2>
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
        <a href="logout.php" class="sub-menu-link">
          <img src="./assets/images/logout.png">
          <p>Log Out</p>
          <span></span>
        </a>
      </div>
    </div>
  </nav>

    <main class="table">
        <section class="table__header">
            <h1>Pending Request's</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="./assets/images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Day<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Slot <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Room NO <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                      </tr>
                </thead>
                <tbody>
                <?php
          while($rows=$result->fetch_assoc()){
            $ID=$rows['booking_ID'];
            $sqlb="SELECT * FROM booking WHERE booking_ID=$ID";
            $resultB=mysqli_query($conn, $sqlb);
            $rowB=mysqli_fetch_array($resultB);
            $slotID=$rowB['Slot_ID'];
            $sqlS="SELECT * FROM slot WHERE Slot_ID='$slotID'";
            $resultS=mysqli_query($conn, $sqlS);
            $rowS=mysqli_fetch_array($resultS);
            $classID=$rowB['classroom_ID'];
            $sqlC="SELECT * FROM classroom WHERE classroom_ID='$classID'";
            $resultC=mysqli_query($conn, $sqlC);
            $rowC=mysqli_fetch_array($resultC);
          ?>

       <tr>
            <td><?php echo $rowB['Day'] ?></td>
            <td><?php echo date("h:i A", strtotime($rowS['Start_time']))." - ".date("h:i A", strtotime($rowS['End_time']))?></td>
            <td><?php echo $rowC['Room_No']?></td>
            <td>
              <button type="submit" class="btnA" onclick="toggleButtonVisibility(this); redirectToPage(<?php echo $ID ?>, 1)">Approved</button>
              <button type="submit" class="btnR" onclick="toggleButtonVisibility(this); redirectToPage(<?php echo $ID ?>, 0)">Reject</button>
            </td>
          </tr>
          <?php } ?>
         
             
                   
                    
                </tbody>
            </table>
        </section>
    </main>

    <script src="./assets/js/Table.js"></script>

    
<script>

let subMenu = document.getElementById("subMenu");

function toggleMenu() {
  subMenu.classList.toggle("open-menu");
}

function redirectToPage(value1, value2) {
  window.location.href = "requests_handle.php?id=" + value1 + "&action=" + value2;
}

function toggleButtonVisibility(button) {
  var siblingButton = button.parentElement.querySelector(button.classList.contains("btnA") ? ".btnR" : ".btnA");
  siblingButton.style.display = siblingButton.style.display === "none" ? "block" : "none";
  button.disabled = true;
}


  </script>
</body>
</html>
