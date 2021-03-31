<?php
    class CuentaBancaria{
        /***
         * REpresentacion de la clase CuentaBancaria.
         *  -atributos: 
         *      +int número de cuenta
         *      +int DNI del cliente
         *      +float saldo actual
         *      +float interés anual
         *  -Funciones:
         *      + actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual dividido entre 365 aplicado al saldo actual).
         *      + depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
         *      + retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).         * 
         */
        private $nroCuenta;
        private $dniCliente;
        private $saldoActual;
        private $interesAnual;

        public function __construct($nCue, $dCli, $sAct, $iAnu)
        {
            $this->nroCuenta = $nCue;
            $this->dniCliente = $dCli;
            $this->saldoActual = $sAct;
            $this->interesAnual = $iAnu;
        }

        public function getNroCuenta(){
            return $this->nroCuenta;
        }
        public function getDniCliente(){
            return $this->dniCliente;
        }
        public function getSaldoActual(){
            return $this->saldoActual;
        }
        public function getInteresAnual(){
            return $this->interesAnual;
        }

        public function setNroCuenta($nCue){
            $this->nroCuenta = $nCue;
        }
        public function setDniCliente($dCli){
            $this->dniCliente = $dCli;
        }
        public function setSaldoActual($sAct){
            $this->saldoActual = $sAct;
        }
        public function setInteresAnual($iAnu){
            $this->interesAnual = $iAnu;
        }

        public function actualizarSaldo(){
            /* Setea el saldo alcual sumando al mismo con el interes diario(+ todo lo que esta de este lado) */
            $this->setSaldoActual( $this->getSaldoActual() + $this->getSaldoActual() * $this->getInteresAnual() / 365);
        }

        public function depositar($cant){
            /* Setea el saldo alcutal sumandole al mismo el valor del exterior*/
            $this->setSaldoActual( $this->getSaldoActual() + $cant);
        }

        public function retirar($cant){
            /***
             * Retorna un boolean dependiendo si el saldo es mayor a la cantidad solicitada.
             * Si es verdadero setea el saldo restandole la cantidad solicitada.
             */
            if ($this->getSaldoActual() >= $cant){
                $this->setSaldoActual($this->getSaldoActual() - $cant);
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function __toString()
        {
            return "Nro. Cuenta: ".$this->getNroCuenta().
            "\n DNI Cliente: ".$this->getDniCliente().
            "\n Saldo: ".$this->getSaldoActual().
            "\n Interes Anual: ".$this->getInteresAnual();
        }

    }