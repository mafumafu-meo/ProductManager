<?php
    require_once("../commons/head.php");
    require_once("../../models/DB.php");
    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    }
    if (isset($_POST["btn_add"])) {
        if ($_FILES['file']['error'] > 0) {
            echo "File Error!";
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], '../../images/' . $_FILES['file']['name']);
            $destination = 'http://localhost/Test1/images/' . $_FILES['file']['name'];
            require("../../models/Products.php");
            $product = new Products($_POST['name'],$_POST['description'], $destination, $_POST['price']);
            $product->add();
            echo "Product Added!";
            header('refresh: 1 index.php');
        }
    }
?>


<form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" size="31" required></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="description" cols="33" rows="10" required></textarea>
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" size="31" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn_add" value="add"></td>
        </tr>
    </table>
</form>