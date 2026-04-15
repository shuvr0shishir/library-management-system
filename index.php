<?php
session_start();
include 'db.php';
header("Location: login.php");
if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = mysqli_query($conn,"SELECT * FROM users 
    WHERE email='$email' AND password='$password'");  

    if(mysqli_num_rows($res)>0){

        // 🔥 fetch matched row
        $user = mysqli_fetch_assoc($res);

        // 🔥 save name & email in session
        $_SESSION['user'] = $user['name'];   // name column
        $_SESSION['email'] = $user['email'];

        header("Location: dashboard.php");
        exit();

    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
?>