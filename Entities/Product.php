<?php
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
    public function getDescription(){
        return $this->description;
    }

    public function getCategory() : string{
        return $this->category;
    }
    public function getCharacter() : string{
        return $this->character;
    }
    private function MakePage() : string {
        return 'productView.php?id=' . $this->id;
    }
    public function GetPrice() : int{
        return $this->price;
    }

    public function getTagline() : string{

        $words = ['Baseball Hat', 'Apron', 'Mug', 'T-shirt'];
        $tagline = $this->title;

        for($i=0; $i<count($words); $i++){
            $tagline =  str_replace($words[$i], '', $tagline);
        }

        return $tagline;

    }

    public function frontDisplay() : string
    {

        $h = 'productView.php?id=' . $this->id;

        return "<a class='frontDisplay' href=$h>"
            . '<image class="img" src="' . $this->image . '"></image>'
            . '<p class="frontTitle">' . $this->title . '</p>'
            . '<p class="frontPrice"> $' . $this->price . '</p>'
            . '</a>';
    }

    public function productDisplay() : string
    {

        return "
            <div class='pContainer'>
                <img class='pImg' src=" . $this->image . " />
                <div class='pContent'>
                    <h1 class='productTitle'>" . $this->title . "</h1>
                    <h2 class='productPrice'> $" . $this->price . "</h2>
                    <p>" . $this->description . "</p>
                    <h3>" . $this->getTagLine() . "</h3>
                </div>
            </div>
            ";
    }



}