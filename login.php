<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>DIU Library | Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="shortcut icon" href="./assets/diuLogo.png" type="image/x-icon">
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-slate-800 to-teal-400">

<div class="w-full max-w-svw sm:max-w-md bg-white/90 backdrop-blur-xl rounded-2xl p-8 shadow-lg">
    <div class="w-20 mx-auto">
        <img src="./assets/diuLogo.png" alt="">
    </div>
    <h2 class="text-xl font-bold text-center mb-2">DIU Library Management System</h2>
    <h2 class="text-2xl  text-center mb-6 text-gray-700 font-semibold">Login</h2>

    <!-- login failed error -->
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="alert alert-danger">Email / Password Incorrect!</div>
    <?php endif; ?>

    <form method="POST" action="index.php">

        <input type="text" name="email" placeholder="Email"
            class="w-full mb-4 p-3 border rounded-lg" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 p-3 border rounded-lg" required>

        <button class="w-full bg-gradient-to-r from-slate-800 to-teal-400 text-white py-3 rounded-lg">
            Login
        </button>

    </form>

    <!-- Demo -->
    <div class="bg-gray-300 text-gray-700 font-semibold p-3 rounded-lg text-center my-4 text-sm">
        Demo Credentials: <br>
        Email: admin@gmail.com <br>
        Password: 1234
    </div>

</div>

</body>
</html>