<?php
session_start();
session_destroy();
header("location:/peak_login.php");
?>