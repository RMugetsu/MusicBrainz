<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action=""></form>
</body>
<form action="/" method="GET">
    Busca:
    <br>
    <input type="text" name="consulta">
</form>
<?php
for($i=0; $i<sizeof($data);$i++){
    echo 'Artista:<br>';
    echo '<li>Nombre: '.$data[$i]['name'].'</li>';
    if(isset($data[$i]['country'])){
        echo '<li>Pais: '.$data[$i]['country'].'</li>';
    }
    if(isset($data[$i]['type'])){
        echo '<li>Tipo: '.$data[$i]['type'].'</li>';
    }
    if(isset($data[$i]['life-span']['begin'])){
        echo '<li>Fecha de inicio: '.$data[$i]['life-span']['begin'].'</li>';
    }
    if(isset($data[$i]['life-span']['end'])){
        echo '<li>Fecha de jubilacion: '.$data[$i]['life-span']['end'].'</li>';
    }
}
dd($data);
?>
</html>