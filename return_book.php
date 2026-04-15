<?php
    session_start();
    include 'db.php';

    // Return action handle
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        mysqli_query($conn,"UPDATE transactions 
        SET status='returned', return_date=CURDATE()
        WHERE id=$id");

        header("Location: return_book.php");
        exit();
    }

    // Fetch data with JOIN
    $res = mysqli_query($conn,"
    SELECT t.*, b.title AS book_name, u.name AS user_name
    FROM transactions t
    JOIN books b ON t.book_id = b.id
    JOIN users u ON t.user_id = u.id
    ORDER BY t.issue_date ASC
    ");
?>


<?php include('partials/header.php'); ?>
<div class="flex overflow-auto">
<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

<h1 class="text-2xl font-semibold mb-6">Return Book</h1>

<div class="bg-white p-6 rounded-xl shadow">

<table class="w-full text-center">
<thead>
    <tr>
    <th class="p-3 text-left">#</th>
    <th class="p-3 text-left">User</th>
    <th class="p-3 text-left">Book Title</th>
    <th class="p-3">Assign Date</th>
    <th class="p-3">Return Date</th>
    <th class="p-3">Status</th>
    <th class="p-3">Action</th>
    </tr>
</thead>

<tbody>
    <?php 
    $i = 1;
    while($row = mysqli_fetch_assoc($res)){ 
    ?>

    <tr class="hover:bg-gray-50">
    <td class="p-3 text-left"><?php echo $i++; ?></td>
    <td class="p-3 text-left"><?php echo $row['user_name']; ?></td>
    <td class="p-3 text-left"><?php echo $row['book_name']; ?></td>
    <td class="p-3"><?php echo $row['issue_date']; ?></td>

    <td class="p-3">
    <?php echo $row['return_date'] == '0000-00-00' ?  '-': $row['return_date'] ; ?>
    </td>

    <td class="p-3 
    <?php echo ($row['status']=='returned') ? 'text-green-500' : 'text-yellow-500'; ?>">
    <?php echo ucfirst($row['status']); ?>
    </td>

    <td class="p-3">

    <?php if($row['status'] == 'assigned'){ ?>

    <a href="?id=<?php echo $row['id']; ?>" 
    class="bg-blue-500 text-white px-3 py-1 rounded">
    Return
    </a>

    <?php } else { ?>

    <a   
    class="bg-gray-500 text-white px-3 py-1 rounded">
    Done
    </a>

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