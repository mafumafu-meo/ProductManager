<?php
    session_start();    
    session_destroy();
    echo '<h1>SUCCESS</h1>'.'</br>'.'wait 2 seconds...';
    header('refresh: 2; ../login.php');
?>