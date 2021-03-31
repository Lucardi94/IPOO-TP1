<?php
    include 'Libro.php';

    $libroUno = new Libro("no se que esto", "pepe grillo", 1990,"Libraco del centro", "Lucas", "Alvarado");
    $libroDos = new Libro("no se que esto", "pepe", 1000,"L", "Lucas", "Alvarado");
    $libroTres = new Libro("no se que esto", "pepe rersdfsdf", 1999,"L", "Lucas", "Alvarado");


    $listaLibro = [$libroUno, $libroDos, $libroTres];
    if ($libroUno->iguales($libroUno,$listaLibro)){
        echo "Esta aca dentrito";
    }
    if ($libroUno->perteneceEditorial("Libraco del centro")){
        echo "\nEsta aca dentrito";
    }
    echo "\n".$libroUno->aniosdesdeEdicion();
    
    $lLibro = $libroUno->librodeEditoriales($listaLibro,"L");

    foreach ($lLibro as $libro){
        echo $libro["sbn"]."\n".
        $libro["titulo"]."\n".
        $libro["anioEdicion"]."\n".
        $libro["editorial"]."\n".
        $libro["nombreAutor"]."\n".
        $libro["apellidoAutor"]."\n";
    }

    echo $libroUno;

