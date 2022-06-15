<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // * Kết nối database, check user

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirm_password = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';
        if(empty($username) || empty($email) || empty($password) || empty($confirm_password))
        {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
            goto error;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['error'] = 'Email không hợp lệ';
            goto error;
        }
        else if($password != $confirm_password)
        {
            $_SESSION['error'] = 'Email không hợp lệ';
            goto error;
        }


        try{
            $date = strval(date('Y-m-d'));
            $role = 'user';
            $password = md5($password);

            $conn = MySQL::getDB();
            $stmt = $conn->prepare(' INSERT INTO USERS (id, name, email, password, role, created_at, secret)
                                     VALUES              (NULL, :username, :email, :password, :role, :date, NULL) ');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $_SESSION['success'] = 'Đăng ký thành công';
            header('Location: ' . Config::SITE_URL . "public/login");
            return;
        }catch(PDOException  $ex)
        {
            die( $ex->getMessage());
            // ! Nên ghi lỗi vào file log 
        }

    }

    error: 
    require ROOTPATH."/public/views/register.php";
?>