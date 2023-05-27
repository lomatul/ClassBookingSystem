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
    <title> DBMS</title>
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
        <form id= "login" class="input-group">
          <input type="text" class="input-field" placeholder="User ID" required>
          <input type="password" class="input-field" placeholder="Enter Password" required>
          <input type="checkbox" class="check-box"><span>Remember Password</span>
          <button type="submit"  class="submit-btn">Log In</button>
        </form>
        <form id="registration" class="input-group">
          <input type="text" class="input-field" placeholder="User ID" required>
          <input type="text" class="input-field" placeholder="Name" required>
          <input type="number" class="input-field" placeholder="Section" required>
          <input type="text" class="input-field" placeholder="Programe" required>
          <input type="text" class="input-field" placeholder="Department" required>
          <input type="number" class="input-field" placeholder="Batch" required>
          <input type="password" class="input-field" placeholder="Enter Password" required>
          <input type="checkbox" class="check-box"><span>I agree the terms and condition</span>
          <button type="submit"  class="submit-btn">Log In</button>
        </form>


      </div>
       </div>
      
     </body>
</html>
      