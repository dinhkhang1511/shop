<?php
    if(!isset($_SESSION['user'])||empty($_SESSION['user']))
    {
        header('Location: ' . Config::SITE_URL . "public/login");
        exit;
    }else{
        $user = $_SESSION['user'];
    }
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] :   '' ;


    
     try
     {
         $conn = MySQL::getDB();
         if(!empty($product_id))
         {
            //   Lấy product nếu đang edit
                $stmt = $conn->prepare('SELECT PRODUCTS.*, USERS.role as author_role FROM PRODUCTS  inner join USERS on PRODUCTS.author = USERS.id where PRODUCTS.id = :id');
                $stmt->bindParam(':id' , $product_id);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                if($product['author'] != $user['id'])
                {
                    if( $user['role'] == 'user' || $product['author_role'] == 'admin')
                    {
                        $_SESSION['error'] = 'Bạn không được quyền chỉnh sửa sản phẩm này';
                        unset($product);
                        header('Location:' . Config::SITE_URL . 'public/admin');
                        exit;
                    }
                }
                // Lấy ALBUM  hình
                $stmt = $conn->prepare('SELECT * FROM `images` WHERE images.product_id = :id');
                $stmt->bindParam(':id' , $product_id);
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $images_[] = array('id' => $row['id'],
                                    'name' => $row['name'],
                                    'product_id' => $row['product_id']);
                }
         }
         
         
         $stmt = $conn -> prepare('SELECT * FROM CATEGORIES ');
         $stmt->execute();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC))
         {
             $categories_[] = array('id' => $row['id'],
                                    'name' => $row['name'],
                                    'parent_id' => $row['parent_id']);
         }

         

     }catch (PDOException $e)
     {
         die($e->getMessage()); // ! ghi vô file log
     }
     
    require_once ROOTPATH . '/public/views/product.php'
?>