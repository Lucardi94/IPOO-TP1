<?php
    class Linea{
        /***
         * Representacion de la clase liena con 4 atributos. (x1,y1) (x2,y2).
         * Funciones:
         *  c) mueveDerecha($d): Desplaza la línea a la derecha la distancia(d) que se recibe por parámetro.
         *  d) mueveIzquierda($d): Desplaza la línea a la izquierda la distancia(d) que se recibe por parámetro.
         *  e) mueveArriba($d): Desplaza la línea hacia arriba la distancia que se recibe por parámetro.
         *  f) mueveAbajo($d): Desplaza la línea hacia abajo la distancia que se recibe por parámetro.
         */
        private $coordenadaXUno;
        private $coordenadaYUno;
        private $coordenadaXDos;
        private $coordenadaYDos;

        public function __construct($p1, $p2, $p3, $p4)
        {
            /***
             * Constructor
             */
            /* int p1, p2, p3, p4 */
            $this->coordenadaXUno = $p1;
            $this->coordenadaYUno = $p2;
            $this->coordenadaXDos = $p3;
            $this->coordenadaYDos = $p4;
        }

        public function getCoordenadaXUno(){
            return $this->coordenadaXUno;
        }
        public function getCoordenadaYUno(){
            return $this->coordenadaYUno;
        }
        public function getCoordenadaXDos(){
            return $this->coordenadaXDos;
        }
        public function getCoordenadaYDos(){
            return $this->coordenadaYDos;
        }

        public function setCoordenadaXUno($xUno){
            $this->coordenadaXUno = $xUno;
        }
        public function setCoordenadaYUno($yUno){
            $this->coordenadaYUno = $yUno;
        }
        public function setCoordenadaXDos($xDos){
            $this->coordenadaXDos = $xDos;
        }
        public function setCoordenadaYDos($yDos){
            $this->coordenadaYDos = $yDos;
        }

        public function mueveDerecha($d){
            /***
             * Setea las cordemadasX con el movimiento a la derecha (+)
             */
            $this->setCoordenadaXUno($this->getCoordenadaXUno() + $d);
            $this->setCoordenadaXDos($this->getCoordenadaXDos() + $d);
        }

        public function mueveIzquierda($d){
            /***
             * Setea las cordemadasX con el movimiento a la izquierda (-)
             */
            $this->setCoordenadaXUno($this->getCoordenadaXUno() - $d);
            $this->setCoordenadaXDos($this->getCoordenadaXDos() - $d);
        }

        public function mueveArriba($d){
            /***
             * Setea las cordemadasY con el movimiento a la arriba (+)
             */
            $this->setCoordenadaYUno($this->getCoordenadaYUno() + $d);
            $this->setCoordenadaYDos($this->getCoordenadaYDos() + $d);
        }

        public function mueveAbajo($d){
            /***
             * Setea las cordemadasY con el movimiento a la abajo (-)
             */
            $this->setCoordenadaYUno($this->getCoordenadaYUno() - $d);
            $this->setCoordenadaYDos($this->getCoordenadaYDos() - $d);
        }

        public function __toString()
        {
            return "Punto 1 (".$this->getCoordenadaXUno().", ".$this->getCoordenadaYUno().")\n".
            "Punto 2 (".$this->getCoordenadaXDos().", ".$this->getCoordenadaYDos().")\n";
        }
    }