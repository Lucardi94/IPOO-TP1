<?php
    include 'Cuadrado.php';

    $verA = array ("x" => 1, "y" => 1);
    $verB = array ("x" => 1, "y" => 3);
    $verC = array ("x" => 3, "y" => 1);
    $verD = array ("x" => 3, "y" => 3);

    $d = new Cuadrado(1, 1, 1, 1);
    $c = new Cuadrado($verA, $verB, $verC, $verD);

    $c->aumentarTamaño(4);
    echo "\n$c";

