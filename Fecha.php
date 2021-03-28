<?php
    class Fecha{
        /*** 
         * Representacion de la clase fecha.
         * Sus atributos dia, mes y año.
         * Funciones:
         *  __toString() string con formato DD/MM/AA
         *  stringDos() string con formato DD de MM de AA
         *  multiploCuatro, ...Cien, ...Cuatrociento retornan un falso o verdadero si son multiplos.
         *  bisiesto() retorna un falso o verdadero si es un año bisiesto-
         *  ultimoDiaMes retorna el ultimo dia de cada mes, teniendo en cuenta si es bisiesto.
         *  incrementoAnio, ...Mes, ...Dia incrementan en uno el atributo correspondiente; el mes 12 es cuando se resetea el mes y el ultimo dia es cuando resetea los dias. 
         *  incrementoDia funcion requerida por el ejercicio; retorna la fecha con dias sumados.
         *  mesTexto() retorna el texto correspondiente al mes; para el stringDos.
         */
        private $dia;
        private $mes;
        private $anio;

        public function __construct($d, $m, $a)
        {
            /***
            * CONSTRUCTOR
            */
            $this->dia = $d;
            $this->mes = $m;
            $this->anio = $a;
        }

        public function getDia(){
            return $this->dia;
        }
        public function getMes(){
            return $this->mes;
        }
        public function getAnio(){
            return $this->anio;
        }

        public function setDia($d){
            $this->dia = $d;
        }
        public function setMes($m){
            $this->mes = $m;
        }
        public function setAnio($a){
            $this->anio = $a;
        }

        /*Funciones multiploNumero() retornan si el anio es multiplo de la funcion correspondiente */        
        public function multiploCuatro(){
            if ($this->getAnio() % 4){
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function multiploCien(){
            if ($this->getAnio() % 100){
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function multiploCuatrociento(){
            if ($this->getAnio() % 400){
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function bisiesto(){
            /* Retorna un verdadero o falso si este cumple con las condiciones del año bisiesto */
            if ($this->multiploCuatro() && (!$this->multiploCien() || $this->multiploCuatrociento())){
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function ultimoDiaMes(){
            /*Retorna el ultimo dia de cada mes; tiene en cuenta si este es biciesto o no*/
            switch($this->getMes()){
                case 1: return 31;
                case 2: 
                    if ($this->bisiesto()){
                        return 29;  
                    } else {
                        return 28;
                    }
                    break;
                case 3: return 31;
                case 4: return 30;
                case 5: return 31;
                case 6: return 30;
                case 7: return 31;
                case 8: return 31;
                case 9: return 30;
                case 10: return 31;
                case 11: return 30;
                case 12: return 31;
            }
        }

        /*Funciones incrementarAtributo() modifican el atributo en uno mas; en los casos de la condiciones debe hacer dos acciones; resetear el atributo e incrementar el atributo siguiente */
        public function incremetarAnio(){
            $this->setAnio($this->getAnio() + 1);
        }

        public function incremetarMes(){
            if ($this->getMes() == 12){
                $this->incremetarAnio();
                $this->setMes(1);
            } else {
                $this->setMes($this->getMes() + 1);
            }
        }

        public function incremetarDia(){
            if ($this->getDia() == $this->ultimoDiaMes()){
                $this->incremetarMes();
                $this->setDia(1);                
            } else{
                $this->setDia($this->getDia() + 1);
            }
        }

        public function incremetoDias ($d, $objFecha){
            /*Retorna una fecha nueva dependiendo de la fecha ingresada y los dias sumados */
            /*int d */
            /*Fecha objFecha, objNewFecha */

            $objNewFecha = $objFecha;
            for ($i=0; $i<$d; $i++){
                $objNewFecha->incremetarDia();
            }
            return $objNewFecha;
        }

        public function mesTexto(){
            /* Retorna un string con el mes correspondiente */
            switch($this->getMes()){
                case 1: return "Enero";
                case 2: return "Febrero";
                case 3: return "Marzo";
                case 4: return "Abril";
                case 5: return "Mayo";
                case 6: return "Junio";
                case 7: return "Julio";
                case 8: return "Agosto";
                case 9: return "Septiembre";
                case 10: return "Octubre";
                case 11: return "Noviembre";
                case 12: return "Diciembre";
                }
        }
        
        /*Dos String requerido uno con el formato DD/MM/AA y el otro que utiliza el mes en texto*/
        public function StringDos(){
            return $this->getDia()." de ".$this->mesTexto()." de ".$this->getAnio();
        }
        public function __toString()
        {
            return $this->getDia()."/".$this->getMes()."/".$this->getAnio();
        }



    }


