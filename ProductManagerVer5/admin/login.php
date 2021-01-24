<?php
    session_start();
    require_once("../models/Admins.php");
    if (isset($_POST["btn_login"])) {
        $admin = new Admins($_POST["username"], $_POST["password"]);
        if ($admin->checkLogin()) {
            header("Location: product/index.php");
            $_SESSION['username'] = $admin->getUsername();
        } else {
            $alert = 'Incorrect username or password!';
        }
    }
?>
<body>
    <form method="post">
        <fieldset>
            <legend>Login form</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn_login" value="Login"></td>
                </tr> 
                <?php if (isset($alert)) echo $alert;?>
            </table>
        </fieldset>
    </form>
</body>
</html>