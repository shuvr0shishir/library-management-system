<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
include 'db.php';

$transactions = mysqli_query($conn,"
SELECT t.*, b.title, u.name 
FROM transactions t
JOIN books b ON t.book_id=b.id
JOIN users u ON t.user_id=u.id
WHERE t.status='assigned'
ORDER BY t.id DESC
");

?>

<?php include('partials/header.php'); ?>

<div class="flex overflow-auto">
<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

<h1 class="text-2xl font-semibold mb-6">📊 Dashboard</h1>

<!-- Stats -->
<div class="grid sm:grid-cols-4 gap-4 mb-6">

    <div class="bg-gradient-to-r from-slate-800 to-teal-400 text-white p-6 rounded-xl shadow hover:-translate-y-1 hover:shadow-xl transition duration-300 flex justify-between items-center sm:block">
        <h3>Total Books</h3>
        <p class="text-3xl font-bold">
        <?php
        $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM books");
        $row=mysqli_fetch_assoc($res);
        echo $row['total'];
        ?>
        </p>
    </div>

    <div class="bg-yellow-400 text-white p-6 rounded-xl shadow hover:-translate-y-1 hover:shadow-xl transition duration-300 flex justify-between items-center sm:block">
        <h3>Assigned</h3>
        <p class="text-3xl font-bold">
            <!-- Assigned -->
            <?php
            $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM transactions WHERE status='assigned'");
            $row=mysqli_fetch_assoc($res);
            echo $row['total'];
            ?>
        </p>
    </div>

    <div class="bg-green-500 text-white p-6 rounded-xl shadow hover:-translate-y-1 hover:shadow-xl transition duration-300 flex justify-between items-center sm:block">
        <h3>Returned</h3>
        <p class="text-3xl font-bold">
            <!-- Returned -->
            <?php
            $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM transactions WHERE status='returned'");
            $row=mysqli_fetch_assoc($res);
            echo $row['total'];
            ?>
        </p>
    </div>

    <div class="bg-blue-500 text-white p-6 rounded-xl shadow hover:-translate-y-1 hover:shadow-xl transition duration-300 flex justify-between items-center sm:block">
        <h3>Users</h3>
        <p class="text-3xl font-bold">
            <?php
            $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM users");
            $row=mysqli_fetch_assoc($res);
            echo $row['total'];
            ?>
        </p>
    </div>

</div>

<!-- Table -->
<div class="bg-white p-6 rounded-xl shadow">

<table class="w-full">
<thead class="bg-gray-100 ">
<tr>
<th class="p-3 text-left">#</th>
<th class="p-3 text-left">User</th>
<th class="p-3 text-left">Book Title</th>
<th class="p-3 text-center">Assigned Date</th>
<th class="p-3 text-center">Due Date</th>
</tr>
</thead>

<tbody>

<?php 
$i = 1;
while($row=mysqli_fetch_assoc($transactions)){
?>

<tr class="hover:bg-gray-50">
<td class="p-3"><?php echo $i++; ?></td>
<td class="p-3"><?php echo $row['name']; ?></td>
<td class="p-3"><?php echo $row['title']; ?></td>
<td class="p-3 text-center"><?php echo $row['issue_date']; ?></td>
<td class="p-3 text-center">
    <?php echo $row['return_date'] == '0000-00-00' ? '-': $row['return_date']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</main>
</div>

<?php include('partials/footer.php'); ?>