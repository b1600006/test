<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtUsername'])){
        die('');
    }
     
	//Kết nối tới database
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "demo";
    
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = addslashes($_POST['txtBirthday']);
    $sex        = addslashes($_POST['txtSex']);
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
          
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    $sql = "SELECT username FROM member WHERE username='$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
	}
          
          
    //Lưu thông tin thành viên vào bảng
	$sql = "INSERT INTO member (
				username,
				password,
				email,
				fullname,
				birthday,
				sex)
			VALUES (
			'{$username}',
            '{$password}',
            '{$email}',
            '{$fullname}',
            '{$birthday}',
            '{$sex}')";
    
                          
    //Thông báo quá trình lưu
    if ($conn->query($sql) === TRUE){
		echo "Quá trình đăng ký thành công. <a href='/app/index.php'>OK</a>";
	}
	else{
		echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
	}
        	
	$conn->close();
?>