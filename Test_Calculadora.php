<?php
    include "Calculadora.php";
    $c = new Calculadora(4,5,"/"); /* Crea un objeto calculadora con los respectivos atributos */

    $c->setValorA(10); /* test de los set's */
    $c->setValorB(2);
    $c->setOperador("*");

    echo $c; /* __toString() probamos los get's y la funcion resultado() */