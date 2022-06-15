<?php
    $conn = MySQL::getDB();
    $stmt = $conn->prepare('SELECT * FROM PRODUCTS ');
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
                           'description'   => $row['description']);
    }

    $stmt = $conn -> prepare('SELECT * FROM CATEGORIES ');
         $stmt->execute();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC))
         {
             $categories_[] = array('id' => $row['id'],
                                    'name' => $row['name'],
                                    'parent_id' => $row['parent_id']);
         }
    
    require_once ROOTPATH . '/public/views/home.php'
?>