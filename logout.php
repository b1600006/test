<?php session_start(); 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
}
?>
<a href="index.php">Đăng Nhập</a>