<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    
    require_once('./mvc/Brigde.php');
    $app = new App();
?>