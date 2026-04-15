<?php
session_start();
include 'db.php';
?>


<?php include('partials/header.php'); ?>
<div class="flex overflow-auto">
<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

<h1 class="text-2xl font-semibold mb-6">Assign Book</h1>

<div class="bg-white p-6 rounded-xl shadow">

<?php
if($_POST){
    $b=$_POST['book_id'];
    $u=$_POST['user_id'];
    $ad=$_POST['assign_date'];
    $rd=$_POST['return_date'];

    mysqli_query($conn,"INSERT INTO transactions(book_id,user_id,issue_date,return_date,status)
    VALUES($b,$u,'$ad','$rd','assigned')");
?>
    
<div class="alert alert-success" role="alert">
  Assigned Successfully!
</div>

<?php
}
?>

<form class="space-y-4" method="POST">

    <select name="book_id"  class="w-full p-3 border rounded-lg">
    <option selected disabled>Select Book</option>

    <?php
    $res=mysqli_query($conn,"SELECT * FROM books ORDER BY title ASC");
    while($b=mysqli_fetch_assoc($res)){
    echo "<option value='{$b['id']}'>{$b['title']}</option>";
    }
    ?>

    </select>

    <select name="user_id"  class="w-full p-3 border rounded-lg">
    <option selected disabled>Select User</option>

    <?php
    $res=mysqli_query($conn,"SELECT * FROM users ORDER BY name ASC");
    while($u=mysqli_fetch_assoc($res)){
    echo "<option value='{$u['id']}'>{$u['name']}</option>";
    }
    ?>

    </select>

    <div class="grid grid-cols-2 gap-4">

    <!-- Assign Date -->
    <div>
        <label class="block mb-1 font-medium">
            Assign Date
        </label>
        <input 
            name="assign_date" 
            type="date" 
            value="<?php echo date('Y-m-d'); ?>" 
            class="w-full p-3 border rounded-lg"
        >
    </div>

    <!-- Return Date -->
    <div>
        <label class="block mb-1 font-medium">
            Return Date
        </label>
        <input 
            name="return_date" 
            type="date" 
            class="w-full p-3 border rounded-lg"
        >
    </div>

</div>

    <button class="w-full bg-teal-500 text-white py-3 rounded-lg">
    Assign
    </button>

</form>

</div>

</main>
</div>

<?php include('partials/footer.php'); ?>