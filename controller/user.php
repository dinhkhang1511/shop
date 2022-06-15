<?php
if(!isset($_SESSION['user'])||empty($_SESSION['user']))
{
    header('Location: ' . Config::SITE_URL . "public/login");
    exit;
}else{
    $user = $_SESSION['user'];
}

if($user['role'] != 'admin')
{
    $_SESSION['error'] = 'Bạn không có quyền truy cập trang này';
    header('Location: ' . Config::SITE_URL . "public/admin");
    exit;
}

// * Get USERS and show on client
try{
    $conn = MySQL::getDB();
    $stmt = $conn->prepare('SELECT * from `USERS` ');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while($row = $stmt->fetch())
    {
        $users_[] = array('id'           => $row['id'],
                          'name'         => $row['name'],
                          'email'        => $row['email'],
                          'role'         => $row['role'],
                          'created_at'   => $row['created_at']);
    }
}
catch(PDOException $ex)
{
    die($ex->getMessage()); // ! Nên ghi ra file log

}
require ROOTPATH . '/public/views/user.php';

?>
