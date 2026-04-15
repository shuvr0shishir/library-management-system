<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="bg-white p-10 rounded-xl shadow text-center">

<h1 class="text-5xl text-red-500 font-bold">404</h1>
<h2 class="text-xl mt-2">Page Not Found</h2>

<a href="dashboard.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
Go Dashboard
</a>

</div>

</body>
</html>