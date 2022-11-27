<?php
$servername = "localhost";
$username = "admin";
$password = "password123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=express", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

function verify_data($d){
  $d = trim($d);
  $d = stripslashes($d);
  $d = htmlspecialchars($d);
  return $d;
}

?>

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
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = verify_data($_POST["username"]);
        $pass_word = verify_data($_POST["password"]);
        if (strlen($user_name) > 0 && strlen($pass_word) > 0){
          $admins_sql = "SELECT * FROM users WHERE username = '{$user_name}' and password = '{$pass_word}';";
          $result = $conn->query($admins_sql);
          $row = $result->rowCount();
          if ($row == 1){
            header("Location:dashboard.php");
            exit();
          }
          else{
            echo "";
          }
        }
        else{
          echo "";
        }
      } 
    ?></h4>
    <span class="login-text1">
      © 2022 Express Computer Doctors, All Rights Reserved.
    </span>
  </div>
</body>