<?php
    class Login{
        /***
         * Respresentacion de la clase Login.
         * Con atributos: nombre del usuario, contraseña actual, frase para recordar contraseña, las ultimas 4 contraseñas.
         * Funciones:
         *   - ingreso
         *      + validarContrasenia
         *      + validarUsuario
         *      + intentosContrasenia
         *   - cambiarContrasenia
         *      + cambiarListaContrasenia - set.lista Contraseña()
         *      + cambiarFrase - set.frase()
         *      + set.contrasenia()
         */

        private $nombreUsuario;
        private $contrasenia;
        private $frase;
        private $listaContrasenia;

        public function __construct($nomUsu, $con, $fra, $lisCon)
        {
            /***
             * Constructor
             */
            /* string nomUsu, con, fra */
            /* array liscon */
            $this->nombreUsuario = $nomUsu;
            $this->contrasenia = $con;
            $this->frase = $fra;
            $this->listaContrasenia = $lisCon;
        }

        public function getNombreUsuario(){
            return $this->nombreUsuario;
        }
        public function getContrasenia(){
            return $this->contrasenia;
        }
        public function getFrase(){
            return $this->frase;
        }
        public function getListaContrasenia(){
            return $this->listaContrasenia;
        }

        public function setNombreUsuario($nomUsu){
            $this->nombreUsuario = $nomUsu;
        }
        public function setContrasenia($con){
            $this->contrasenia = $con;
        }
        public function setFrase($fra){
            $this->frase = $fra;
        }
        public function setListaContrasenia($lisCon){
            $this->listaContrasenia = $lisCon;
        }

        /* ValidarContrasenia / Usuario*/
        /* Retorna un verdadero o falso si coicide el valor ingresado al de la clase*/
        /* string cont, usua */
        public function validarContrasenia($cont){
            if ($this->getContrasenia() == $cont){
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function validarUsuario($usua){
            if ($this->getNombreUsuario() == $usua){
                return TRUE;
            } else {
                return FALSE;
            }
        }

        
        public function intentosContrasenia(){
            /***
             * Utilizada en la funcion ingreso())
             * Da al usuario tres intentos para validar su contraseña
             * Da la informacion del atributo frase
             * Retorna un verdadero o falso si la contraseña es encontrada
             */
            /* int i*/
            /* string cotra */
            /* boolean valido */
            echo "Frase le suena a algo: ".$this->getFrase()."\n";
            $i = 3;
            $valido = FALSE;

            while ($i > 0 && !$valido){
                echo "Ingrese su Contraseña [Quedan ".$i." intentos]\n";
                $contra = trim(fgets(STDIN));
                if ($contra == $this->getContrasenia()) {
                    $valido = TRUE;
                }
                $i--;
            }
            return $valido;
        }

        public function ingreso(){
            /***
             * Funcion para validar el usuario y contraseña; con parametro externos.
             * Esto puede ocurrir tres opciones:
             *  1. Que sea el usuario y contraseña correcta.
             *  2. Que el usuario sea correcto y la contraseña no lo sea, por lo que llamara a la funcuin intentosContrasenia().
             *  3. Que no sea ninguno de los dos iguales; donde no dara otra opcion mas que salir.
             */
            /* string resp, usuario, contra */
            /* boolean valido */
            $resp = "s";
            
            echo "Ingrese su Nombre de usuario / Contraseña \n";
            $usuario = trim(fgets(STDIN));
            $contra = trim(fgets(STDIN));
            $valido = FALSE;

            if ($this->validarUsuario($usuario) && $this->validarContrasenia($contra)){
                $valido = TRUE;
            } elseif ($this->validarUsuario($usuario)){
                $valido = $this->intentosContrasenia();
            } else {
                echo "Usuario no valido\n";
            }

            return $valido;
        }

        public function existeContrasenia($nCont){
            /***
             * Funcion utilizada en cambiarContrasenia()
             * Retorna un booleano en casi de encontrar la contraseña en la lista.
             * Busqueda parcial
             */
            $listContra = $this->getListaContrasenia();
            $i=0;
            $existe = FALSE;

            while ($i<count($listContra) && !$existe){
                if ($listContra[$i] == $nCont){
                    $existe = TRUE;
                }
                $i++;
            }
            return $existe;
        }

        public function cambiarListaContrasenia($nCont){
            /***
             * Funcion utilizada en cambiarContrasenia() 
             * Retorna un arreglo con las ultimas 4 contraseñas.
             * Descarta la ultima contraseña antigua.
             */
            /* array lisCon, newList */
            $lisCon = $this->getListaContrasenia();
            $newList = [$nCont, $lisCon[0], $lisCon[1], $lisCon[2]];
            $this->setListaContrasenia($newList);
        }

        public function cambiarFrase(){
            /***
             * Funcion utilizada en cambiarContrasenia()
             * Cambia la frase para recordar la nueva contraseña
             */
            echo "Ingrese una frase para recordar su contraseña\n";
            $this->setFrase(trim(fgets(STDIN)));
        }

        public function cambiarContrasenia(){
            /***
             * Funcion para cambiar la contraseña
             * Donde compara la nueva contraseña con las anteriores:
             *  1. No existe la contraseña; donde cambia la contraseña, la lista de contraseñas y la frase.
             *  2. Existe la contraseña.
             */
            /* string newContra */
            echo "Ingrese su nueva contraseña\n";
            $newContra = trim(fgets(STDIN));

            if (!$this->existeContrasenia($newContra)){
                $this->setContrasenia($newContra);
                $this->cambiarListaContrasenia($newContra);
                $this->cambiarFrase();
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function __toString()
        {
            return  "\nUsuario: ".$this->getNombreUsuario().
                    "\nContraseña: ".$this->getContrasenia().
                    "\nFrase: ".$this->getFrase().
                    "\nContraseñas Anteriores: ".$this->mostrarContraniaAntiguas();
        }

        public function mostrarContraniaAntiguas(){
            /***
             *  Retorna un string con todas la contraseñas del atributo listaContrasenia 
             */
            $frase = "[ ";
            foreach ($this->getListaContrasenia() as $indice => $contra){
                $frase = $frase." ".$contra." ";
            }
            return $frase." ]";
        }
    }