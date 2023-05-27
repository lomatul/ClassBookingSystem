<?php
require 'config.php';
$IDError1 =  false;
session_start();
if(isset($_POST['submitreg'])){
    $username=$_POST['name'];
    $ID=$_POST['Id'];
    $section=$_POST['sec'];
    $depertment=$_POST['dept'];
    $Programe=$_POST['prog'];
    $Batch=$_POST['batch'];
    $password=$_POST['pass'];

    $select1="SELECT * FROM cr WHERE ID='$ID'";
    $result1=mysqli_query($conn, $select1);


    if(mysqli_num_rows($result1)>0){
        $IDError1 = true;
    }
    else{

        $hashpassword=password_hash($password, PASSWORD_DEFAULT);
        $insert= "INSERT INTO cr (ID, Name, Section, programe, department, Year, password) VALUES ('$ID','$username','$section','$Programe','$depertment','$Batch', '$hashpassword')";
        $sql=mysqli_query($conn, $insert);
        if($sql){ 
          $_SESSION["ID"]=$ID;
          echo
         "<script> alert('Registration Complete'); window.location.href='index.html'; </script> ";
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
        $sql="SELECT * FROM cr WHERE ID='$ID'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            if((password_verify($password, $row['password']))&&($row['ID']==$ID)){
                $_SESSION["ID"]=$row['ID'];
                echo  
                "<script> alert('login done'); window.location.href='index.html'; </script> ";
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
    <title> studentlogin</title>
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
          <button type="submit"  name="submitlog" class="submit-btn">Log In</button>
        </form>


        <form id="registration" class="input-group" method="post">
          <input type="text" class="input-field" name="Id" id="Id" value="<?php echo isset($_POST['Id']) ? $_POST['Id'] : ''; ?>" placeholder="User ID" required>
          <?php if($IDError1){?>
            <p class="error_message"> ID already in use </p><?php } ?>
          <input type="text" class="input-field" name="name" id ="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" placeholder="Name" required>
          <input type="text" class="input-field" name="sec" id="sec" value="<?php echo isset($_POST['sec']) ? $_POST['sec'] : ''; ?>" placeholder="Section" required>
          <input type="text" class="input-field" name="prog" id="prog" value="<?php echo isset($_POST['prog']) ? $_POST['prog'] : ''; ?>" placeholder="Programe" required>
          <input type="text" class="input-field" name="dept" id="dept" value="<?php echo isset($_POST['dept']) ? $_POST['dept'] : ''; ?>" placeholder="Department" required>
          <input type="number" class="input-field" name="batch" id="batch" value="<?php echo isset($_POST['batch']) ? $_POST['batch'] : ''; ?>" placeholder="Batch" required>
          <input type="password" class="input-field" name="pass" id="pass" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>" placeholder="Enter Password" required>
          <input type="checkbox" class="check-box"><span>I agree the terms and condition</span>
          <button type="submit"  name="submitreg" class="submit-btn">Register</button>
        </form>


      </div>
       </div>
      
     </body>
</html>
      