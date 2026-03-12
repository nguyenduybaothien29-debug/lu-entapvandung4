<?php
$errors = [];
$username = "";
$email = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);
$password = $_POST["password"];
$repeat = $_POST["repeat-password"];

if(empty($username)){
$errors["username"]="Vui lòng nhập họ tên";
}

if(empty($email)){
$errors["email"]="Vui lòng nhập email";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors["email"]="Email không đúng định dạng";
}

if(empty($password)){
$errors["password"]="Vui lòng nhập mật khẩu";
}elseif(strlen($password)<6){
$errors["password"]="Mật khẩu phải ít nhất 6 ký tự";
}

if($repeat!=$password){
$errors["repeat"]="Mật khẩu xác nhận không khớp";
}

if(empty($errors)){

setcookie("username",$username,time()+3600);
setcookie("email",$email,time()+3600);
setcookie("password",$password,time()+3600);

header("Location: login.php");
exit();

}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./reset.css">
<link rel="stylesheet" href="./style.css">
<title>Register</title>
</head>

<body>

<h2>Đăng ký</h2>

<?php if(!empty($errors)): ?>
<div style="color:red">
<?php foreach($errors as $error): ?>
<p><?php echo $error; ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form method="post">

<input type="text" name="username" placeholder="Họ tên" value="<?php echo $username; ?>">

<br><br>

<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

<br><br>

<input type="password" name="password" placeholder="Mật khẩu">

<br><br>

<input type="password" name="repeat-password" placeholder="Xác nhận mật khẩu">

<br><br>

<input type="submit" value="Đăng ký">

</form>

<br>

<a href="login.php">Đăng nhập</a>

</body>
</html>