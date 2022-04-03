<?php

    session_name('user');
    session_start();

    session_destroy();
    setcookie('user','', time() - 86400, '/');

    header("Location: ../index.php");

?>