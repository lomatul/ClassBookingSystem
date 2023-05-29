<?php
    require 'config.php';
    session_start();
    $bookingID=$_GET['id'];
    $teacher=$_GET['teacher'];
    $SID=$_SESSION["ID"];
    $sqlin="INSERT INTO booking_request (booking_ID, cr_ID, teacher_ID) VALUES ($bookingID, '$SID', '$teacher')";
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
      echo
      "<script>
      if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
      }
      </script>";
?>


