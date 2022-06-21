<?php
session_start();
$_SESSION = [];
unset($_SESSION);
header("Location:https://www.netgigs.co.in/ ");
exit();
?>
