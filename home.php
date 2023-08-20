<?php 
// بيانات السيشن موجودة لسه عشان انت اصلا عملتها ف الصفحة اللي جاي منها
//لو السيشن مش موجود هيرجعك لصفحه اللوجين غير كده هيكمل باقي الكود
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
    exit ;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>welcome page</title>
  </head>

  <body>
    <p><h1>
        Welcome <?php echo $_SESSION['username']; ?>
    </h1></p>
    
    <!-- عملنا زرار لوج اوت هيوديك ع الصفحة دي -->
    <p>
        <a href='logout.php' > Logout </a>
    </p>
    
  </body>

  </html>