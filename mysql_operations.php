<?php
    session_start();
    include 'db.php';
?>

<?php
$queryResult = null;
$currentQuery = "";

if(isset($_GET['action'])){
    $action = $_GET['action'];

    switch($action){

        case "where":
            $currentQuery = "SELECT * FROM users WHERE department = 'CSE'";
            break;

        case "users_by_role":
            $currentQuery = "SELECT role, COUNT(*) as total FROM users GROUP BY role";
            break;

        case "users_by_department":
            $currentQuery = "SELECT department, COUNT(*) as total FROM users GROUP BY department";
            break;

        case "having":
            $currentQuery = "SELECT department, COUNT(*) as total 
                             FROM users GROUP BY department HAVING total > 5";
            break;

        case "join_users_books":
            $currentQuery = "SELECT users.name, books.title 
                             FROM transactions
                             INNER JOIN users ON users.id = transactions.user_id
                             INNER JOIN books ON books.id = transactions.book_id";
            break;

        case "left_join":
            $currentQuery = "SELECT users.name, transactions.book_id 
                             FROM users
                             LEFT JOIN transactions ON users.id = transactions.user_id";
            break;

        case "right_join":
            $currentQuery = "SELECT users.name, transactions.book_id 
                             FROM users
                             RIGHT JOIN transactions ON users.id = transactions.user_id";
            break;

        case "top_user":
            $currentQuery = "SELECT name FROM users WHERE id = (
                             SELECT user_id FROM transactions 
                             GROUP BY user_id 
                             ORDER BY COUNT(*) DESC LIMIT 1)";
            break;

        case "view":
            mysqli_query($conn,"CREATE OR REPLACE VIEW user_view AS 
            SELECT name,email,role FROM users");

            $currentQuery = "SELECT * FROM user_view";
            break;

        case "transaction":
            mysqli_query($conn,"START TRANSACTION");
            mysqli_query($conn,"UPDATE users SET role='Faculty' WHERE id=6");
            mysqli_query($conn,"COMMIT");

            $currentQuery = "SELECT id,name,role FROM users WHERE id=6";
            break;

        case "procedure":
            mysqli_query($conn,"DROP PROCEDURE IF EXISTS getUsers");
            mysqli_query($conn,"CREATE PROCEDURE getUsers() SELECT * FROM users");

            $currentQuery = "CALL getUsers()";
            break;

        case "trigger":
            mysqli_query($conn,"DROP TRIGGER IF EXISTS before_insert_user");
            mysqli_query($conn,"CREATE TRIGGER before_insert_user 
            BEFORE INSERT ON users 
            FOR EACH ROW 
            SET NEW.role = IFNULL(NEW.role, 'Student')");

            $currentQuery = "SHOW TRIGGERS";
            break;
    }
    
    if(!empty($currentQuery)){
        $queryResult = mysqli_query($conn, $currentQuery);

        if(!$queryResult){
            die("Query Error: " . mysqli_error($conn));
        }
    }
}
?>

<?php include('partials/header.php'); ?>
<div class="flex overflow-auto">
<?php include('partials/sidebar.php'); ?>

<main class="flex-1 p-6 min-h-[calc(100vh-128px)]">

<!-- buttons -->
<h1 class="text-2xl font-semibold mb-6">MySQL Operations</h1>

<div class="bg-white p-6 rounded-xl shadow">
    <!-- ALL QUERIES -->
    <div class="mb-6">
    <h2 class="text-lg font-semibold mb-3 text-gray-700">🚀 All MySQL Operations</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">

    <a href="?action=where" class="bg-cyan-500 text-white p-3 rounded text-center">
    WHERE (CSE Dept)
    </a>
    <!-- $currentQuery = "SELECT * FROM users WHERE department = 'CSE'"; -->

    <a href="?action=users_by_role" class="bg-blue-500 text-white p-3 rounded text-center">
    GROUP BY (Role)
    </a>
    <!-- $currentQuery = "SELECT role, COUNT(*) as total FROM users GROUP BY role"; -->

    <a href="?action=users_by_department" class="bg-green-500 text-white p-3 rounded text-center">
    GROUP BY (Dept)
    </a>
    <!-- $currentQuery = "SELECT department, COUNT(*) as total FROM users GROUP BY department"; -->

    <a href="?action=having" class="bg-pink-500 text-white p-3 rounded text-center">
    HAVING (More than 5 student)
    </a>
    <!-- $currentQuery = "SELECT department, COUNT(*) as total 
                             FROM users GROUP BY department HAVING total > 5"; -->

    <a href="?action=join_users_books" class="bg-purple-500 text-white p-3 rounded text-center">
    INNER JOIN
    </a>
    <!-- $currentQuery = "SELECT users.name, books.title 
                             FROM transactions
                             INNER JOIN users ON users.id = transactions.user_id
                             INNER JOIN books ON books.id = transactions.book_id"; -->

    <a href="?action=left_join" class="bg-yellow-500 text-white p-3 rounded text-center">
    LEFT JOIN
    </a>
    <!-- $currentQuery = "SELECT users.name, transactions.book_id 
                             FROM users
                             LEFT JOIN transactions ON users.id = transactions.user_id"; -->

    <a href="?action=right_join" class="bg-orange-500 text-white p-3 rounded text-center">
    RIGHT JOIN
    </a>
    <!-- $currentQuery = "SELECT users.name, transactions.book_id 
                             FROM users
                             RIGHT JOIN transactions ON users.id = transactions.user_id"; -->

    <a href="?action=top_user" class="bg-indigo-500 text-white p-3 rounded text-center">
    SUBQUERY (Top User)
    </a>
    <!-- $currentQuery = "SELECT name FROM users WHERE id = (
                             SELECT user_id FROM transactions 
                             GROUP BY user_id 
                             ORDER BY COUNT(*) DESC LIMIT 1)"; -->

    <a href="?action=view" class="bg-teal-500 text-white p-3 rounded text-center">
    VIEW
    </a>
    <!-- mysqli_query($conn,"CREATE OR REPLACE VIEW user_view AS 
            SELECT name,email,role FROM users");

            $currentQuery = "SELECT * FROM user_view"; -->

    <a href="?action=transaction" class="bg-red-500 text-white p-3 rounded text-center">
    TRANSACTION (Role Update)
    </a>
    <!-- mysqli_query($conn,"START TRANSACTION");
            mysqli_query($conn,"UPDATE users SET role='Faculty' WHERE id=6");
            mysqli_query($conn,"COMMIT");

            $currentQuery = "SELECT id,name,role FROM users WHERE id=6"; -->

    <a href="?action=procedure" class="bg-gray-500 text-white p-3 rounded text-center">
    PROCEDURE
    </a>
    <!-- mysqli_query($conn,"DROP PROCEDURE IF EXISTS getUsers");
            mysqli_query($conn,"CREATE PROCEDURE getUsers() SELECT * FROM users");

            $currentQuery = "CALL getUsers()"; -->

    <a href="?action=trigger" class="bg-black text-white p-3 rounded text-center">
    TRIGGER (Default: Student)
    </a>
    <!-- mysqli_query($conn,"DROP TRIGGER IF EXISTS before_insert_user");
            mysqli_query($conn,"CREATE TRIGGER before_insert_user 
            BEFORE INSERT ON users 
            FOR EACH ROW 
            SET NEW.role = IFNULL(NEW.role, 'Student')");

            $currentQuery = "SHOW TRIGGERS"; -->

    </div>
    </div>

    <?php if(!empty($currentQuery)){ ?>
    <div class="bg-gray-900 text-green-400 p-4 rounded mb-4">
        <strong>Running Query:</strong><br>
        <?php echo $currentQuery; ?>
    </div>
    <?php } ?>
</div>

<!-- result -->
<h1 class="text-2xl font-semibold mt-8 mb-6">Operation Result</h1>

<div class="bg-white p-6 rounded-xl shadow">
    <?php if($queryResult){ ?>
    <table class="w-full border text-center">
    <thead class="bg-gray-200">
    <tr>
    <?php
    $fields = mysqli_fetch_fields($queryResult);
    foreach($fields as $field){
        echo "<th class='p-2 border'>{$field->name}</th>";
    }
    ?>
    </tr>
    </thead>

    <tbody>
    <?php while($row = mysqli_fetch_assoc($queryResult)){ ?>
    <tr>
    <?php foreach($row as $data){ ?>
    <td class="p-2 border"><?php echo $data; ?></td>
    <?php } ?>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <?php } ?>
</div>

</main>
</div>


<?php include('partials/footer.php'); ?>