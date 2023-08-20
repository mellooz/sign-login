<?php 
$login = 0 ;
$inavlid = 0;



// هنشوف نوع الميثود
if($_SERVER['REQUEST_METHOD']=='POST'){  
    // لو الميثود زي ما عاملين بوست هيستدعي الملف الكونيكت بالداتا بيز
    include('connect.php');

    // هنعمل متغير اسمه يوزرنيم وهنحط فيه القيمه اللي المستخدم دخلها في الانبوت واللي هي 
    // name=username اللي الباك اند بيعرف منها 
    $username = $_POST['username'];
    // نفس الكلام مع الباسورد
    $password = $_POST['password'];
    
    // هنعمل الكويري دي عشان نتأكد ان اليوزر اللي دخلته موجود و الباسورد بتاعة صح ولا لا عشان نعمل لوجين
    $sql = "SELECT*FROM `registration` WHERE username='$username' and password='$password' ";
    $result = mysqli_query($con , $sql);
    
    // لو الاستعلام صحيح يعني
    if($result){
      // هنعمل متغير ونحط فيه الفانكشن دي بتشوف كام صف متكرر في الاستعلام اللي انت حطيته جوا فيها بترجع رقم
      // يعني لو عندك صف يعني الناتج هيكون واحد و هكذا
      $num = mysqli_num_rows($result);
      
      // لو عدد الصفوف اكبر من الصفر يعني اليوزر موجود يبقي هيدخل ويعمل لوجين
      if($num > 0){
        // echo "login successful";
        $login = 1 ;

        // عملنا سيشن عشان نفس المبدأ اللي انت عارفه
        session_start();

        // عملنا سيشن بأسم يوزر نيم هنخلي السيشن دي بتساوي اليوزرنيم اللي انت دخلته
        //السيشن عشان بس يحفظ بياناتك بدل ما تكتب كل شوية
        $_SESSION['username'] = $username ;

        //الهيدر هيوديك علي الصفحه دي بعد ما تعمل لوجين و بيودي الداتا معاك  
        header('location:home.php');
        exit;
      }

      // لو مش موجود هيقولك بيانات خطأ
      else{
        // echo "invalid data";
        $inavlid = 1 ;
  
      }
      
    }


  }














?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login page</title>
  </head>

  <body>

    <div name="container">

    <form method="post" action="login.php"> 

    <p><h1>login page</h1></p>
    <p><hr></p>

    <div class="form-group">
    <p><h4><label for="exampleInputEmail1">Email</label></h4></p>
    <p><input type="email" class="form-control"  placeholder="Email" name="username"></p>
    </div> 

    <div class="form-group">
    <p><h4><label for="exampleInputPassword1">Password</label></h4></p>
    <p><input type="password" class="form-control" placeholder="Password" name="password"></p>
    </div>

    <p><button type="submit" class="btn btn-primary">Login</button></p>
    </form>

    </div>

    <p>
      You dont have an account? <a href='sign.php' > sign up </a>
    </p>

    <!-- <p>
      <?php
      if($login){
        echo "welcome to our website!";
      }
       ?>
    </p> -->
    <p>
      <?php
      if($inavlid){
        echo "invalid data";
      }
       ?>
    </p>
      
  </body>
</html>