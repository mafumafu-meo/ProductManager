<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
}
if (isset($_POST["btn_add"])) {
    if ($_FILES['file']['error'] > 0) {
        echo "File Error!";
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
        $destination = 'upload/' . $_FILES['file']['name'];
        require("../../models/Products.php");
        $product = new Products($_POST['name'], $destination, $_POST['price']);
        $product->add();
    }
}
?>

<body>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_add" value="add"></td>
            </tr>
        </table>
    </form>
</body>