<?php
    class Cuadrado{
        private $verticeA;
        private $verticeB;
        private $verticeC;
        private $verticeD;
        /***
         * Representacion de un cuadrado.
         * Posee 4 atritubos cada uno representa una coordenadas; 
         * Funciones:
         *      - area()
         *          + distancia($puntoA ,$puntoB)
         *      - desplazar($d)
         *          + distancia($puntoA ,$puntoB)
         *          + buscarPuntoIzqInf()
         *      - aumentarTamaño($t)
         *          + buscarPuntoIzqInf()
         *          + desplazar($d)
         *      - _ _toString()
         *          + textoVertice($vertice)
         */

        public function __construct($verA, $verB, $verC, $verD)
        {
            /***
            * Constructor
            */
            /* array verA, verB, verC, verD */
            $this->verticeA = $verA;
            $this->verticeB = $verB;
            $this->verticeC = $verC;
            $this->verticeD = $verD;
        }

        public function getVerticeA(){
            return $this->verticeA;
        }
        public function getVerticeB(){
            return $this->verticeB;
        }
        public function getVerticeC(){
            return $this->verticeC;
        }
        public function getVerticeD(){
            return $this->verticeD;
        }

        public function setVerticeA($verA){
            $this->verticeA = $verA;
        }
        public function setVerticeB($verB){
            $this->verticeB = $verB;
        }
        public function setVerticeC($verC){
            $this->verticeC = $verC;
        }
        public function setVerticeD($verD){
            $this->verticeD = $verD;
        }

        public function distancia($puntoA ,$puntoB){
            /***
             * Funcion tomada de "Unidad1:POO-PHP.pdf"
             * Devuelve la distancia entre el objeto Punto y el recibido por parametro
            */
            /* Float verX, verY, laDistancia */
            /* array puntoA, puntoB */

            $verX = $puntoA["x"] - $puntoB["x"];
            $verY = $puntoA["y"] - $puntoB["y"];
            $laDistancia = pow(pow($verX, 2)+ pow($verY, 2), 0.5);
            return $laDistancia;
        }

        public function area(){
            /***
             * Retorna un float con el area del cuadrado.
             */
            /* float lado */
            $lado = $this->distancia($this->getVerticeA(), $this->getVerticeB());
            return $lado*4;
        }

        public function buscarPuntoIzqInf(){
            /***
             * Retorna el vertice mas cercano al punto 0,0.
             * Crea una lista con los 4 verticesA y el punto 0.0.
             * Iniciamos el punto con el primer vertices de la lista para compararlo.
             * Recorre el listado y si encuentra un punto mas cercano al puntoCero pasara a ser el masCerca.
             */
            /* array listaVert, puntoCero, masCerca*/
            
            $listVert = array ($this->getVerticeA(), $this->getVerticeB(), $this->getVerticeC(), $this->getVerticeD());
            $puntoCero = array ("x"=>0,"y"=>0);
            $masCerca = $listVert[0];

            foreach ($listVert as $ver){
                if ($this->distancia($masCerca, $puntoCero) > $this->distancia($ver, $puntoCero)){
                    $masCerca = $ver;
                }
            }
            return $masCerca;
        }

        public function desplazar($d){
            /***
             * Setea los vertices con las nuevas posiciones
             * Buscamos el punto mas cercano y la medida de un lado.
             */
            /* array d, puntoCercano */
            /* float lado */
            
            $puntoCercano = $this->buscarPuntoIzqInf();
            $lado = $this->distancia($this->getVerticeA(), $this->getVerticeB());
            
            $this->setVerticeA($d); //Seteamos uno de los vertices con el nuevo punto.
            
            $ver = array ("x"=>$d["x"], "y"=>$d["y"]+$lado); //Creamos el siguiente punto, utilizando la distancia de ["y"] y sumamos la distancia.
            $this->setVerticeB($ver); //Seteamos otro de los vertices con el nuevo punto.

            $ver = array ("x"=>$d["x"]+$lado, "y"=>$d["y"]); //Creamos el siguiente punto, utilizando la distancia de ["x"] y sumamos la distancia. 
            $this->setVerticeC($ver); //Seteamos otro de los vertices con el nuevo punto.

            $ver = array ("x"=>$d["x"]+$lado, "y"=>$d["y"]+$lado); //Creamos el siguiente punto, utilizando la distancia de ["x"] y sumamos la distancia. 
            $this->setVerticeD($ver); //Seteamos otro de los vertices con el nuevo punto.            
        }

        public function aumentarTamaño($t){
            /***
             * Utiliza la funcion desplazar para asignar nuevas coordenadas a los vertices.
             * Busca el punto mas cercano al 0.0 y lo setea como nuevo verticeA.
             * Al verticeB lo modificamos para poder usar desplazar con la nueva medida del lado.
             */
            $puntoCercano = $this->buscarPuntoIzqInf();            
            $this->setVerticeA($puntoCercano);
            $ver = array ("x"=>$this->getVerticeA()["x"], "y"=>$this->getVerticeA()["y"]+$t);
            $this->setVerticeB($ver);
            $this->desplazar($puntoCercano);
        }

        public function textoVertice($vertice){
            /***
             * Retorna String para visualizar los vertices.
             */
            return $vertice["x"].", ".$vertice["y"];
        }        

        public function __toString()
        {
            return "Vertice A = [".$this->textoVertice($this->getVerticeA())."]\n".
            "Vertice B = [".$this->textoVertice($this->getVerticeB())."]\n".
            "Vertice C = [".$this->textoVertice($this->getVerticeC())."]\n".
            "Vertice D = [".$this->textoVertice($this->getVerticeD())."]\n";
        }
    }