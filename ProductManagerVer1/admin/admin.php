<?php session_start();?>
<?php
    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
        table,tr,td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Home page</h1>
    <span>logged by <?php echo $_SESSION['username'];?></span>
    <button><a href="./logout.php">Log out</a></button>

    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Cost</td>
        </tr>
        <?php
            $file = fopen("products.txt", "r") or die("Unable to open file!");
            while (!feof($file)) {
                $data = fgets($file);
                $list = explode("|", $data);
                echo '<tr>';
                for ($i = 0; $i <sizeof($list); $i++) {
                    echo '<td>'.$list[$i].'</td>';
                }
                echo '</tr>';
            }
            fclose($file);
        ?>
    </table>
</body>
</html>