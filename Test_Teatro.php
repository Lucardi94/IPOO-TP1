<?php 
    include 'Teatro.php';

    $funcion1 = array ("nombre" => "Matrix en HD", "precio" => 100);
    $funcion2 = array ("nombre" => "La Sirenita", "precio" => 150);
    $funcion3 = array ("nombre" => "IT con Dani de Vitto", "precio" => 200);
    $funcion4 = array ("nombre" => "Los Sims", "precio" => 250);
    $listFunciones = [$funcion1, $funcion2, $funcion3, $funcion4];

    $t = new Teatro("Villaspeople","Amaranto Suarez 1114",$listFunciones);

    $t->cambiarNombre("KFC");
    $t->cambiarDireccion("Changalay 89");
    $t->cambiarNombreFuncion("Matrix pero no en HD",0);
    $t->cambiarPrecioFuncion(500,0);

    echo "\n".$t;