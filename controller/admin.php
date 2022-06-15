<?php
$user = $_SESSION['user'];


if($user['id'] && isset($user['id']))
{
    if(empty($param))
    {
        // * Get product and show on client
        $conn = MySQL::getDB();
        $stmt = $conn->prepare('SELECT `PRODUCTS`.*,CATEGORIES.name as category_name , USERS.name as author_name  , USERS.role as author_role
                                from `PRODUCTS` inner join `USERS` on USERS.id = PRODUCTS.author 
                                inner join `CATEGORIES` on categories.id = PRODUCTS.category_id ORDER BY PRODUCTS.id DESC');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch())
        {
            $products_[] = array('id'          => $row['id'],
                               'name'          => $row['name'],
                               'category_id'   => $row['category_id'],
                               'author'        => $row['author'],
                               'price'         => $row['price'],
                               'image'         => $row['image'],
                               'quantity'      => $row['quantity'],
                               'description'   => $row['description'],
                               'category_name' => $row['category_name'],
                               'author_name'   => $row['author_name'],
                               'author_role'   => $row['author_role']);
        }
        
        require ROOTPATH . '/public/views/admin.php';
    }
    else
    {
        $conn = MySQL::getDB();
        $stmt = $conn->prepare('SELECT `PRODUCTS`.*,CATEGORIES.name as category_name , USERS.name as author_name  , USERS.role as author_role
                                from `PRODUCTS` inner join `USERS` on USERS.id = PRODUCTS.author 
                                inner join `CATEGORIES` on categories.id = PRODUCTS.category_id WHERE PRODUCTS.author = :id ORDER BY PRODUCTS.id DESC');
                                
        $stmt->bindParam(':id',$param);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        while($row = $stmt->fetch())
        {
            $products_[] = array('id'          => $row['id'],
                               'name'          => $row['name'],
                               'category_id'   => $row['category_id'],
                               'author'        => $row['author'],
                               'price'         => $row['price'],
                               'image'         => $row['image'],
                               'quantity'      => $row['quantity'],
                               'description'   => $row['description'],
                               'category_name' => $row['category_name'],
                               'author_name'   => $row['author_name'],
                               'author_role'   => $row['author_role']);
        }
        
        require ROOTPATH . '/public/views/admin.php';
    }
}
else
{
    header('Location: ' . Config::SITE_URL . "public/login");
}
