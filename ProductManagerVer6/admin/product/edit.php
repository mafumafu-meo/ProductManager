<?php
    require_once("../commons/head.php");
    require_once("../../models/DB.php");
    $db = new DB();
    $id = $_GET['id'];
    $stmt = $db->getPDO()->prepare("SELECT * FROM Products WHERE ID = '$id'");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array('name' => 'a'));
    $row = $stmt->fetch();

    $name = $row['name'];
    $description = $row['description'];
    $image = $row['image'];
    $price = $row['price'];

    if (isset($_POST["btn_edit"])) {
        if ($_FILES['file']['error'] == 0) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
            $image = 'upload/' . $_FILES['file']['name'];
        }
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stmt = $db->getPDO()->prepare("UPDATE `products` SET `name`='$name',`image`='$image',`price`='$price', `description`='$description' WHERE ID = '$id'");
        $stmt->execute();
        echo "Updated";
        header("refresh: 1 index.php");
    }
?>

<form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" size="31" value="<?php echo $name; ?>" required></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="description" cols="33" rows="10" required><?php echo $description;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="file"></td>
            <td>
                <img style="max-width:100px" src="<?php echo $image?>" alt="img">
            </td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" size="31" value="<?php echo $price; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn_edit" value="edit"></td>
        </tr>

    </table>
</form>