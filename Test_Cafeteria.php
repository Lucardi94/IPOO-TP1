<?php
    include 'Cafeteria.php';

    $c = new Cafeteria(500,150);
    $c->llenarCafetera();
    echo "".$c->getCantidadActual();

    while($c->getCantidadActual() != 0){
        echo "\nMas cafe cariño? cuantos cc?";
        $cantidad = trim(fgets(STDIN));

        $alcanza = $c->servirTaza($cantidad);
        echo $alcanza;
    }

    $c->agregarCafe(100);

    echo "\n".$c;
