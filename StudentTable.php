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
    $sql3="SELECT * FROM classroom WHERE Room_No=$tag";
    $result3=mysqli_query($conn, $sql3);
    $row3=mysqli_fetch_array($result3);
    $CID=$row3['classroom_ID'];   
    header("location: routine.php?tag=$CID");
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

  <link rel="stylesheet" href="./assets/css/table.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

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
            while($rows=$result2->fetch_assoc()){
              $slotID=$rows['Slot_ID'];
              $sqlS="SELECT * FROM slot WHERE Slot_ID='$slotID'";
              $resultS=mysqli_query($conn, $sqlS);
              $rowS=mysqli_fetch_array($resultS);
              $classID=$rows['classroom_ID'];
              $sqlC="SELECT * FROM classroom WHERE classroom_ID='$classID'";
              $resultC=mysqli_query($conn, $sqlC);
              $rowC=mysqli_fetch_array($resultC);
          ?>
       <tr>
          <td><?php echo $rows['Day']; ?></td>
          <td><?php echo date("h:i A", strtotime($rowS['Start_time']))." - ".date("h:i A", strtotime($rowS['End_time']))?></td>
          <td><?php echo $rowC['Room_No']?></td>
          <td><?php if($rows['approved']==1){
                      echo "approved";
                }else if($rows['approved']==0){
                  echo "Rejected";
                }else {
                  echo "Pending";
                } ?></td>
          </tr>
  
          <?php }
          ?>
         
             
                   
                    
                </tbody>
            </table>
        </section>
    </main>

    <script src="./assets/js/Table.js"></script>

    
<script>
    let subMenu = document.getElementById("subMenu");
  
    function toggleMenu()
    {
      subMenu.classList.toggle("open-menu");
    }
    function redirectToPage(value1, value2) {
    window.location.href = "requests_handle.php?id="+value1+"&action="+value2;
    }
  
    
   function toggleButtonVisibility(button) {
      var siblingButton = button.parentElement.querySelector(button.classList.contains("btnA") ? ".btnR" : ".btnA");
      siblingButton.style.display = siblingButton.style.display === "none" ? "block" : "none";
      button.disabled = true;
    }
  </script>
</body>
</html>
