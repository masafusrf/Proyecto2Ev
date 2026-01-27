<?php

    class EntEstelarController{

        private $gestor;

        public function __construct(iGestor $gestor){
            $this->gestor=$gestor;
        }

        public function index(){
            $entidades= $this->gestor->obtenerTodos();
            include "views/listar.php";
        }

        public function crear(){
            if ($_SERVER['REQUEST_METHOD']=== 'POST') {
                $id=uniqid();
                $nombre= $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad=$_POST['estabilidad'];
                $tipo=$_POST['tipo'];

                if ($tipo === 'artefacto') {

                    $antiguedad=$_POST['antiguedad'];

                    $entidad= new ArtefactoAntiguo(
                        $id;
                        $nombre;
                        $planetaOrigen;
                        $estabilidad;
                        $antiguedad;
                    );

                } elseif ($tipo==='mineral') {
                    
                    $dureza=$_POST['dureza'];

                    $entidad= new MineralRaro(
                        $id;
                        $nombre;
                        $planetaOrigen;
                        $estabilidad;
                        $dureza;
                    );

                } elseif ($tipo==='vida') {
                    
                    $dieta= $_POST['dieta'];

                    $entidad= new FormadeVida(
                        $id;
                        $nombre;
                        $planetaOrigen;
                        $estabilidad;
                        $dieta;
                    );
                } else {
                    echo "Tipo de entidad estelar no válida.";
                    return;
                }

                $this->gestor->guardar($entidad);

                header("Location: index.php");
                exit;
            }
        }

        public function eliminar(){
            $id=$_GET['id'] ?? null;
            $this->gestor->eliminar($id);
            header("Location: index.php");
            exit;
        }
    }

?>