<?php
session_start();

if (!(isset($_SESSION['valid']) && $_SESSION['valid'] == true)) {
    header(header: 'Location: login.php');
}
