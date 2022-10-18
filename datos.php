<?php
    session_start();

    require __DIR__ . '/vendor/autoload.php';
    
    // Carga de variables de entorno
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // ciudad recibida
    $nombre_ciudad = $_POST['pais'];

    //datos API REST para consumir
    $llave_api = $_ENV['API_KEY'];
    $direccion_api = 'https://api.openweathermap.org/data/2.5/weather?q='.$nombre_ciudad.'&appid='.$llave_api;

    // Obtencion de datos en json
    $datos_tiempo = json_decode(file_get_contents($direccion_api), true);

    // Obtencion de datos API REST
    $temperatura = $datos_tiempo['main']['temp'] - 273.15/* Grados C */;
    $temperatura_maxima = $datos_tiempo['main']['temp_max'] - 273.15;
    $temperatura_minima = $datos_tiempo['main']['temp_min'] - 273.15;
    $tiempo_main = $datos_tiempo['weather'][0]['main'];
    $humedad = $datos_tiempo['main']["humidity"];
    $descripcion = $datos_tiempo['weather'][0]['description'];

    /**
     * Variables Session
     */
    $_SESSION['pais'] = $nombre_ciudad;
    $_SESSION['temperatura'] = $temperatura;
    $_SESSION['temperatura-max'] = $temperatura_maxima;
    $_SESSION['temperatura-min'] = $temperatura_minima;
    $_SESSION['tiempo-main'] = $tiempo_main;
    $_SESSION['humedad'] = $humedad;
    $_SESSION['description'] = $descripcion;
    
    // Redireccionamiento 
    header('Location: index.php');
?>







