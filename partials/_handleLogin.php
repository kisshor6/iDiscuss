<?php
    include('_dbconnect.php');
    $dmsg = false;  
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM users  WHERE user_email='$email'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['username'] = $email;

            header("location:/forum/index.php?login=true");
            exit();
        }else{
            $dmsg = "Unable to log in !";
            header("location:/forum/index.php?login=false&msg=$dmsg");
        }
        
      }
    }
?>