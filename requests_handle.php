<?php
    require 'config.php';
    $bookingID=$_GET['id'];
    $action=$_GET['action'];
    if($action==1){
        $insert="INSERT INTO booked (booking_ID) VALUES ($bookingID)";
        $sql=mysqli_query($conn, $insert);
        $updt="UPDATE booking_request SET approved=1 WHERE booking_ID = $bookingID";
        $check=mysqli_query($conn, $updt);
        if($sql&&$check){ 
            echo
           "<script> alert('Request approved'); window.location.href='T_DashBoard.php'; </script> ";
          }else{
             echo 
             "<script> alert('Request approval failed'); window.location.href='T_DashBoard.php'; </script> ";
          }
    }else if($action==0){
        $updt="UPDATE booking_request SET approved=0 WHERE booking_ID = $bookingID";
        $check=mysqli_query($conn, $updt);
        if($check){ 
            echo
           "<script> alert('Request rejected'); window.location.href='T_DashBoard.php'; </script> ";
          }else{
             echo 
             "<script> alert('Request rejection failed'); window.location.href='T_DashBoard.php'; </script> ";
          }
    }
    
    echo
    "<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>";
?>


