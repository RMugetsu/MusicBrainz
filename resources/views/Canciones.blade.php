<?php
for($i=0; $i<sizeof($canciones);$i++){
    echo 'canciones:<br>';
    echo '<li>Nombre: '.$canciones[$i]['name'].'</li>';
    if(isset($canciones[$i]['country'])){
        echo '<li>Pais: '.$canciones[$i]['country'].'</li>';
    }
    if(isset($canciones[$i]['type'])){
        echo '<li>Tipo: '.$canciones[$i]['type'].'</li>';
    }
    if(isset($canciones[$i]['life-span']['begin'])){
        echo '<li>Fecha de inicio: '.$canciones[$i]['life-span']['begin'].'</li>';
    }
    if(isset($canciones[$i]['life-span']['end'])){
        echo '<li>Fecha de jubilacion: '.$canciones[$i]['life-span']['end'].'</li>';
    }
}
?>