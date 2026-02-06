<?php

    class FormadeVida extends EntidadEstelar implements iInteractuable{

        private $dieta;

        public function getDieta(){
            return $this->dieta;
        }

        public function setDieta($dieta){
            $this->dieta=$dieta;
        }

        public function __construct($cod, $name, $planeta, $estabilidad, $dieta){
            $this->dieta=$dieta;
            parent::__construct($cod, $name, $planeta, $estabilidad);
        }

        public function reaccionar(){
            return "Holi. Estoy vivo.";
        }
    }

?>