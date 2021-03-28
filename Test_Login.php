<?php
    include 'Login.php';

    //Creamo el objeto login
    $l = new Login("Admin", "Admin", "Esta relacionado a tu puesto A D M N", ["Admin", "Admin1","Admin2","Admin3"]);

    //Probamos la funcion ingreso() que a su vez llama a otras funciones.
    if ($l->ingreso()){
        echo "Usuario: ".$l->getNombreUsuario()."\n"; //Si ingresa mostrara este carte
        $l->cambiarContrasenia(); //Probamos la funcion cambiar contraseña
    } else {
        echo "No ingreso\n"; //Si no ingresa mostrara este carte
    }

    echo $l;