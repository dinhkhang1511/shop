<?php 
    if(!isset($_SESSION['user'])||empty($_SESSION['user']))
    {
        header('Location: ' . Config::SITE_URL . "public/login");
        exit;
    }else{
        $user = $_SESSION['user'];
    }

    

    if($_SERVER['REQUEST_METHOD'] == 'GET' || empty($_POST['product_id']))
    {
        $_SESSION['error'] = 'Không tìm thấy sản phẩm';
        header('Location: ' . Config::SITE_URL . 'public/product' );
        exit;
    }
    try
    {
       $id = $_POST['product_id'];
       $conn = MySQL::getDB();
       
       $stmt = $conn->prepare('SELECT * FROM PRODUCTS WHERE PRODUCTS.id = :id' );

       $stmt->bindParam(':id' , $id);
       $stmt->execute();
       $product = $stmt->fetch(PDO::FETCH_ASSOC);
       if(empty($product))
       {
            $_SESSION['error'] = 'Không tìm thấy sản phẩm';
            header('Location: ' . Config::SITE_URL . 'public/product' );
            exit;
       }
    }catch (PDOException $e)
    {
        die($e->getMessage());
        exit;
    }

    if(!empty($_FILES['image']['name']))
    {
        
        require_once ROOTPATH . '/helper/uploadFile.php';
        uploadFile($_FILES['image']);
        if(isset($_SESSION['uploadError']))
        {
            $_SESSION['error'] = $_SESSION['uploadError'];
            unset($_SESSION['uploadError']);
            header('Location: ' . Config::SITE_URL . 'public/product');
            exit;
        }
        $image = explode('.',$_FILES["image"]["name"])[0];
    }
    else
    {
        $image = $product['image'];
    }
    
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $update_at = date('Y-m-d');


    if(empty($name) ||empty($category_id) || empty($price) || empty($description) || empty($quantity)  )
    {
        $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
        header('Location: ' . Config::SITE_URL . 'public/product');
    }
    else
    {
        try
     {
        
        $conn = MySQL::getDB();
        
        $stmt = $conn->prepare('UPDATE PRODUCTS  SET  name = :name, category_id = :category_id, image = :image, 
                                price = :price, quantity = :quantity, description = :description, update_at = :update_at WHERE PRODUCTS.id = :id' );

        $stmt->bindParam(':id' , $id);
        $stmt->bindParam(':name' , $name);
        $stmt->bindParam(':category_id' , $category_id);
        $stmt->bindParam(':image' , $image );
        $stmt->bindParam(':price' , $price);
        $stmt->bindParam(':quantity' , $quantity);
        $stmt->bindParam(':description' , $description);
        $stmt->bindParam(':update_at' , $update_at);


        $stmt->execute();
        $_SESSION['success'] = 'Sửa thành công';
        header('Location: ' . Config::SITE_URL . 'public/admin');

     }catch (PDOException $e)
     {
         die($e->getMessage());
         exit;
     }

    }
?>