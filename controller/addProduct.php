<?php
    if(!isset($_SESSION['user'])||empty($_SESSION['user']))
    {
        header('Location: ' . Config::SITE_URL . "public/login");
        exit;
    }else{
        $user = $_SESSION['user'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET')
        header('Location: ' . Config::SITE_URL . 'public/product' );
    
    // $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $author_id = $user['id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $create_at = date('Y-m-d');

    if(empty($name) ||empty($category_id) || empty($price) || empty($description) || empty($_FILES['image']['name']) )
    {
        $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
    }
    else
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

        $album = isset($_FILES['album']) ?  reArrayFiles($_FILES['album']) : '';

        try
     {
        
        $conn = MySQL::getDB();
        
        $stmt = $conn->prepare('INSERT INTO PRODUCTS (id, name, category_id, image, author, price, quantity, description, created_at, update_at)
                            VALUES (NULL, :name, :category_id, :image, :author_id, :price, :quantity, :description, :date, NULL)');
        $stmt->bindParam(':name' , $name);
        $stmt->bindParam(':category_id' , $category_id);
        $stmt->bindParam(':image' , $image );
        $stmt->bindParam(':author_id' , $author_id);
        $stmt->bindParam(':price' , $price);
        $stmt->bindParam(':quantity' , $quantity);
        $stmt->bindParam(':description' , $description);
        $stmt->bindParam(':date' , $create_at);

        $stmt->execute();
        $product_id = $conn->lastInsertId();
        // END THÊm PRODUCT

        // START THÊM IMAGE ALBUM

        $stmt2 = $conn->prepare('INSERT INTO images (id, name, product_id) VALUES (NULL, :name_image, :product_Id)');

        if(!empty($album['name']))
        {
            foreach ($album as $img)
            {
                uploadFile($img);
                if(isset($_SESSION['uploadError']))
                {
                    $_SESSION['error'] = $_SESSION['uploadError'];
                    unset($_SESSION['uploadError']);
                    $conn->exec('DELETE FROM PRODUCTS WHERE PRODUCTS.id = ' . $product_id );
                    header('Location: ' . Config::SITE_URL . 'public/product');
                    exit;
                }
                $stmt2->bindParam(':name_image',explode('.',$img['name'])[0]); // * Lấy tên của image nhưng không lấy đuôi
                $stmt2->bindParam(':product_Id',$product_id);
                $stmt2->execute();
            }
        }

        $_SESSION['success'] = 'Thêm thành công';
        
         
     }catch (PDOException $e)
     {
         die($e->getMessage());
         exit;
     }

    }
    header('Location: ' . Config::SITE_URL . 'public/product');
?>