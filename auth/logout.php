<?php
    session_start();
    session_unset();
    session_destroy();

    header(header: 'Refresh: 2; URL = login.php');
?>