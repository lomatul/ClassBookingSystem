<?php
  require 'config.php';
  session_start();
  $SID=$_SESSION["ID"];
  $ID=$_GET['tag'];
  $sqlname="SELECT * From cr WHERE ID='$SID'";
  $resultname=mysqli_query($conn, $sqlname);
  $rowName=mysqli_fetch_array($resultname);
  $name=$rowName['Name'];
  //Monday
  $mapM=array(
    '01'=>true,'02'=>true,'03'=>true,'04'=>true,'05'=>true,'06'=>true
  );
  $mapMpend=array(
    '01'=>false,'02'=>false,'03'=>false,'04'=>false,'05'=>false,'06'=>false
  );
  $mapIDM=array(
    '01'=>NULL,'02'=>NULL,'03'=>NULL,'04'=>NULL,'05'=>NULL,'06'=>NULL
  );
  $sqlM="SELECT * FROM booking WHERE classroom_ID=$ID AND Day='Monday' AND booking_ID NOT IN (SELECT booking_ID FROM booked)";
  $resultM=mysqli_query($conn, $sqlM);
    if(mysqli_num_rows($resultM)>0){
      while($rowsM=$resultM->fetch_assoc()){
        $keyv=$rowsM['Slot_ID'];
        $BookingID=$rowsM['booking_ID'];
        $mapM[$keyv]=false;
        $mapIDM[$keyv]=$BookingID;
        $sqlRM="SELECT * FROM booking_request WHERE booking_ID=$BookingID AND approved IS NULL";
        $resultRM=mysqli_query($conn, $sqlRM);
        if(mysqli_num_rows($resultRM)>0){
          $mapMpend[$keyv]=true;
        }else{
          $mapMpend[$keyv]=false;
        }
        
      }
    }

    //Teusday
    $mapT=array(
      '01'=>true,'02'=>true,'03'=>true,'04'=>true,'05'=>true,'06'=>true
    );
    $mapTpend=array(
      '01'=>false,'02'=>false,'03'=>false,'04'=>false,'05'=>false,'06'=>false
    );
    $mapIDT=array(
      '01'=>NULL,'02'=>NULL,'03'=>NULL,'04'=>NULL,'05'=>NULL,'06'=>NULL
    );
    $sqlT="SELECT * FROM booking WHERE classroom_ID=$ID AND Day='Tuesday' AND booking_ID NOT IN (SELECT booking_ID FROM booked)";
    $resultT=mysqli_query($conn, $sqlT);
      if(mysqli_num_rows($resultT)>0){
        while($rowsT=$resultT->fetch_assoc()){
          $keyvT=$rowsT['Slot_ID'];
          $BookingIDT=$rowsT['booking_ID'];
          $mapT[$keyvT]=false;
          $mapIDT[$keyvT]=$BookingIDT;
          $sqlRT="SELECT * FROM booking_request WHERE booking_ID=$BookingIDT AND approved IS NULL";
          $resultRT=mysqli_query($conn, $sqlRT);
          if(mysqli_num_rows($resultRT)>0){
            $mapTpend[$keyvT]=true;
          }else{
            $mapTpend[$keyvT]=false;
          }
          
        }
      }
      //Wednesday
      $mapW=array(
        '01'=>true,'02'=>true,'03'=>true,'04'=>true,'05'=>true,'06'=>true
      );
      $mapWpend=array(
        '01'=>false,'02'=>false,'03'=>false,'04'=>false,'05'=>false,'06'=>false
      );
      $mapIDW=array(
        '01'=>NULL,'02'=>NULL,'03'=>NULL,'04'=>NULL,'05'=>NULL,'06'=>NULL
      );
      $sqlW="SELECT * FROM booking WHERE classroom_ID=$ID AND Day='Wednesday' AND booking_ID NOT IN (SELECT booking_ID FROM booked)";
      $resultW=mysqli_query($conn, $sqlW);
        if(mysqli_num_rows($resultW)>0){
          while($rowsW=$resultW->fetch_assoc()){
            $keyv=$rowsW['Slot_ID'];
            $BookingID=$rowsW['booking_ID'];
            $mapW[$keyv]=false;
            $mapIDW[$keyv]=$BookingID;
            $sqlRW="SELECT * FROM booking_request WHERE booking_ID=$BookingID AND approved IS NULL";
            $resultRW=mysqli_query($conn, $sqlRW);
            if(mysqli_num_rows($resultRW)>0){
              $mapWpend[$keyv]=true;
            }else{
              $mapWpend[$keyv]=false;
            }
            
          }
        }
        //Thursday
        $mapTh=array(
          '01'=>true,'02'=>true,'03'=>true,'04'=>true,'05'=>true,'06'=>true
        );
        $mapThpend=array(
          '01'=>false,'02'=>false,'03'=>false,'04'=>false,'05'=>false,'06'=>false
        );
        $mapIDTh=array(
          '01'=>NULL,'02'=>NULL,'03'=>NULL,'04'=>NULL,'05'=>NULL,'06'=>NULL
        );
        $sqlTh="SELECT * FROM booking WHERE classroom_ID=$ID AND Day='Thursday' AND booking_ID NOT IN (SELECT booking_ID FROM booked)";
        $resultTh=mysqli_query($conn, $sqlTh);
          if(mysqli_num_rows($resultTh)>0){
            while($rowsTh=$resultTh->fetch_assoc()){
              $keyv=$rowsTh['Slot_ID'];
              $BookingIDTh=$rowsTh['booking_ID'];
              $mapTh[$keyv]=false;
              $mapIDTh[$keyv]=$BookingIDTh;
              $sqlRTh="SELECT * FROM booking_request WHERE booking_ID=$BookingIDTh AND approved IS NULL";
              $resultRTh=mysqli_query($conn, $sqlRTh);
              if(mysqli_num_rows($resultRTh)>0){
                $mapThpend[$keyv]=true;
              }else{
                $mapThpend[$keyv]=false;
              }
              
            }
          }

          //Friday
          $mapF=array(
            '01'=>true,'02'=>true,'03'=>true,'04'=>true,'05'=>true,'06'=>true
          );
          $mapFpend=array(
            '01'=>false,'02'=>false,'03'=>false,'04'=>false,'05'=>false,'06'=>false
          );
          $mapIDF=array(
            '01'=>NULL,'02'=>NULL,'03'=>NULL,'04'=>NULL,'05'=>NULL,'06'=>NULL
          );
          $sqlF="SELECT * FROM booking WHERE classroom_ID=$ID AND Day='Friday' AND booking_ID NOT IN (SELECT booking_ID FROM booked)";
          $resultF=mysqli_query($conn, $sqlF);
            if(mysqli_num_rows($resultF)>0){
              while($rowsF=$resultF->fetch_assoc()){
                $keyv=$rowsF['Slot_ID'];
                $BookingIDF=$rowsF['booking_ID'];
                $mapF[$keyv]=false;
                $mapIDF[$keyv]=$BookingIDF;
                $sqlRF="SELECT * FROM booking_request WHERE booking_ID=$BookingIDF AND approved IS NULL";
                $resultRF=mysqli_query($conn, $sqlRF);
                if(mysqli_num_rows($resultRF)>0){
                  $mapFpend[$keyv]=true;
                }else{
                  $mapFpend[$keyv]=false;
                }
                
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
                    <h2><?php echo $name?></h2>
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
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapMpend['01']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is not Booked</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDM['01'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">No</button>
                    </div>
            </td> <?php } ?>

            <?php
            if($mapM['02']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapMpend['02']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2" >
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDM['02'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                  </div>
            </td> <?php } ?>

            <?php
            if($mapM['03']){?> 
              <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDM['03'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapM['04']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDM['04'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>

            <td></td>


            <?php
            if($mapM['05']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="submit" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDM['05'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapM['06']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDM['06'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td> <?php } ?>

            
            </tr>
      


            <tr>
                <td>Tuesday</td>
                <?php
            if($mapT['01']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapTpend['01']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is not Booked</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDT['01'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">No</button>
                    </div>
            </td> <?php } ?>

            <?php
            if($mapT['02']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapTpend['02']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2" >
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDT['02'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                  </div>
            </td> <?php } ?>

            <?php
            if($mapT['03']){?> 
              <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDT['03'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapT['04']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDT['04'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>

            <td></td>


            <?php
            if($mapT['05']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="submit" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDT['05'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapT['06']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDT['06'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td> <?php } ?>
                </tr>

  

              <tr>
                <td>Wednesday</td>
                <?php
            if($mapW['01']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapWpend['01']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is not Booked</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDW['01'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">No</button>
                    </div>
            </td> <?php } ?>

            <?php
            if($mapW['02']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapWpend['02']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2" >
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDW['02'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                  </div>
            </td> <?php } ?>

            <?php
            if($mapW['03']){?> 
              <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDW['03'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapW['04']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDW['04'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>

            <td></td>


            <?php
            if($mapW['05']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="submit" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDW['05'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapW['06']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDW['06'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td> <?php } ?>

                </tr>


              <tr>
                  <td>Thursday</td>
                  <?php
            if($mapTh['01']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapThpend['01']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is not Booked</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDTh['01'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">No</button>
                    </div>
            </td> <?php } ?>

            <?php
            if($mapTh['02']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapThpend['02']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2" >
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDTh['02'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                  </div>
            </td> <?php } ?>

            <?php
            if($mapTh['03']){?> 
              <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDTh['03'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapTh['04']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDTh['04'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>

            <td></td>


            <?php
            if($mapTh['05']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="submit" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDTh['05'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapTh['06']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDTh['06'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td> <?php } ?>

              </tr>



              <tr>
                    <td>Friday</td>
                    <?php
            if($mapF['01']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapFpend['01']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is not Booked</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDF['01'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">No</button>
                    </div>
            </td> <?php } ?>

            <?php
            if($mapF['02']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else if($mapFpend['02']){ ?>
                    <td class="booked">
                    <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class Booking is pending</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } 
                  else { ?>
                  <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2" >
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDF['02'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                  </div>
            </td> <?php } ?>

            <?php
            if($mapF['03']){?> 
              <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDF['03'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapF['04']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDF['04'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>

            <td></td>


            <?php
            if($mapF['05']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="submit" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDF['05'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td>  <?php } ?>


            <?php
            if($mapF['06']){?> 
            <td class="booked">
                  <button type="submit" class="btn" onclick="openPopup('popup1')">Submit</button>
                    <div class="PopUp" id="popup1">
                      <img src="./assets/images/booked.png" alt="">
                      <h2>This class  Booked</h2>
                      <button type="button" onclick="closePopup('popup1')">Okay</button>
                    </div>
                  </td>
                  <?php } else { ?>
                    <td class="not-booked">
                    <button type="submit" class="btn" onclick="openPopup('popup2')">Submit</button>
                    <div class="PopUp" id="popup2">
                      <img src="./assets/images/notbooked.png" alt="">
                      <h2>This class is Available</h2>
                      <p>Do you want to book the Class?</p>
                      <button type="button" onclick="redirectToPage(<?php echo $mapIDF['06'] ?>)" name="req">Yes</button>
                      <button type="button" onclick="closePopup('popup2')">N0</button>
                    </div>
            </td> <?php } ?>
                   
              </tr>
        
          </table>

        
  </div>

  
</div>


<script src="./assets/js/script.js"></script>
<script src="./assets/js/routine.js"></script>

<script>
  let subMenu = document.getElementById("subMenu");

  function toggleMenu()
  {
    subMenu.classList.toggle("open-menu");
  }
  function redirectToPage(value1) {
  window.location.href = "Bookingrequest.php?id="+value1;
  }
</script>


<script>
function openPopup(popupId) {
  let popup = document.getElementById(popupId);
  popup.classList.add("open-popup");

  // Disable buttons in the table
  let tableButtons = document.querySelectorAll("table button:not([onclick='openPopup()'])");
  tableButtons.forEach((button) => {
    button.disabled = true;
  });

  // Enable buttons within the popup
  let popupButtons = popup.querySelectorAll("button");
  popupButtons.forEach((button) => {
    button.disabled = false;
  });
}

function closePopup(popupId) {
  let popup = document.getElementById(popupId);
  popup.classList.remove("open-popup");

  // Enable buttons in the table
  let tableButtons = document.querySelectorAll("table button:not([onclick='openPopup()'])");
  tableButtons.forEach((button) => {
    button.disabled = false;
  });
}
</script>








</body>
</html>
