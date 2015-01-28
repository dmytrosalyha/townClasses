<?php

namespace package;

class Town implements Serializable {

    private $nameTown;
    private $yearFound;
    private $placing;
    private $streetsArray = array();

    public function __construct($nameTown, $yearFound, $placing) {
        $this->nameTown = $nameTown;
        $this->yearFound = $yearFound;
        $this->placing = $placing;
    }

    public function addStreet(Street $street) {
        $this->streetsArray [] = $street;
    }

    public function getStreetsArray() {
        return $this->streetsArray;
    }

    public function calcSumLandTax() {
        $sumLandTax = 0;
        foreach ($this->streetsArray as $street) {
            foreach ($street->getHousesArray() as $house) {
                $sumLandTax+=$house->calcLandTax();
            }
        }
        return $sumLandTax;
    }

    public function calcSumPeople() {
        $sumPeople = 0;
        foreach ($this->streetsArray as $street) {
            foreach ($street->getHousesArray() as $house) {
                foreach ($house->getFlatsArray() as $flat) {
                    $sumPeople+=$flat->getPeople();
                }
            }
        }
        return $sumPeople;
    }

    public function showInfoTown() {
        echo '<b>Название города: ' . $this->nameTown . '</b><br/>';
        echo '<b>Год основания: ' . $this->yearFound . '</b><br/>';
        echo '<b>Географическое расположение: ' . $this->placing . '</b><br/>';
    }

    public function serialize() {
        $objectData = array(
            "nameTown" => $this->nameTown,
            "yearFound" => $this->yearFound,
            "$placing" => $this->placing,
        );
        return json_encode($objectData);
    }

}
