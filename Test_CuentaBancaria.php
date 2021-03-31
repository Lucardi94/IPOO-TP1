<?php
    include 'CuentaBancaria.php';

    $c = new CuentaBancaria(1,1,100,3.65);
    $c->actualizarSaldo();

    echo $c->getSaldoActual();

    $c->depositar(2000);
    echo "\n".$c;

    if ($c->retirar(1000)){
        echo "\n Exitoso papa";
    }
    echo "\n".$c;

    if ($c->retirar(2000)){
        echo "\n Exitoso papa";

    } else {
        echo "\n No te alcanza coraje ";
    }
    echo "\n".$c;
