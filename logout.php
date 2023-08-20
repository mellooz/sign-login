<?php 
// عملت لوج اوت و عاوز اخرج ف هيشيل السيشن 
session_start();
session_destroy();

// بعد كده هيرجع لصفحه اللوجين

header('location:login.php');
exit;


?>