<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Check if user has active (assigned) books
    $check = mysqli_query($conn,"SELECT * FROM transactions WHERE user_id=$id AND status='assigned'");

    if(mysqli_num_rows($check) > 0){
        // Delete related transactions first
        mysqli_query($conn,"DELETE FROM transactions WHERE user_id=$id");
    }

    

    // Then delete user
    mysqli_query($conn,"DELETE FROM users WHERE id=$id");

    header("Location: users.php");
    exit();
}
?>