<?php

$user = $_SESSION['user'];
if($user['id'] && isset($user['id']))
{
    // * Get product and show on client
    $id = empty($_POST['product_id']) ? '' : $_POST['product_id'];
    if(!isset($id) || empty($id))
    {  
        header('Location: ' . Config::SITE_URL . "public/admin");
    }
    else
    {
        
        $conn = MySQL::getDB();
        $stmt = $conn->prepare('SELECT * FROM PRODUCTS WHERE PRODUCTS.id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if(empty($product))
        {
            $_SESSION['error'] = 'Sản phẩm ko tồn tại';
            header('Location: ' . Config::SITE_URL . "public/admin");
            exit;
        }




        // * Xóa product cascade cả img link vs product
        $stmt = $conn->prepare('DELETE FROM `PRODUCTS` WHERE `PRODUCTS`.id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

       
        if(unlink(ROOTPATH . '/public/img/product_img/' . $product['image'] . Config::EXT_IMG))
            $_SESSION['success'] = 'Xóa thành công';
        else
            $_SESSION['success'] = 'Xóa thành công khỏi database nhưng chưa xóa khỏi server';
        header('Location: ' . Config::SITE_URL . "public/admin");
    }
}
else
{
    header('Location: ' . Config::SITE_URL . "public/login");
}