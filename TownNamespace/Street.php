<?php
namespace TownNamespace;
class Street {
                private $nameStreet;
                private $length;
                private $placingStart;
                private $placingFinish;
                private $housesArray = array();
                
                public function __construct($nameStreet,$length,$placingStart,
                $placingFinish){
                    $this->nameStreet = $nameStreet;
                    $this->length = $length;
                    $this->placingStart = $placingStart;
                    $this->placingFinish = $placingFinish;
                }
                public function addHouse (House $house){
                    $this->housesArray []=$house;
                }
                public function getHousesArray (){
                    return $this->housesArray;
                }
                public function calcJanitors (){
                    $sumSquareNearHouse = 0;
                    foreach ($this->housesArray as $house) {
                        $sumSquareNearHouse += $house->getSquareNearHouse();
                    }
                    return ceil($sumSquareNearHouse/400);
                }
                public function calcUtilitiesAllOnStreet (){
                    $utilitiesAllOnStreet = 0;
                    foreach ($this->housesArray as $house) {
                       $utilitiesAllOnStreet+=$house->calcUtilitiesAllInHouse();
                    }
                    return $utilitiesAllOnStreet;
                }
                public function showInfoStreet (){
                    echo 'Название улицы: ' . $this->nameStreet . '<br/>';
                    echo 'Протяженность улицы: ' . $this->length . '<br/>';
                    echo 'Географическое расположение начала улицы: ' . 
                            $this->placingStart . '<br/>';
                    echo 'Географическое расположение конца улицы: ' . 
                            $this->placingFinish . '<br/>';
                }
            }