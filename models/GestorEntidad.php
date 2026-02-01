<?php

    class GestorEntidad implements iGestor{

        private $estelares = [];

        public function __construct(){
            if (!isset($_SESSION['estelares'])) {
                $_SESSION['estelares'] = [];
            }
        }

        public function guardar($estelar){
            $_SESSION['estelares'][]= $estelar;
        }

        public function obtenerTodos(){
            return $_SESSION['estelares'];
        }

        public function buscar($id){
            foreach ($_SESSION['estelares'] as $estelar) {
                if ($estelar->getId() == $id) {
                    return $estelar;
                }
            }
            return null;
        }

        public function editar($estelar){
            foreach ($_SESSION['estelares'] as $i => $elemento) {
                if ($elemento->getId() ===$estelar->getId()) {
                    $_SESSION['estelares'][$i]=$estelar;
                    return true;
                }
            }

            return false;
        }

        public function eliminar($id){
            foreach ($_SESSION['estelares'] as $i => $elemento) {
                if ($elemento->getId() == $id) {
                    unset($_SESSION['estelares'][$i]);
                    $_SESSION['estelares'] = array_values($_SESSION['estelares']);
                    return true;
                }
            }
            return false;
        }
    }


?>