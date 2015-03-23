<?php
    // Conectando, seleccionando la base de datos
    $link = mysql_connect('127.0.0.1', 'root', '')
    
    or die('No se pudo conectar: ' . mysql_error());
    
    echo 'Connected successfully';
    
    mysql_select_db('php-angularjs') or die('No se pudo seleccionar la base de datos');
    
    // Realizar una consulta MySQL
    $query = 'SELECT * FROM people';
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    
    echo "names: ".json_encode($result);
    
    // Liberar resultados
    mysql_free_result($result);
    
    // Cerrar la conexión
    mysql_close($link);
?>
