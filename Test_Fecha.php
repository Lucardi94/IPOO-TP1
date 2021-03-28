<?php
    include 'Fecha.php';

    $fUno = new Fecha(27,2,4); //creamos la fecha nueva
    $fDos = new Fecha(27,2,100); //creamos la fecha nueva
    $fTres = new Fecha(30,12,400); //creamos la fecha nueva

    //Con estos años probamos todas las funciones de la clase
    $nf = $fUno->incremetoDias(2,$fUno);    
    echo $nf."\n";
    echo $nf->StringDos()."\n\n";

    $nf = $fDos->incremetoDias(2,$fDos);    
    echo $nf."\n";
    echo $nf->StringDos()."\n\n";

    $nf = $fTres->incremetoDias(2,$fTres);    
    echo $nf."\n";
    echo $nf->StringDos()."\n\n";