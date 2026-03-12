<?php
if(!isset($_COOKIE["username"])){
header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Success</title>
</head>

<body>

<h1>Đăng nhập thành công</h1>

<h2>Xin chào <?php echo $_COOKIE["username"]; ?></h2>

<br>

<a href="login.php">Quay lại đăng nhập</a>

</body>
</html>