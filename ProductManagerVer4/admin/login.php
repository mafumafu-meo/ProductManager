<?php
    session_start();
    require_once("../models/Admins.php");
    $err_user = $err_pass = '*';
    if (isset($_POST["submit"])) {
        $admin = new Admins($_POST["username"], $_POST["password"]);
        if ($admin->checkLogin()) {
            header("Location: product/index.php");
            $_SESSION['username'] = $admin->getUsername();
        } else {
            if ($err_user == "*" && $err_pass == "*") $alert = 'Incorrect username or password!';
        }
    }
?>
<body>
    <form method="post" action="">
        <fieldset>
            <legend>Login form</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" required>
                        <span style="color:red"><?php echo $err_user;?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" required>
                        <span style="color:red"><?php echo $err_pass;?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
                </tr> 
                <?php if (isset($alert)) echo '<tr><td colspan="2">'.$alert."</td></tr>" ;?>
            </table>
        </fieldset>
    </form>
</body>
</html>