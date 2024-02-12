<!DOCTYPE html>
<html lang="en">
<body>

<?php

class Shape {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
}

class Rectangle extends Shape {
    protected $width;
    protected $height;
    
    public function __construct($width, $height, $color) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }
    
    public function draw() {
        echo '<svg width="' . $this->width . '" height="' . $this->height . '" xmlns="http://www.w3.org/2000/svg">';
        echo '<rect width="' . $this->width . '" height="' . $this->height . '" fill="' . $this->color . '" stroke="black" stroke-width="4" />';
        echo '</svg>';
    }
}

class Circle extends Shape {
    protected $radius;
    
    public function __construct($radius, $color) {
        parent::__construct($color);
        $this->radius = $radius;
    }
    
    public function draw() {
        echo '<svg height="' . ($this->radius * 2) . '" width="' . ($this->radius * 2) . '" xmlns="http://www.w3.org/2000/svg">';
        echo '<circle r="' . $this->radius . '" cx="' . $this->radius . '" cy="' . $this->radius . '" stroke="black" stroke-width="3" fill="' . $this->color . '" />';
        echo '</svg>';
    }
}

class Triangle extends Shape {
    public function draw() {
        echo '<svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">';
        echo '<polygon points="50,1 -20,200 120,190" stroke="black" stroke-width="3" fill="' . $this->color . '" />';
        echo '</svg>';
    }
}

// Voorbeeld van het gebruik van de klassen:

$rectangle1 = new Rectangle(100, 100, "cyan");
$rectangle2 = new Rectangle(100, 100, "blue");
$rectangle3 = new Rectangle(100, 100, "green");

$circle1 = new Circle(45, "cyan");
$circle2 = new Circle(45, "blue");
$circle3 = new Circle(45, "green");

$rectangleLong1 = new Rectangle(100, 50, "cyan");
$rectangleLong2 = new Rectangle(100, 50, "blue");
$rectangleLong3 = new Rectangle(100, 50, "green");

$triangle1 = new Triangle("cyan");
$triangle2 = new Triangle("blue");
$triangle3 = new Triangle("green");

// Weergave van de vormen
$rectangle1->draw();
$rectangle2->draw();
$rectangle3->draw();
echo '<br>';
$circle1->draw();
$circle2->draw();
$circle3->draw();
echo '<br>';
$rectangleLong1->draw();
$rectangleLong2->draw();
$rectangleLong3->draw();
echo '<br>';
$triangle1->draw();
$triangle2->draw();
$triangle3->draw();

?>

</body>
</html>
