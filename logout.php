<?php
session_start();
include "./include/function.php";
session_destroy();
header('Location: ./');
?>