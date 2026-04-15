<?php
session_start();
include 'db.php';

$id = $_GET['id'];

$res = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if($_POST){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $student_id=$_POST['student_id'];
    $department=$_POST['department'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];
    $password=$_POST['password'];

    mysqli_query($conn,"UPDATE users SET 
    name='$name',
    address='$address',
    student_id='$student_id',
    department='$department',
    email='$email',
    phone='$phone',
    role='$role',
    password='$password'
    WHERE id=$id");

    header("Location: users.php");
}
?>

<?php include('partials/header.php'); ?>

<div class="flex flex-col md:flex-row">

<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-4 md:p-6 min-h-[calc(100vh-128px)]">

<h1 class="text-2xl font-semibold mb-6">👤 Edit This User</h1>

<div class="bg-white p-6 rounded-xl shadow">

<form class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" action="">

    <input name="name" type="text" placeholder="Full Name" value="<?php echo $row['name']; ?>"
    class="border p-3 rounded-lg">

    <input name="student_id" type="text" placeholder="Student ID" value="<?php echo $row['student_id']; ?>"
    class="border p-3 rounded-lg">

    <input name="address" type="text" placeholder="Address" value="<?php echo $row['address']; ?>"
    class="border p-3 rounded-lg">

    <select name="department" class="border p-3 rounded-lg">
    <option disabled <?= empty($row['department']) ? 'selected' : '' ?>>Select Department</option>
        <option <?= (($row['department'] ?? '') == 'CSE') ? 'selected' : '' ?>>CSE</option>
        <option <?= (($row['department'] ?? '') == 'EEE') ? 'selected' : '' ?>>EEE</option>
        <option <?= (($row['department'] ?? '') == 'BBA') ? 'selected' : '' ?>>BBA</option>
        <option <?= (($row['department'] ?? '') == 'NFE') ? 'selected' : '' ?>>NFE</option>
        <option <?= (($row['department'] ?? '') == 'LLB') ? 'selected' : '' ?>>LLB</option>
    </select>

    <input name="phone" type="text" placeholder="Phone" value="<?php echo $row['phone']; ?>"
    class="border p-3 rounded-lg">

    <select name="role" class="border p-3 rounded-lg">
        <option  disabled hidden>Select Role</option>
        <option>Admin</option>
        <option>Faculty</option>
        <option>Student</option>
    </select>

    <input name="email" type="text" placeholder="Email" value="<?php echo $row['email']; ?>"
    class="border p-3 rounded-lg">

    <input name="password" type="password" placeholder="Password"
    class="border p-3 rounded-lg" required>

    <button class="bg-teal-500 text-white py-3 rounded-lg md:col-span-2">
    Update User
    </button>

</form>

</div>

</main>

</div>

</body>
</html>

<?php include('partials/footer.php'); ?>