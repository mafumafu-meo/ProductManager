<?php session_start();?>
<?php
    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    }
?>
<?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $conn = new PDO("mysql:host=localhost;dbname=test",'root','');
        $stmt = $conn->prepare("DELETE FROM Products WHERE productID = '$id'");
        $stmt->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
        table,tr,th,td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Home page</h1>
    <span>logged by <?php echo $_SESSION['username'];?></span>
    <button><a href="./logout.php">Log out</a></button>
    <button><a href="./add.php">Add</a></button>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Cost</th>
            <th>action</th>
        </tr>
        <?php
            $conn = new PDO("mysql:host=localhost;dbname=test",'root','');
            $stmt = $conn->prepare('SELECT * FROM Products');
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array('name' => 'a'));
            
            while($row = $stmt->fetch()) {
                echo '<tr>';
                echo '<td>'.$row['productID'].'</td>';
                echo '<td>'.$row['productName'].'</td>';
                echo '<td>'.$row['productDes'].'</td>';
                echo '<td>'.$row['productCost'].'</td>';
                echo '<td> <button><a href="?action=delete&id='.$row['productID'].'">Delete</a></button> 
                    <button><a href="edit.php?id='.$row['productID'].'">Edit</a></button>
                </td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>