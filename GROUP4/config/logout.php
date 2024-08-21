<?php
SESSION_START();
session_destroy();
unset($_SESSION['status']);
Header("Location: ../index.php");
?>