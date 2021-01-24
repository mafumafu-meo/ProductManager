<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        $err_name = $err_des = $err_cost = '*';
        if (isset($_POST["btn_submit"])) {
            require("../Products.php");
            $product = new Products('',$_POST['name'],$_POST['des'],$_POST['cost']);
            $product->addToFile();
        }
    ?>
    <form action="add.php" method="POST">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
                <td><span style="color:red"><?php echo $err_name;?></span></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="des"></td>
                <td><span style="color:red"><?php echo $err_des;?></span></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td><input type="text" name="cost"></td>
                <td><span style="color:red"><?php echo $err_cost;?></span></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="add"></td>
            </tr>
        </table>
    </form>
</body>
</html>