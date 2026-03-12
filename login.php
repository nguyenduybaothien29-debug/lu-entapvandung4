<?php
$errors=[];

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email=$_POST["email"];
$password=$_POST["password"];

if(empty($email)){
$errors["email"]="Vui lòng nhập email";
}

if(empty($password)){
$errors["password"]="Vui lòng nhập mật khẩu";
}

if(empty($errors)){

if(isset($_COOKIE["email"]) && isset($_COOKIE["password"])){

if($email==$_COOKIE["email"] && $password==$_COOKIE["password"]){

header("Location: success.php");
exit();

}else{
$errors["login"]="Sai email hoặc mật khẩu";
}

}else{
$errors["login"]="Chưa có dữ liệu đăng ký";
}

}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>

<body>

<h2>Đăng nhập</h2>

<?php if(!empty($errors)): ?>
<div style="color:red">
<?php foreach($errors as $error): ?>
<p><?php echo $error; ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form method="post">

<input type="email" name="email" placeholder="Email">

<br><br>

<input type="password" name="password" placeholder="Mật khẩu">

<br><br>

<input type="submit" value="Đăng nhập">

</form>

<br>

<a href="register.php">Đăng ký</a>

</body>
</html>