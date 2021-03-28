<?php
    class Calculadora {
        /***
         * Representacion de la clase calculadora.
         * Posee 4 operadores +, -, /, *. Trabaja con dos valrores.
         */
        /* ATRIBUTOS */
        /* float valorA, valorB */
        /* string operador */
        private $valorA;
        private $valorB;
        private $operador;

        public function __construct($valA, $valB, $ope)
        {
            /***
             * CONSTRUCTOR
             */
            $this->valorA = $valA;
            $this->valorB = $valB;
            $this->operador = $ope;
        }

        public function getValorA(){
            return $this->valorA;
        }
        public function getValorB(){
            return $this->valorB;
        }
        public function getOperador(){
            return $this->operador;
        }

        public function setValorA($valA){
            $this->valorA = $valA;
        }

        public function setValorB($valB){
            $this->valorB = $valB;
        }

        public function setOperador($ope){
            $this->operador = $ope;
        }
        
        public function resultado(){
            /***
             * Retorna un float con el valor de la operacion de los atributos valorA y valorB.
             * Utiliza una selectiva segun el simblo asignado a operador             * 
             */
            switch ($this->getOperador()){
                case "+": return $this->getValorA() + $this->getValorB();
                case "/": return $this->getValorA() / $this->getValorB();
                case "-": return $this->getValorA() - $this->getValorB();
                case "*": return $this->getValorA() * $this->getValorB();
                default: echo "Error en simbolo";
            }
        }

        public function __toString()
        {
            return $this->getValorA()." ".$this->operador." ".$this->valorB." = ".$this->resultado();
        }
    }