<?php
    class Cafeteria{
        /***
         * Representacion de la clase Cafeteria con los atributos capacidadMaxima (la cantidad máxima de café que puede contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera)
         *  c) llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
         *  d) servirTaza($cantidad): Si la cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje al consumidor para que sepa porque no se le sirvió un taza completa.
         *  e) vaciarCafetera(): pone la cantidad de café actual en cero.
         *  f) agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
         */
        private $capacidadMaxima;
        private $cantidadActual;

        public function __construct($capMax, $canAct)
        {
            $this->capacidadMaxima = $capMax;
            $this->cantidadActual = $canAct;
        }

        public function getCapacidadMaxima(){
            return $this->capacidadMaxima;
        }
        public function getCantidadActual(){
            return $this->cantidadActual;
        }

        public function setCapacidadMaxima($capMAx){
            $this->capacidadMaxima = $capMAx;
        }
        public function setCantidadActual($canAct){
            $this->cantidadActual = $canAct;
        }

        public function llenarCafetera(){
            /* Setea el atributo cantidadActual al max (capacidadMax). */
            $this->setCantidadActual($this->getCapacidadMaxima());
        }

        public function vaciarCafetera(){
            /* Setea el atributo cantidadActual a 0, es deir vacio. */
            $this->setCantidadActual(0);
        }

        public function servirTaza($cantidad){
            /***
             * Retorna uno de dos string, dependiendo si la cantidad actual alcanza para la cantidad solicitada
             *  - verdadero: setea el atributo restandole la cantidad solicitada.
             *  - falso: vaciarCafeteria()
             */

            if ($this->getCantidadActual() >= $cantidad){
                $this->setCantidadActual($this->getCantidadActual() - $cantidad);
                $txt = $this->getCantidadActual()."cc quedan";
            } else{
                $txt = $this->getCantidadActual()."cc me quedaba, disculpa";
                $this->vaciarCafetera();
            }
            return $txt;
        }

        public function agregarCafe($cantidad){
            /* Setea la cantidadActual sumandole la cantidad ingresa */
            $this->setCantidadActual($this->getCantidadActual()+$cantidad);
        }

        public function __toString()
        {
            return "CAP MAX ".$this->getCapacidadMaxima().
            "\nCAP ACT ".$this->getCantidadActual();
        }
    }