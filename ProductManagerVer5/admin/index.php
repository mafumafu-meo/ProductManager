<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: product/index.php");
} else {
    header("Location: login.php");
}
