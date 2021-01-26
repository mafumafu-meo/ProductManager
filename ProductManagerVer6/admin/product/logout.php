<?php
    session_start();    
    session_destroy();
    echo '<h1>SUCCESS</h1>'.'</br>'.'wait 1 seconds...';
    header('refresh: 1; ../login.php');
?>