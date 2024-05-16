<?php

require_once './Entities/Product.php';
$P = new Product();

$db = new PDO('mysql:host=DB;dbname=robot-store', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//if ($_GET != null){
//    $id = $_GET['id'];
//}
//else{
//    $id = null;
//}

$query = $db->prepare('SELECT `id`, `title`, `price`, `image`, `category_id`, `category`, `character_id`, `character`, `description` FROM `products`');
$query->execute();

$query->setFetchMode(PDO::FETCH_CLASS, $P::class);

$products = $query->fetchAll();

echo '<html>';
echo '<head>';
    echo '<link rel="stylesheet" href="style.css">';
echo '</head>';

echo '<body>';

    echo '<div class="container">';

        echo '<div class="navBar">';
            echo '<h2> Categories </h2>';
                echo '<input type="checkbox" class="checkBox"> ' . ' Aprons' . '<br>';
                echo '<input type="checkbox" class="checkBox">' . ' Baseball Hats' . '<br>';
                echo '<input type="checkbox" class="checkBox">' . ' Mugs' . '<br>';
                echo '<input type="checkbox" class="checkBox">' . ' T-Shirts' . '<br>';
            echo '<h2> Characters </h2>';
                echo '<input type="checkbox" class="checkBox">' . ' Bubbles' . '<br>';
                echo '<input type="checkbox" class="checkBox">' . ' Delores' . '<br>';
                echo '<input type="checkbox" class="checkBox">' . ' Fred' . '<br>';
                echo '<input type="checkbox" class="checkBox">' . ' Rex';
        echo '</div>';


        echo '<div class="productGrid">';
            foreach ($products as $product){
                echo $product->frontDisplay();
            }
        echo '</div>';

    echo '</div>';

echo '<body>';
echo '</html>';;