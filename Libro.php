<?php
    class Libro{
        /***
         * Representacion de la clase libro.
         *  - Atributo:
         *      + SBN
         *      + titulo
         *      + año de edición
         *      + editorial
         *      + nombre del autor
         *      + apellido del autor
         *  - Funciones:
         *      + perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro una editorial y devuelve un valor verdadero/falso.
         *      + iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por parámetro ya se encuentra en dicha colección.
         *      + aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado.
         *      + librodeEditoriales($arregloautor, $peditorial): método que retorna un arreglo asociativo con todos los libros publicados por la editorial dada.
         * 
         */
    
        private $sbn;
        private $titulo;
        private $anioEdicion;
        private $editorial;
        private $nombreAutor;
        private $apellidoAutor;

        public function __construct($s, $tit, $aEdi, $edi, $nAut, $aAut){
            $this->sbn = $s;
            $this->titulo = $tit;
            $this->anioEdicion = $aEdi;
            $this->editorial = $edi;
            $this->nombreAutor = $nAut;
            $this->apellidoAutor = $aAut;
        }

        public function getSbn(){
            return $this->sbn;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getAnioEdicion(){
            return $this->anioEdicion;
        }
        public function getEditorial(){
            return $this->editorial;
        }
        public function getNombreAutor(){
            return $this->nombreAutor;
        }
        public function getApellidoAutor(){
            return $this->apellidoAutor;
        }

        public function setSbn($nSbn){
            $this->sbn = $nSbn;
        }
        public function setTitulo($ntit){
            $this->titulo = $ntit;
        }
        public function setAnioEdicion($nAniE){
            $this->anioEdicion = $nAniE;
        }
        public function setEditorial($nEdi){
            $this->editorial = $nEdi;
        }
        public function setNombreAutor($nNomA){
            $this->nombreAutor = $nNomA;
        }
        public function setApellidoAutor($nApeA){
            $this->apellidoAutor = $nApeA;
        }

        public function perteneceEditorial($peditorial){
            /***
             * Retorna un verdadero o falso si la editorial es la misma que la ingresda por parametro.
             */
            if ($this->getEditorial() == $peditorial){
                return TRUE;
            } else return FALSE;
        }

        public function iguales($plibro,$parreglo){
            /***
             * Busca en el arreglo ingresado por parametro si existe la clase ingresada por parametro en este arreglo.
             * Utiliza una busqueda parcial
             */
            $aparece = FALSE;
            $i=0;
            while ($i < count($parreglo) && !$aparece){
                $libro = $parreglo[$i];
                $i++;                
                if ($plibro === $libro){
                    $aparece = TRUE;
                }
            }
            return $aparece;
        }

        public function aniosdesdeEdicion(){
            /* Retorna la antiguedad del libro desde su primera edicion */
            return 2021 - $this->getAnioEdicion();
        }

        public function librodeEditoriales($arregloLibro, $peditorial){
            /***
             * Retorna un arreglo asosiativo con los libros ingresado por parametros que sea de la editoria ingresada por parametro
             * Lo hace atraves de una busqueda exautiva.
             */
            $listLibro = array();
            foreach ($arregloLibro as $libro){
                if ($libro->getEditorial() == $peditorial){
                    $libroMatriz = array ("sbn" => $libro->getSbn(),
                                        "titulo" => $libro->getTitulo(),
                                        "anioEdicion" => $libro->getAnioEdicion(),
                                        "editorial" => $libro->getEditorial(),
                                        "nombreAutor" => $libro->getNombreAutor(),
                                        "apellidoAutor" => $libro->getApellidoAutor());
                    array_push($listLibro, $libroMatriz);
                }
            }
            return $listLibro;
        }

        public function __toString()
        {
            return  $this->getSbn()."\n".
                    $this->getTitulo()."\n".
                    $this->getAnioEdicion()."\n".
                    $this->getEditorial()."\n".
                    $this->getNombreAutor()."\n".
                    $this->getApellidoAutor()."\n";
        }

        


        
    }