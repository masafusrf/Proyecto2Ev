<?php

    class ArtefactoAntiguo extends EntidadEstelar implements iInteractuable{

        private $antiguedad;

        public function getAntiguedad(){
            return $this->antiguedad;
        }

        public function setAntiguedad($antiguedad){
            $this->antiguedad=$antiguedad;
        }

        public function __construct($cod, $name, $planeta, $estabilidad, $antiguedad){
            $this->antiguedad=$antiguedad;
            parent::__construct($cod, $name, $planeta, $estabilidad);
        }

        public function reaccionar(){
            return "Holi. Soy un artefacto antiguo.";
        }

    }

?>