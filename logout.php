<?php
session_start();
unset ($_SESSION['correo']);
unset ($_SESSION['privilegios']);
session_destroy();
header('Location: index.php');