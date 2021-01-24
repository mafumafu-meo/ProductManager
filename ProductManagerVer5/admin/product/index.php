<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    }
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $id = $_GET['id'];
        $conn = new PDO("mysql:host=localhost;dbname=test",'root','') or die('Cannot connect to db');
        $stmt = $conn->prepare("DELETE FROM Products WHERE ID = '$id'");
        $stmt->execute();
    }
?>

<style>
    table,tr,th,td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <h1>Admin page <span>logged by <?php echo $_SESSION['username']; ?></span> </h1>
    <button><a href="./logout.php">Log out</a></button>
    <button><a href="./add.php">Add</a></button>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
            $conn = new PDO("mysql:host=localhost;dbname=test", 'root', '');
            $stmt = $conn->prepare('SELECT * FROM Products');
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array('name' => 'a'));

            while ($row = $stmt->fetch()) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . '<img style="max-width:100px;" src=' . $row['image'] . ' alt="img">' . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td> <button><a href="?action=delete&id=' . $row['ID'] . '">Delete</a></button> 
                        <button><a href="edit.php?id=' . $row['ID'] . '">Edit</a></button>
                    </td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>