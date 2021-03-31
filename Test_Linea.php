<?php
    include 'Linea.php';

    $l = new Linea(1,1,3,3);
    echo $l;

    $l->mueveArriba(2);
    echo "+2 arriba \n".$l;
    $l->mueveAbajo(4);
    echo "+4 abajo \n".$l;
    $l->mueveDerecha(2);
    echo "+2 derecha \n".$l;
    $l->mueveIzquierda(4);
    echo "+4 izquierda \n".$l;