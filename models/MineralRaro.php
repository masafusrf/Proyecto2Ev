<?php

    class MineralRaro extends EntidadEstelar implements iInteractuable{

        private $dureza;

        public function getDureza(){
            return $this->dureza;
        }

        public function setDureza($dureza){
            $this->dureza=$dureza;
        }

        public function __construct($cod, $name, $planeta, $estabilidad, $dureza){
            $this->dureza=$dureza;
            parent::__construct($cod, $name, $planeta, $estabilidad);
        }

        public function reaccionar(){
            return "Hola. Soy un mineral rarete.";
        }

    }

?>