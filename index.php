<?php

require_once './Entities/Product.php';
$db = new PDO('mysql:host=DB;dbname=robot-store', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `id`, `title`, `price`, `image`, `category_id`, `category`, `character_id`, `character`, `description` FROM `products`');
$query->execute();

$query->setFetchMode(PDO::FETCH_CLASS, Product::class);

$products = $query->fetchAll();

$aprons = (isset($_GET['aprons']));
$mugs = (isset($_GET['mugs']));
$hats = (isset($_GET['hats']));
$shirts = (isset($_GET['shirts']));

$bubbles = (isset($_GET['bubbles']));
$dolores = (isset($_GET['dolores']));
$fred = (isset($_GET['fred']));
$rex = (isset($_GET['rex']));

echo '<html>';
echo '<head>';
    echo '<link rel="stylesheet" href="style.css">';
echo '</head>';

echo '<body>';

    echo '<div class="container">';

        echo '<div class="navBar">';
            echo '<form>';
                echo '<h2> Categories </h2>';
                    echo '<input type="checkbox" class="checkBox" name="aprons" > ' . ' Aprons' . '<br>';
                    echo '<input type="checkbox" class="checkBox" name="hats" > ' . ' Baseball Hats' . '<br>';
                    echo '<input type="checkbox" class="checkBox" name="mugs" >' . ' Mugs' . '<br>';
                    echo '<input type="checkbox" class="checkBox" name="shirts" >' . ' T-Shirts' . '<br>';
                echo '<h2> Characters </h2>';
                    echo '<input type="checkbox" class="checkBox" name="bubbles">' . ' Bubbles' . '<br>';
                    echo '<input type="checkbox" class="checkBox" name="dolores">' . ' Dolores' . '<br>';
                    echo '<input type="checkbox" class="checkBox" name="fred">' . ' Fred' . '<br>';
                    echo '<input type="checkbox" class="checkBox" name="rex">' . ' Rex';
                echo '<br><br><input type="submit" value="search"></submit>';
                echo '</form>';
        echo '</div>';


        echo '<div class="productGrid">';
            foreach ($products as $product){
                //categories
                if ($product->getCategory() == 'Aprons' && $aprons){
                    echo $product->frontDisplay();
                }
                else if ($product->getCategory() == 'Mugs' && $mugs){
                    echo $product->frontDisplay();
                }
                else if ($product->getCategory() == 'Baseball Hats' && $hats){
                    echo $product->frontDisplay();
                }
                else if ($product->getCategory() == 'T-shirts' && $shirts){
                    echo $product->frontDisplay();
                }

                //characters
                else if ($product->getCharacter() == 'Bubbles' && $bubbles){
                    echo $product->frontDisplay();
                }
                else if ($product->getCharacter() == 'Dolores' && $dolores){
                    echo $product->frontDisplay();
                }
                else if ($product->getCharacter() == 'Fred' && $fred){
                    echo $product->frontDisplay();
                }
                else if ($product->getCharacter() == 'Rex' && $rex){
                    echo $product->frontDisplay();
                }

                //if nothing is checked show all
                else if ($aprons+$mugs+$hats+$shirts+$bubbles+$dolores+$fred+$rex == 0){
                    echo $product->frontDisplay();
                }


            }
        echo '</div>';

    echo '</div>';

echo '<body>';
echo '</html>';;