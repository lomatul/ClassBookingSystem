<?php
require 'config.php';
$IDError1 =  false;
session_start();
if(isset($_POST['submitreg'])){
    $username=$_POST['name'];
    $ID=$_POST['Id'];
    $depertment=$_POST['dept'];
    $password=$_POST['pass'];

    $select1="SELECT * FROM teacher WHERE ID='$ID'";
    $result1=mysqli_query($conn, $select1);


    if(mysqli_num_rows($result1)>0){
        $IDError1 = true;
    }
    else{

        $hashpassword=password_hash($password, PASSWORD_DEFAULT);
        $insert= "INSERT INTO teacher (ID, Name, department, password) VALUES ('$ID','$username','$depertment','$hashpassword')";
        $sql=mysqli_query($conn, $insert);
        if($sql){
          echo 
          $_SESSION["ID"]=$ID;
          $_SESSION["type"]='T';
          echo
         "<script> alert('Registration Complete'); window.location.href='profileT.php'; </script> ";
        }else{
           echo 
           "<script> alert('Registration Failed'); </script> ";
        }
      
      }

    }

    $passError = $IDError = false;
    if(isset($_POST['submitlog'])){
        $ID=$_POST['Id'];
        $password=$_POST['pass'];
        $sql="SELECT * FROM teacher WHERE ID='$ID'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            if((password_verify($password, $row['password']))&&($row['ID']==$ID)){
                $_SESSION["ID"]=$row['ID'];
                $_SESSION["type"]='T';
                echo  
                "<script> alert('login done'); window.location.href='profileT.php'; </script> ";
            }else{
                $passError = true;
            }

        }else{
            $IDError = true;
        }

    }
    

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./assets/css/main.css">
    <meta charset="UTF-8">
    <script src="./assets/js/app.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Oswald:wght@300&family=Square+Peg&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>teacher login</title>
      </head>
        
      <body>
       <div class="box">
        <div class="form-box">
          <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()"> Login </button>
            <button type="button" class="toggle-btn"onclick="registration()"> Register </button>
        </div>
       

        <div class="social-icons">
          
        </div>
        <form id= "login" class="input-group" method="post">
          <input type="text" class="input-field" name="Id" id="Id" value="<?php echo isset($_POST['Id']) ? $_POST['Id'] : ''; ?>" placeholder="User ID" required>
          <?php if($IDError){?>
            <p class="error_message"> Wrong ID </p><?php } ?>
          <input type="password" class="input-field" name="pass" id="pass" placeholder="Enter Password" required>
          <?php if($passError){?>
            <p class="error_message"> Wrong Password </p><?php } ?>
          <input type="checkbox" class="check-box"><span>Remember Password</span>
          <h3>Haven't Register Yet ? Register Now</h3>
          
          <a href="profileT.php"><button type="submit" name="submitlog" class="submit-btn">Log In</button> </a>
        </form>


        <form id="registration" class="input-group" method="post">
          <input type="text" class="input-field" name="Id" id="Id" value="<?php echo isset($_POST['Id']) ? $_POST['Id'] : ''; ?>" placeholder="User ID" required>
          <?php if($IDError1){?>
            <p class="error_message"> ID already in use </p><?php } ?>
          <input type="text" class="input-field"  name="name" id ="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" placeholder="Name" required>
          <input type="text" class="input-field" name="dept" id="dept" value="<?php echo isset($_POST['dept']) ? $_POST['dept'] : ''; ?>" placeholder="Department" required>
          <input type="password" class="input-field" name="pass" id="pass" placeholder="Enter Password" required>
          <input type="checkbox" class="check-box"><span>I agree the terms and condition</span>
          <a href="profileT.php"><button type="submit"  name="submitreg" class="submit-btn">Log In</button> </a>
        </form>


      </div>
       </div>
      
     </body>
</html>
      