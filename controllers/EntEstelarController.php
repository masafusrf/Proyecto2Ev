<?php

    class EntEstelarController{

        private $gestor;

        public function __construct(iGestor $gestor){
            $this->gestor=$gestor;
        }

        public function index(){
            $elementosPorPag = 5;
            $paginaActual= isset($_GET['p']) ? $_GET['p'] : 1;

            $listaTotal=$this->gestor->obtenerTodos();
            $totalElmtos=count($listaTotal);
            $totalPags= ceil($totalElmtos/$elementosPorPag);

            $primerElmto=($paginaActual-1) * $elementosPorPag;
            $entidades= array_slice($listaTotal, $primerElmto, $elementosPorPag);

            include "views/listar.php";
        }

        public function crear(){
            if ($_SERVER['REQUEST_METHOD']=== 'POST') {
                $id=uniqid();
                $nombre= $_POST['nombre'];
                $planetaOrigen = $_POST['origen'];
                $estabilidad=$_POST['estabilidad'];
                $tipo=$_POST['tipo'];

                if ($tipo === 'artefacto') {

                    $antiguedad=$_POST['antiguedad'];

                    $entidad= new ArtefactoAntiguo(
                        $id,
                        $nombre,
                        $planetaOrigen,
                        $estabilidad,
                        $antiguedad,
                    );

                } elseif ($tipo==='mineral') {
                    
                    $dureza=$_POST['dureza'];

                    $entidad= new MineralRaro(
                        $id,
                        $nombre,
                        $planetaOrigen,
                        $estabilidad,
                        $dureza,
                    );

                } elseif ($tipo==='vida') {
                    
                    $dieta= $_POST['dieta'];

                    $entidad= new FormadeVida(
                        $id,
                        $nombre,
                        $planetaOrigen,
                        $estabilidad,
                        $dieta,
                    );
                } else {
                    echo "Tipo de entidad estelar no válida.";
                    return;
                }

                $this->gestor->guardar($entidad);

                $_SESSION['mensaje'] = $entidad->reaccionar();

                header("Location: index.php");
                exit;
            }
            
            $tipo = $_GET['tipo'] ?? null;
            if ($tipo === 'artefacto') {
                include "views/crearArtefacto.php";
            } elseif ($tipo === 'mineral') {
                include "views/crearMineral.php";
            } elseif ($tipo === 'vida') {
                include "views/crearVida.php";
            } else {
                echo "Tipo de entidad estelar no válida.";
            }
        }

        public function editar(){
            $id= $_GET['id'] ?? null;
            $entidad=$this->gestor->buscar($id);

            if (!$entidad) {
                echo "Esta entidad estelar no existe";
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] ==='POST') {
                $nombre= $_POST['nombre'] ?? $entidad->getNombre();
                $planetaOrigen=$_POST['origen'] ?? $entidad->getPlaneta();
                $estabilidad=$_POST['estabilidad'] ?? $entidad->getEstabilidad();

                $entidad->setNombre($nombre);
                $entidad->setPlaneta($planetaOrigen);
                $entidad->setEstabilidad($estabilidad);

                if ($entidad instanceof ArtefactoAntiguo) {
                    $antiguedad=$_POST['antiguedad'] ?? $entidad->getAntiguedad();
                    $entidad->setAntiguedad($antiguedad);
                } elseif ($entidad instanceof MineralRaro) {
                    $dureza=$_POST['dureza'] ?? $entidad->getDureza();
                    $entidad->setDureza($dureza);
                } elseif ($entidad instanceof FormadeVida) {
                    $dieta=$_POST['dieta'] ?? $entidad->getDieta();
                    $entidad->setDieta($dieta);
                }

                $this->gestor->editar($entidad);
                header("Location: index.php");
                exit;
            }

            if ($entidad instanceof ArtefactoAntiguo) {
                include "views/editarArtefacto.php";
            } elseif ($entidad instanceof MineralRaro) {
                include "views/editarMineral.php";
            } elseif ($entidad instanceof FormadeVida) {
                include "views/editarVida.php";
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