<?php
    require 'config.php';
    session_start();
    $bookingID=$_GET['id'];
    $SID=$_SESSION["ID"];

    $query="SELECT * FROM teacher";
    $result=mysqli_query($conn, $query);
    if (isset($_POST['submit'])) {
        $selectedTeacherID = $_POST['selectedNummer'];
        $sqlin="INSERT INTO booking_request (booking_ID, cr_ID, teacher_ID) VALUES ($bookingID, '$SID', '$selectedTeacherID')";
        // $sqlin2="INSERT INTO booked (booking_ID) VALUES ($bookingID)"
        $sql=mysqli_query($conn, $sqlin);
        // $sqlbked=mysqli_query($conn, $sqlin2);
        if($sql){ 
            echo
            "<script> alert('Request Sent'); window.location.href='routine.php'; </script> ";
        }else{
            echo 
            "<script> alert('Request failed'); window.location.href='routine.php'; </script> ";
        }
            
            
            // You can retrieve other information about the selected teacher from the database using the ID if needed
            
        
    }
    
      echo
      "<script>
      if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
      }
      </script>";
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
  <link rel="stylesheet" href="./assets/css/Booking.css">

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
  <form method="POST">
  <div class="container">
    <h2>Select Your Teacher!</h2>
    <div class="dropdown">
      <div class="select">
        <span class="selected"></span>
        <div class="caret"></div>
       </div>
       <input type="hidden" id="selectedNummer" name="selectedNummer" />
       <ul class="menu" >
        <?php while($rows=$result->fetch_assoc()){?>
        <li data-value="<?php echo $rows['ID']; ?>"><?php echo $rows['Name']; ?></li> 
        <!-- <li class="active"></li> -->
        <!-- <li>value="<?php echo $rows['ID'] ?>"Teacher F</li> -->
        <?php } ?>
       </ul>
    </div>
    <button type="submit" name="submit">Submit</button>
  </div>
</form>
 
        
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="./assets/js/booking.js"></script>
</body>
</html>
