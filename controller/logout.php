<?php
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    $_SESSION['success'] = 'Đăng xuất thành công';
}
header('Location: ' . Config::SITE_URL . "public/login");

