<table>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
    </tr>
    
    <?php
        require_once('./models/DB.php');
        $db = new DB();
        $list = $db->getAll("products");
        foreach ($list as $row) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td><img src=\"".$row['image']."\" alt=\"img\"></td>";
            echo "<td>".$row['price']."</td>";
            echo "</tr>";
        }
    ?>
</table>