<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['sepet'][$index])) {
        unset($_SESSION['sepet'][$index]);
        $_SESSION['sepet'] = array_values($_SESSION['sepet']);
    }
}

header("Location: sepet.php");
exit();
?>
