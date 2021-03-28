<?php
    class Reloj{
        /***
        * Representacion de la clase reloj.
        * - Posee 3 atributos.
        * - 4 funciones: agregarHora / ...Minuto / ...Segundo y puestaCero.
        */

        /* ATRIBUTOS */
        /* float valorA, valorB */
        /* string operador */
        private $segundo;
        private $minuto;
        private $hora;

        public function __construct($seg, $min, $hor)
        {
            /***
            * CONSTRUCTOR
            */
            $this->segundo = $seg;
            $this->minuto = $min;
            $this->hora = $hor;
        }

        public function getSegundo(){
            return $this->segundo;
        }
        public function getMinuto(){
            return $this->minuto;
        }
        public function getHora(){
            return $this->hora;
        }

        public function setSegundo($seg){
            $this->segundo = $seg;
        }
        public function setMinuto($min){
            $this->minuto = $min;
        }
        public function setHora($hor){
            $this->hora = $hor;
        }

        /***
         * Las funciones agregarAtributo() se comportan de manera similar.
         * Si su atributo es el buscado en la condicion este debe hacer dos acciones:
         *  1)llamar a la funcion del siguiente atributo implicado; menos hora que tendia que modificar al siguiente.
         *  2)Resetiarse a 0.
         */
        
        public function agregarHora(){
            if ($this->getHora() == 23){
                $this->setHora(0);
            } else {
                $this->setHora($this->getHora() + 1);
            }
        }

        public function agregarMinuto(){
            if ($this->getMinuto() == 59){
                $this->agregarHora();
                $this->setMinuto(0);
            } else {
                $this->setMinuto($this->getMinuto() + 1);
            }
        }

        public function agregarSegundo(){
            if ($this->getSegundo() == 59){
                $this->agregarMinuto();
                $this->setSegundo(0);
            } else {
                $this->setSegundo($this->getSegundo() + 1);
            }
        }

        public function puestaCero (){
            /***
             * Funcion requerida en el tp; no le veo utilidad
             */
            $this->setSegundo(0);
            $this->setMinuto(0);
            $this->setHora(0);
        }

        public function __toString()
        {
            return $this->getHora().":".$this->getMinuto().":".$this->getSegundo();
        }

    }