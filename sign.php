<?php 
$user = 0 ;
$succes = 0;
$invalid = 0;

// هنشوف نوع الميثود
if($_SERVER['REQUEST_METHOD']=='POST'){  
    // لو الميثود زي ما عاملين بوست هيستدعي الملف الكونيكت بالداتا بيز
    include('connect.php');

    // هنعمل متغير اسمه يوزرنيم وهنحط فيه القيمه اللي المستخدم دخلها في الانبوت واللي هي 
    // name=username اللي الباك اند بيعرف منها 
    $username = $_POST['username'];
    // نفس الكلام مع الباسورد
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // نعمل الاستعلام ده عشان نشوف لو اليوزر اللي انت هتدخله موجود ف عمود اليوزرس يعني موجود ف الداتا بيز ولا لا
    $sql = "SELECT*FROM `registration` WHERE username='$username'";
    $result = mysqli_query($con , $sql);
    
    // لو الاستعلام صحيح يعني
    if($result){
      // هنعمل متغير ونحط فيه الفانكشن دي بتشوف كام صف متكرر في الاستعلام اللي انت حطيته جوا فيها بترجع رقم
      // يعني لو عندك صف يعني الناتج هيكون واحد و هكذا
      $num = mysqli_num_rows($result);
      
      // لو عدد الصفوف اكبر من صفر معناها ان في صف او اكتر ولو في صف يبقي كده انت بالفعل عندك يوزر بالبيانات دي
      if($num > 0){
        // echo "user already exist";
        $user = 1 ;
      }

      //لو مش موجود هنعمل استعلام تاني عشان نحط بيه البيانات داخل الحدول
      else{
        // بشنوف الباسوردين زي بعض ولا لا 
        if($password === $cpassword){
          // عملنا متغير اللي هيستقبل القيم اللي انت هتدخلها اللي هو يعني لما تعمل اكونت هيحطهم ف الجدول ريجستريشن 
          // ويحط ف عمود اليوزر اليوزر و عمود الباس يحد الباسورد اللي انت عملته
          $sql = "INSERT INTO `registration` ( username , password) VALUE ('$username','$password')";

          // عملنا متغير و عملنا الفانكشن دي بتاخد المتغير بتاع الكونيكشن و المتغير اللي بياخد البيانات دي زي الاستعلام كده 
          $result = mysqli_query($con , $sql);

          //هنشوف لو البيانات اتحط بنجاح
          if($result){
            // echo "signup successful";
            // لو اتحطت بنجاح هنخلي قيمه المتغير ساكسيس بواحد
            $succes = 1 ;
            // header('location:login.php');
          }
        }else{
          $invalid = 1 ;
        }
  
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
    <title>signup page</title>
  </head>
  
  <body>

    <div name="container">
     
    <!-- عملنا الاكشن يروح يبعت البيانات لنفس الصفحة دي عشان البيانات اللي انت دخلتها تروح علي الكود بتاع
  البي اتش بي اللي فوق ويتنفذ  -->
    <form method="post" action="sign.php"> 

    <p><h1>Sign up page</h1></p>
    <p><hr></p>

    <div class="form-group">
    <p><h4><label for="exampleInputEmail1">Email</label></h4></p>
    <p><input type="email" class="form-control"  placeholder="Email" name="username"></p>
    </div> 

    <div class="form-group">
    <p><h4><label for="exampleInputPassword1">Password</label></h4></p>
    <p><input type="password" class="form-control" placeholder="Password" name="password"></p>
    </div>
    <!--  -->
    <div class="form-group">
    <p><h4><label for="exampleInputPassword1">Confirm Password</label></h4></p>
    <p><input type="password" class="form-control" placeholder="Confirm Password" name="cpassword"></p>
    </div>
    <!--  -->
    <p><button type="submit" class="btn btn-primary">Sign up</button></p>
    </form>

    </div>
    
    <p>
      Are you have an account? <a href='login.php' > Login </a>
    </p>

    
    <p>
      <?php
      if($user){
        echo "Sorry user already exist...";
      }
       ?>
    </p>

    <p>
      <?php
      if($succes){
        echo "signup successful, You can click on login button";
      }
       ?>
    </p>

    <p>
      <?php
      if($invalid){
        echo "ohhh no invalid credentials....!";
      }
       ?>
    </p>
    
   
  </body>
</html>