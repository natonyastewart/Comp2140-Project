<head>
<link href="login.css" rel="stylesheet"/>
</head>
<body>
    <div class="login-container">
    <h1>Login</h1>
    <div class="login-container1"></div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit">
    </form>
    <h4><?php
      require_once("login_class.php");
      
      function verify_data($d){
        $d = trim($d);
        $d = stripslashes($d);
        $d = htmlspecialchars($d);
        return $d;
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = verify_data($_POST["username"]);
        $pass_word = verify_data($_POST["password"]);
        $login_acc = new UserLogin($user_name,$pass_word);
        if (strlen($user_name) > 0 && strlen($pass_word) > 0){
          if ($login_acc->isValidLogin() == TRUE){
            header("Location:dashboard.php");
            exit();
          }
          else{
            echo"<h4>Invalid username or password entered</h4>";
          }
        }
        else{
          echo"<h4>Invalid username or password entered</h4>";
        }    
      } 
    ?></h4>
    <span class="login-text1">
      © 2022 Express Computer Doctors, All Rights Reserved.
    </span>
  </div>
</body>