<?php
for($i=0; $i<sizeof($artista);$i++){
    echo 'Artista:<br>';
    echo '<li>Nombre: '.$artista[$i]['name'].'</li>';
    if(isset($artista[$i]['country'])){
        echo '<li>Pais: '.$artista[$i]['country'].'</li>';
    }
    if(isset($artista[$i]['type'])){
        echo '<li>Tipo: '.$artista[$i]['type'].'</li>';
    }
    if(isset($artista[$i]['life-span']['begin'])){
        echo '<li>Fecha de inicio: '.$artista[$i]['life-span']['begin'].'</li>';
    }
    if(isset($artista[$i]['life-span']['end'])){
        echo '<li>Fecha de jubilacion: '.$artista[$i]['life-span']['end'].'</li>';
    }
}
?>