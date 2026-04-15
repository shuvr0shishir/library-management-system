<?php
session_start();
include 'db.php';

$id = $_GET['id']; 

$res = mysqli_query($conn,"SELECT * FROM books WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if($_POST){

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $addedDate = mysqli_real_escape_string($conn, $_POST['added_date']);

    mysqli_query($conn,"UPDATE books SET 
        title='$title',
        author='$author',
        category='$category',
        isbn='$isbn',
        quantity='$quantity',
        added_date='$addedDate'
        WHERE id=$id
    ");

    header("Location: books.php");
}
?>

<?php include('partials/header.php'); ?>

<div class="flex">

    <?php include('partials/sidebar.php'); ?>

    <main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

        <!-- Page Title -->
        <h1 class="text-2xl font-semibold mb-6">📚 Edit This Book</h1>

        <!-- Form -->
        <div class="bg-white p-6 rounded-xl shadow">

            <form class="space-y-4" method="POST" action="">

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="title" placeholder="Book Title" value="<?php echo $row['title']; ?>"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-400">

                    <input type="text" name="author" placeholder="Author" value="<?php echo $row['author']; ?>"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-400">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="isbn" placeholder="ISBN" value="<?php echo $row['isbn']; ?>"
                        class="w-full p-3 border rounded-lg">

                    <select name="category" class="w-full p-3 border rounded-lg">
                        <option disabled hidden>Select Category</option>

                        <option <?= ($row['category'] == 'Classic') ? 'selected' : '' ?>>Classic</option>
                        <option <?= ($row['category'] == 'Fantasy') ? 'selected' : '' ?>>Fantasy</option>
                        <option <?= ($row['category'] == 'Fiction') ? 'selected' : '' ?>>Fiction</option>
                        <option <?= ($row['category'] == 'Finance') ? 'selected' : '' ?>>Finance</option>
                        <option <?= ($row['category'] == 'Self-help') ? 'selected' : '' ?>>Self-help</option>
                        <option <?= ($row['category'] == 'Motivation') ? 'selected' : '' ?>>Motivation</option>
                        <option <?= ($row['category'] == 'Technology') ? 'selected' : '' ?>>Technology</option>
                        <option <?= ($row['category'] == 'Programming') ? 'selected' : '' ?>>Programming</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <input type="number" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity']; ?>"
                        class="w-full p-3 border rounded-lg">
                    <input type="date" name = "added_date" value="<?php echo date('Y-m-d'); ?>"
                        class="w-full p-3 border rounded-lg">
                </div>

                <button class="w-full bg-gradient-to-r from-slate-800 to-teal-400 text-white py-3 rounded-lg">
                    Update Book
                </button>

            </form>

        </div>

    </main>

</div>

</body>
</html>

<?php include('partials/footer.php'); ?>
