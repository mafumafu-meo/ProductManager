<?php
    $conn = new PDO("mysql:host=localhost;dbname=test", 'root', '');
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Products WHERE ID = '$id'");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array('name' => 'a'));
    $row = $stmt->fetch();

    $name = $row['name'];
    $image = $row['image'];
    $price = $row['price'];

    if (isset($_POST["btn_edit"])) {
        if ($_FILES['file']['error'] == 0) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
            $image = 'upload/' . $_FILES['file']['name'];
        }
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stmt = $conn->prepare("UPDATE `products` SET `name`='$name',`image`='$image',`price`='$price' WHERE ID = '$id'");
        $stmt->execute();
        echo "success";
    }
?>

<body>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
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
                <td><input type="text" name="price" value="<?php echo $price; ?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_edit" value="edit"></td>
            </tr>
        </table>
    </form>
</body>