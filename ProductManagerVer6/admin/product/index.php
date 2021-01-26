<?php 
    require_once("../commons/head.php");
    require_once("../../models/DB.php");
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $id = $_GET['id'];
        $db = new DB();
        $stmt = $db->getPDO()->prepare("DELETE FROM Products WHERE ID = '$id'");
        $stmt->execute();
    }
?>

<h1>Admin page <span>logged by <?php echo $_SESSION['username']; ?></span> </h1>
<button><a href="./logout.php">Log out</a></button>
<button><a href="./add.php">Add</a></button>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php
        $db = new DB();
        $stmt = $db->getPDO()->prepare('SELECT * FROM Products');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array('name' => 'a'));

        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>' . '<img src=' . $row['image'] . ' alt="img">' . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td> <button><a href="?action=delete&id=' . $row['id'] . '">Delete</a></button> 
                    <button><a href="edit.php?id=' . $row['id'] . '">Edit</a></button>
                </td>';
            echo '</tr>';
        }
    ?>
</table>
