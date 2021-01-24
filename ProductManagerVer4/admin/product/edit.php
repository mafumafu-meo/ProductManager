<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        $conn = new PDO("mysql:host=localhost;dbname=test",'root','');
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM Products WHERE productID = '$id'");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array('name' => 'a'));
        $row = $stmt->fetch();
        
        $name = $row['productName'];
        $des = $row['productDes'];
        $cost = $row['productCost'];
        
        if (isset($_POST["edit"])) {
            $name = $_POST['name'];
            $des = $_POST['des'];
            $cost = $_POST['cost'];
            $stmt = $conn->prepare("UPDATE `products` SET `productName`='$name',`productDes`='$des',`productCost`='$cost' WHERE productID = '$id'");
            $stmt->execute();
            echo "success";
        }
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="des" value="<?php echo $des; ?>" required></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td><input type="text" name="cost" value="<?php echo $cost; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="edit" value="edit"></td>
            </tr>
        </table>
    </form>
</body>
</html>