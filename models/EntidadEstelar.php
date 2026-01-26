<?php

    abstract class EntidadEstelar{
        protected $id;
        protected $nombre;
        protected $planetaOrigen;
        protected $estabilidad;

        public function __construct($cod, $name, $planeta, $estabilidad){
            $this->id = $cod;
            $this->nombre=$name;
            $this->planetaOrigen= $planeta;
            $this->estabilidad=$estabilidad;
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }

        public function getPlaneta(){
            return $this->planetaOrigen;
        }

        public function setPlaneta($planetaOrigen){
            $this->planetaOrigen=$planetaOrigen;
        }

        public function getEstabilidad(){
            return $this->estabilidad=$estabilidad;
        }

        public function setEstabilidad($estabilidad){
            $this->estabilidad=$estabilidad;
        }
    }

?>