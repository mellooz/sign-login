<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'signupforms';

$con = mysqli_connect($hostname , $username , $password , $dbname);

// لو مش اشتغل الكونيكت هيجيب الخطأ
if(!$con){
    die(mysqli_error($con)); 
    // die("no"); -> فانكشن بتعرض رساله لكن اللي جواها ف اللي فوق ده بيعرض نوع الخطأ
}
?>