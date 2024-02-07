<?php

class House {
    private $floor;
    private $rooms;
    private $width;
    private $height;
    private $depth;
    private $volume;

    public function __construct() {
        $this->floor = 0;
        $this->rooms = 0;
        $this->width = 0.0;
        $this->height = 0.0;
        $this->depth = 0.0;
        $this->volume = 0;
    }

    public function constructHouse($floor, $rooms, $width, $height, $depth) {
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->setVolume($width, $height, $depth);
    }

    private function setVolume($width, $height, $depth) {
        $this->volume = (int)($width * $height * $depth);
    }

    public function getHouseDetails() {
        return "Dit huis heeft {$this->floor} verdieping(en), {$this->rooms} kamer(s) en heeft een volume van {$this->volume} m3";
    }

    public function getPrice() {
        $price_per_cubic_meter = 1500; // prijs per kubieke meter
        $price = $this->volume * $price_per_cubic_meter;
        return "De prijs van het huis is: {$price}";
    }
}

// Maak 3 huizen aan
$house1 = new House();
$house1->constructHouse(2, 4, 5.0, 5.0, 4.0);

$house2 = new House();
$house2->constructHouse(3, 6, 5.0, 5.0, 10.0);

$house3 = new House();
$house3->constructHouse(2, 3, 3.0, 5.0, 5.0);

// Print details en prijs van de huizen
echo $house1->getHouseDetails() . "\n";
echo $house1->getPrice() . "\n";

echo $house2->getHouseDetails() . "\n";
echo $house2->getPrice() . "\n";

echo $house3->getHouseDetails() . "\n";
echo $house3->getPrice() . "\n";

?>