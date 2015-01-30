<?php
namespace TownNamespace;
class House {

    private $numberHouse;
    private $floorsSum;
    private $entranceSum;
    private $squareNearHouse;
    private $flatsArray = array();

    public function __construct($numberHouse, $floorsSum, $entranceSum, $squareNearHouse) {
        $this->numberHouse = $numberHouse;
        $this->floorsSum = $floorsSum;
        $this->entranceSum = $entranceSum;
        $this->squareNearHouse = $squareNearHouse;
    }

    public function addFlat(Flat $flat) {
        $this->flatsArray [] = $flat;
    }

    public function getFlatsArray() {
        return $this->flatsArray;
    }

    public function getSquareNearHouse() {
        return $this->squareNearHouse;
    }

    public function calcUtilitiesAllInHouse() {
        $utilitiesAllInHouse = 0;
        foreach ($this->flatsArray as $flat) {
            $utilitiesAllInHouse+=$flat->calcUtilities();
        }
        return $utilitiesAllInHouse;
    }

    public function calcEntranceLighting($days = 30) {
        return $this->floorsSum * $this->entranceSum * 24 * $days * 60;
    }

    public function calcLandTax($taxLandTariff = 5) {
        return $this->squareNearHouse * $taxLandTariff;
    }

    public function showInfoHouse() {
        echo 'Номер дома: ' . $this->numberHouse . '<br/>';
        echo 'Колисетво этажей: ' . $this->floorsSum . '<br/>';
        echo 'Количество подъездов: ' . $this->entranceSum . '<br/>';
        echo 'Площадь прилегающей территории, м.кв.: ' .
        $this->squareNearHouse . '<br/>';
    }

}
