<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // * Kết nối database, check user

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if(empty($username) || empty($password))
        {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
            require ROOTPATH."/public/views/login.php";
            return;
        }


        $password = md5($password);


        $conn = MySQL::getDB();
        $stmt = $conn->prepare(' SELECT * FROM USERS WHERE name = :username AND password = :password ');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array('username'=> $username,
                            'password' => $password ));
        $user = $stmt->fetch();

        if($user && !empty($user))
        {
            $_SESSION['user'] = $user;
        }else 
        {
            $_SESSION['error'] = 'Sai tên đăng nhập hoặc mật khẩu';
        }


    }

    error: 
    require ROOTPATH."/public/views/login.php";
?>