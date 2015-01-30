<?php
namespace TownNamespace;
class Flat {

    private $roomSum = 1;
    private $square = 30;
    private $floor = 1;
    private $people = 0;
    private $presenceBalcony = false;
    private $balconySum = 0;
    private $centralHeating = true;

    public function __construct($roomSum, $square, $floor, $people, $balconySum, $centralHeating) {
        $this->roomSum = $roomSum;
        $this->square = $square;
        $this->floor = $floor;
        $this->people = $people;
        $this->presenceBalcony = ($balconySum)?true:false;
        $this->balconySum = $balconySum;
        $this->centralHeating = $centralHeating;
    }

    public function changePeople($peopleAddRemove) {
        if ($peopleAddRemove > 0 ||
                ($peopleAddRemove < 0 && $this->people >= $peopleAddRemove)) {
            $this->people += $peopleAddRemove;
        }
    }

    public function getPeople() {
        return $this->people;
    }

    public function calcElEnergy() {
        $sum = 150;
        $tarif = 0.35;
        return $this->people * $sum * $tarif;
    }

    public function calcHeating() {
        $tariff = 10.00;
        if ($this->centralHeating == true) {
            return $this->square * $tariff;
        } else {
            return 0;
        }
    }

    public function calcWater() {
        $tariff = 5.00;
        $norm = 11;
        return $this->people * $norm * $tariff;
    }

    public function calcGas() {
        $tariff = 8.00;
        $norm = 3;
        if ($this->centralHeating == true) {
            return $this->people * $tariff * $norm;
        } else {
            return $this->people * $tariff * $norm +
                    $this->square * $tariff / 10;
        }
    }

    public function calcUtilities() {
        return $this->calcElEnergy() + $this->calcHeating() +
                $this->calcWater() + $this->calcGas();
    }

    public function showInfoFlat() {
        echo 'Количество комнат: ' . $this->$roomSum . '<br/>';
        echo 'Этаж: ' . $this->floor . '<br/>';
        echo 'Количество жильцов: ' . $this->people . '<br/>';
        echo 'Количество балконов: ' . $this->balconySum . '<br/>';
        echo 'Тип отопления: ';
        if ($this->centralHeating) {
            echo 'центральное<br/>';
        } else {
            echo 'автономное<br/>';
        }
    }

}
