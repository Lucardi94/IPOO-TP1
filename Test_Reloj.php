<?php
    include 'Reloj.php';


    function cronometro ($objT){
        /***
         * Muestra el objeto y agrega hasta que lo dedecir "n".
         * funcion agegar segundo utiliza todas las funciones de la clase.
         * to_string idem         * 
        */
        echo  $objT;
        do{
            echo  " ¿Desea agregar? >> s / n <<\n" ;
            $resp = trim(fgets(STDIN));

            if ($resp == "s"){
                $objT->agregarSegundo();
                echo  $objT;
            }

        } while ($resp != "n");
    }

    $t = new Reloj(56,59,23);   //Creamos objeto (segundo, minuto, hora)
    cronometro($t);             //Esta funcion probara todas las funciones de la clase