<?php

require_once './Entities/Product.php';


$id = $_GET['id'];



$db = new PDO('mysql:host=DB;dbname=robot-store', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//converts to int for checks because it's originally a string, and makes sure it's still an int and not empty with is_int
//kinda weird converting to an int and then doing the check but it catches most cases of random id's
//Then checks if it's within the limits of the data
if (is_int((int)$id)){
    if ($id > 0 && $id <= 16){
        $query = $db->prepare('SELECT 
            `id`, 
            `title`, 
            `price`, 
            `image`, 
            `category_id`, 
            `category`,
            `character_id`, 
            `character`, 
            `description` 
            FROM `products` 
            WHERE `id` = :id');


        //flooring here fixes errors with inputting a float into the url
        $query->execute(['id' => floor($id)]);
    }
    else{
        $query = $db->prepare('SELECT 
            `id`, 
            `title`, 
            `price`, 
            `image`, 
            `category_id`, 
            `category`,
            `character_id`, 
            `character`, 
            `description` 
            FROM `products`');

        $query->execute();
    }
}

$query->setFetchMode(PDO::FETCH_CLASS, Product::class);

$products = $query->fetchAll();

echo '<head>';
    echo '<link rel="stylesheet" href="style.css">';
echo '</head>';



foreach ($products as $product){
    echo $product->productDisplay();
}