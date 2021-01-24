<?php session_start();?>
<?php
    if (isset($_SESSION['username'])) {
        header('location: ./admin/admin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
</head>
<body>
    <?php
        require('./Users.php');
        $err_user = $err_pass = '*';
        if (isset($_POST["btn_login"])) {
            $user = new Users($_POST["username"],$_POST["password"]);
            if ($user->login()) {
                $_SESSION['username'] = $user->getUsername();
                header('Location: ./admin/admin.php');
            } else if ($err_user == '*' && $err_pass == '*') {
                echo "<h1> Incorrect username or password </h1>";
            }
        }
    ?>
    <form method="post" action="login.php">
        <fieldset>
            <legend>Login form</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username">
                        <span style="color:red"><?php echo $err_user;?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password">
                        <span style="color:red"><?php echo $err_pass;?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn_login" value="Login"></td>
                </tr>                
            </table>
        </fieldset>
    </form>
</body>
</html>