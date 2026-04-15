<?php
session_start();
include 'db.php';
?>

<?php include('partials/header.php'); ?>
<div class="flex overflow-auto">
<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

<div class="flex justify-between mb-6">
<h1 class="text-2xl font-semibold">👥 Users</h1>

<a href="add_user.php" class="bg-teal-500 text-white px-4 py-2 rounded-lg">
+ Add User
</a>
</div>

<div class="bg-white p-6 rounded-xl shadow">

<table class="w-full text-center">
<thead class="bg-gray-100">
<tr>
    <th class="p-3 text-left">#</th>
    <th class="p-3 text-left">Name</th>
    <th class="p-3 text-left">Address</th>
    <th class="p-3 text-left">Email</th>
    <th class="p-3">Phone</th>
    <th class="p-3">ID</th>
    <th class="p-3">Department</th>
    <th class="p-3">Role</th>
    <th class="p-3">Action</th>
</tr>
</thead>

<tbody>
    <?php
    $res = mysqli_query($conn,"SELECT * FROM users ORDER BY name ASC");
    $index = 0;
    while($row=mysqli_fetch_assoc($res)){
        $index++;
    ?>
        <tr class="hover:bg-gray-50">

        <td class="p-3 text-left"><?php echo $index ?></td>
        <td class="p-3 text-left"><?php echo $row['name']?? '-'; ?></td>
        <td class="p-3 text-left"><?php echo $row['address']?? '-'; ?></td>
        <td class="p-3 text-left"><?php echo $row['email']?? '-'; ?></td>
        <td class="p-3"><?php echo $row['phone']?? '-'; ?></td>
        <td class="p-3"><?php echo $row['student_id']?? '-'; ?></td>
        <td class="p-3"><?php echo $row['department']?? '-'; ?></td>
        <td class="p-3"><?php echo $row['role']?? '-'; ?></td>

        <td class="p-3 space-x-2 flex">
    <?php if($row['role'] !== 'ADMIN'){ ?>
        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
        <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded">Delete</a>
    <?php } else { ?>
        <span class="bg-green-400 px-2 py-1 rounded text-white italic">Protected</span>
    <?php } ?>
</td>
        </tr>
    <?php } ?>
</tbody>

</table>

</div>

</main>
</div>

<?php include('partials/footer.php'); ?>