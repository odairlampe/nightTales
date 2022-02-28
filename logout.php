<?php
session_start();

$encerrar = (session_destroy());

if ($encerrar) {
header("location:index.php");
exit;
}
?>