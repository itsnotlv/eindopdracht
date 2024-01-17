<?php
session_start();

// Vernietig de sessie
session_destroy();

// Stuur de gebruiker terug naar het inlogscherm
header("Location: login_form.html");
exit();
?>
