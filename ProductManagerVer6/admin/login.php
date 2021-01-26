<?php
    require_once("./commons/head.php");
    require_once("../models/DB.php");
    require_once("../models/Admins.php");
    if (isset($_POST["btn_login"])) {
        $admin = new Admins($_POST["username"], $_POST["password"]);
        if ($admin->checkLogin()) {
            header("Location: product/index.php");
            echo "true";
        } else {
            $alert = 'Incorrect username or password!';
        }
    }
?>

<form method="post">
    <table>
        <tr>
            <td colspan="2" align="center">Login form</td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn_login" value="Login"></td>
        </tr> 
        <?php if (isset($alert)) echo $alert;?>
    </table>
</form>
