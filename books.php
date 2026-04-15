<?php
session_start();
include 'db.php';
?>

<?php include('partials/header.php'); ?>
<div class="flex overflow-auto">
<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

<div class="flex justify-between mb-6">
<h1 class="text-2xl font-semibold">📚 Books</h1>

<a href="add_book.php" class="bg-teal-500 text-white px-4 py-2 rounded-lg">
+ Add Book
</a>
</div>

<div class="bg-white p-6 rounded-xl shadow">

<table class="w-full text-left">

<thead class="bg-gray-100">
<tr>
<th class="p-3">#</th>
<th class="p-3">Title</th>
<th class="p-3">Author</th>
<th class="p-3">Category</th>
<th class="p-3">Isbn</th>
<th class="p-3">Added Date</th>
<th class="p-3 text-center">Status</th>
<th class="p-3 text-center">Action</th>
</tr>
</thead>

<tbody>
    <?php
    $res=mysqli_query($conn,"SELECT * FROM books ORDER BY title ASC");
    $index = 0;
    while($row=mysqli_fetch_assoc($res)){
        $index++;
    ?>
        <tr class="hover:bg-gray-50">

        <td class="p-3"><?php echo $index ?></td>
        <td class="p-3"><?php echo $row['title']; ?></td>
        <td class="p-3"><?php echo $row['author']; ?></td>
        <td class="p-3"><?php echo $row['category']; ?></td>
        <td class="p-3"><?php echo $row['isbn']; ?></td>
        <td class="p-3"><?php echo $row['added_date']; ?></td>
        <td class="p-3 text-green-600 text-center"><?php echo $row['status']; ?><br>(<?php echo $row['quantity']; ?>)</td>

        <td class="p-3 space-x-2 flex text-center">
        <a href="edit_book.php?id=<?php echo $row['id']; ?>"  class="bg-yellow-400 px-2 py-1 rounded">Edit</a>
        <a href="delete_book.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded">Delete</a>
        </td>
        </tr>
        <?php } ?>
</tbody>

</table>

</div>

</main>
</div>

<?php include('partials/footer.php'); ?>