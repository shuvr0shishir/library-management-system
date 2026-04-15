<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="shortcut icon" href="./assets/diuLogo.png" type="image/x-icon">
<title>DIU Library Management System</title>
</head>

<body class="bg-gray-100">

<!-- Navbar -->
<header class="bg-gradient-to-r from-slate-800 to-teal-400 text-white flex justify-between items-center px-4 py-2 shadow">

    <!-- Left -->
    <div class="flex items-center gap-3">
        <!-- Hamburger -->
        <button onclick="toggleSidebar()" class="md:hidden text-2xl">
            ☰
        </button>

        <div class="flex gap-2 items-center">
            <img src="assets/diuLogo.png" alt="" width="30px">
            <h1 class="text-2xl font-bold">DIU Library</h1>
        </div>
    </div>

    <!-- Right -->
    <div class="flex items-center gap-4">
        <span class="hidden sm:flex">Welcome, <?php echo strtoupper($_SESSION['user'] ?? 'Guest'); ?></span>
        <a href="logout.php" class="px-4 py-2 rounded-xl text-white font-semibold border-2 border-gray-300 bg-black/10 hover: hover:bg-black/30 transition">Logout</a>
    </div>

</header>