<!-- Overlay -->
<div id="overlay" onclick="toggleSidebar()" 
class="fixed inset-0 bg-black/40 hidden z-40 md:hidden"></div>

<!-- Sidebar -->
<div id="sidebar"
class="fixed md:static top-0 left-0 min-h-screen w-64 
bg-gradient-to-b from-slate-700 to-slate-900 text-white p-4 
transform -translate-x-full md:translate-x-0 transition duration-300 z-50">

    <h2 class="text-xl mb-4 font-semibold">Menu</h2>

    <nav class="space-y-2">

        <a href="dashboard.php" class="block px-4 py-2 rounded hover:bg-white/10">Dashboard</a>
        <a href="assign_book.php" class="block px-4 py-2 rounded hover:bg-white/10">Assign Book</a>
        <a href="return_book.php" class="block px-4 py-2 rounded hover:bg-white/10">Return Book</a>
        <a href="books.php" class="block px-4 py-2 rounded hover:bg-white/10">Books</a>
        <a href="add_book.php" class="block px-4 py-2 rounded hover:bg-white/10">Add Book</a>
        <a href="users.php" class="block px-4 py-2 rounded hover:bg-white/10">Users</a>
        <a href="add_user.php" class="block px-4 py-2 rounded hover:bg-white/10">Add User</a>
        <a href="mysql_operations.php" class="block px-4 py-2 rounded hover:bg-white/10">MySQL Operations</a>

    </nav>

</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}
</script>