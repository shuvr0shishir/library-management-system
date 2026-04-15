<?php
session_start();

include 'db.php';

if($_POST){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $student_id=$_POST['student_id'];
    $department=$_POST['department'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $role = $_POST['role'] ?? 'Student';
    $password=$_POST['password'];

    mysqli_query($conn,"INSERT INTO users(name,address,student_id,department,email,phone,role,password)
    VALUES('$name','$address','$student_id','$department','$email','$phone','$role','$password')");

    header("Location: users.php");
}
?>

<?php include('partials/header.php'); ?>

<div class="flex flex-col md:flex-row">

<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-4 md:p-6 min-h-[calc(100vh-128px)]">

<h1 class="text-2xl font-semibold mb-6">👤 Add User</h1>

<div class="bg-white p-6 rounded-xl shadow">

<form class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" action="">

    <input name="name" type="text" placeholder="Full Name"
    class="border p-3 rounded-lg">

    <input name="student_id" type="text" placeholder="Student ID"
    class="border p-3 rounded-lg">

    <input name="address" type="text" placeholder="Address"
    class="border p-3 rounded-lg">

    <select name="department" class="border p-3 rounded-lg">
    <option selected disabled hidden>Select Department</option>
        <option>CSE</option>
        <option>EEE</option>
        <option>BBA</option>
        <option>NFE</option>
        <option>LLB</option>
    </select>

    <input name="phone" type="text" placeholder="Phone"
    class="border p-3 rounded-lg">

    <select name="role" class="border p-3 rounded-lg">
        <option selected disabled hidden>Select Role</option>
        <option value ='ADMIN' >Admin</option>
        <option>Faculty</option>
        <option>Student</option>
    </select>

    <input name="email" type="text" placeholder="Email"
    class="border p-3 rounded-lg">

    <input name="password" type="password" placeholder="Password"
    class="border p-3 rounded-lg">

    <button class="bg-teal-500 text-white py-3 rounded-lg md:col-span-2">
    Create User
    </button>

</form>

</div>

</main>

</div>

</body>
</html>

<?php include('partials/footer.php'); ?>