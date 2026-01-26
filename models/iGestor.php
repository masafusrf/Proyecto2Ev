<?php

    interface iGestor{

        public function guardar($objeto);

        public function obtenerTodos();

        public function eliminar($id)
    }

?>