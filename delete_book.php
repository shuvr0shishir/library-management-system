<?php
include 'db.php';
$id=$_GET['id'];

$check = mysqli_query($conn,"SELECT * FROM transactions WHERE book_id=$id AND status='assigned'");

    if(mysqli_num_rows($check) > 0){
        // Delete related transactions first
        mysqli_query($conn,"DELETE FROM transactions WHERE book_id=$id");
    }
    // Then delete user
    mysqli_query($conn,"DELETE FROM books WHERE id=$id");

header("Location: books.php");
?>