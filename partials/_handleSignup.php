<?php
include('_dbconnect.php');
    $showMsg = false;
    if (isset($_POST['submit'])) {
    $user_email = $_POST['email'];
    $user_pass = $_POST['signpassword'];
    $cpassword = $_POST['signcpassword'];

    $sql = "SELECT *FROM `users` WHERE user_email='$user_email'";
    $query = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($query);
    if ($numRows>0) {
        $showMsg = "This user-email is already taken !";
    }else{
        if ($user_pass === $cpassword) {
            $hash = password_hash($user_pass, PASSWORD_DEFAULT);
            $sql3 = "INSERT INTO users SET user_email='$user_email', user_pass='$hash'";
            $query = mysqli_query($conn, $sql3);
            if ($query) {
                $showAlert = true;
                header("location: /forum/index.php?signupsuccess=true");
                exit();
            }
        }else{
            $showMsg = "Password does not matched !";
              header("location:/forum/index.php?signupsuccess=true");
        }
    }
    header("location:/forum/index.php?signupsuccess=false&error=$showMsg");
}
?>