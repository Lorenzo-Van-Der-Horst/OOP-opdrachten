<?php

namespace YourNamespace;

class Room {
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLength() {
        return $this->length;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getVolume() {
        return $this->length * $this->width * $this->height;
    }
}
class House {
    private $rooms = [];
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function addRoom(Room $room) {
        $this->rooms[] = $room;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function getTotalVolume() {
        $totalVolume = 0;
        foreach ($this->rooms as $room) {
            $totalVolume += $room->getVolume();
        }
        return $totalVolume;
    }

    public function getPrice() {
        // Voorbeeldberekening van de prijs
        $pricePerCubicMeter = 316; 
        // Prijs per kubieke meter
        return $this->getTotalVolume() * $pricePerCubicMeter;
    }
}

// Voorbeeldgebruik
$room1 = new Room(5.2, 5, 5.5);
$room2 = new Room(4.8, 4.6, 4.9);
$room3 = new Room(5.9, 2.5, 3.1);

// Afmetingen van het huis, niet van elke kamer apart
$house = new House(10, 10, 10); 
$house->addRoom($room1);
$house->addRoom($room2);
$house->addRoom($room3);

echo "Inhoud Kamers\n";
foreach ($house->getRooms() as $room) {
    echo "Lengte: {$room->getLength()}m Breedte: {$room->getWidth()}m Hoogte: {$room->getHeight()}m\n";
}
echo "Volume Totaal: {$house->getTotalVolume()}m3\n";
echo "Prijs van het huis: $" . $house->getPrice();
?>
