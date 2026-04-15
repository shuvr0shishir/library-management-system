<?php
session_start();

include 'db.php';

// delete first when edit then add = edit
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM books WHERE id=$id");
}

if($_POST){
$title=$_POST['title'];
$author=$_POST['author'];
$category=$_POST['category'];
$isbn=$_POST['isbn'];
$quantity=$_POST['quantity'];
$addedDate=$_POST['added_date'] ?? null;

mysqli_query($conn,"INSERT INTO books(title,author,category,isbn,quantity,added_date)
VALUES('$title','$author','$category','$isbn','$quantity', '$addedDate')");

header("Location: books.php");
}
?>
<?php include('partials/header.php'); ?>

<div class="flex">

    <?php include('partials/sidebar.php'); ?>

    <main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

        <!-- Page Title -->
        <h1 class="text-2xl font-semibold mb-6">📚 Add New Book</h1>

        <!-- Error Message -->
        <!-- <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            Error message will be printed here
        </div> -->

        <!-- Form -->
        <div class="bg-white p-6 rounded-xl shadow">

            <form class="space-y-4" method="POST" action="">

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="title" placeholder="Book Title"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-400">

                    <input type="text" name="author" placeholder="Author"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-teal-400">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="isbn" placeholder="ISBN"
                        class="w-full p-3 border rounded-lg">

                    <select name="category" class="w-full p-3 border rounded-lg">
                        <option selected disabled hidden>Select Category</option>
                        <option>Classic</option>
                        <option>Fantasy</option>
                        <option>Fiction</option>
                        <option>Finance</option>
                        <option>Self-help</option>
                        <option>Motivation</option>
                        <option>Technology</option>
                        <option>Programming</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <input type="number" name="quantity" placeholder="Quantity"
                        class="w-full p-3 border rounded-lg">
                    <input type="date" name = "added_date"
                        class="w-full p-3 border rounded-lg">
                </div>

                <button class="w-full bg-gradient-to-r from-slate-800 to-teal-400 text-white py-3 rounded-lg">
                    Add Book
                </button>

            </form>

        </div>

    </main>

</div>

</body>
</html>

<?php include('partials/footer.php'); ?>