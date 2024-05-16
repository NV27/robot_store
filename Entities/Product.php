<?php
 //id`, `title`, `price`, `image`, `category`, `character_id`, `character`, `description
class Product{

    private int $id;
    public string $title;
    private float $price;
    public string $image;
    private int $category_id;
    private string $category;
    private int $character_id;
    private string $character;
    private string $description;

    public function GetPrice() : int{
        return $this->price;
    }

    public function frontDisplay() : string {
        return '<a class="frontDisplay" href="https://google.com">'
            . '<image class="img" src="' . $this->image . '"></image>'
            . '<p class="frontTitle">' . $this->title . '</p>'
            . '<p class="frontPrice"> $' . $this->price . '</p>'
            . '</a>';
    }

}