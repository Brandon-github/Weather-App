<?php
    session_start();

    $datos = false;

    if (
        isset($_SESSION['pais']) && isset($_SESSION['temperatura']) && isset($_SESSION['temperatura-max'])
        && isset($_SESSION['temperatura-min']) && isset($_SESSION['tiempo-main']) && isset($_SESSION['humedad']) 
        && isset($_SESSION['description'])
    ) 
    {

        $pais = $_SESSION['pais'];
        $temperatura = $_SESSION['temperatura'];
        $temperatura_maxima = $_SESSION['temperatura-max'];
        $temperatura_minima = $_SESSION['temperatura-min'];
        $tiempo_main = $_SESSION['tiempo-main'];
        $humedad = $_SESSION['humedad'];
        $descripcion = $_SESSION['description'];

        $datos = true;
        
    }

    function change_weather_image($weather_type)
    {
       switch($weather_type)
       {
           case 'Clouds':
                echo './img/icons/bx-cloud.svg?v=0';
                break;
            case 'Rain':
                echo './img/icons/bx-cloud-rain.svg?v=0';
                break;
            case 'Clear':
                echo './img/icons/bx-cloud-clear.svg?v=0';
                break;
            default:
                echo '';
                break;

       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo(rand())?>">
</head>
<body>
    <div id="container">
        <div id="title">
            <h1>Weather App</h1>
            <h4>Using API REST</h4>
        </div>
        <form action="./datos.php" method="POST" id="form">
            <input type="text" placeholder="Input Country" name="pais" class="form-input">
            <input type="submit" value="Search" class="form-button" onclick="return buscarDatos()">
            <div class="error"></div>
        </form>
        <?php if($datos){ ?>
            <div id="container-search">
                <!-- Box -->
               <div class="box">
                   <!-- Box Body -->
                   <div class="box-body">
                        <div class="box-block">
                            <div>
                                <span class="box-image">
                                    <img src="<?php change_weather_image($tiempo_main) ?>" alt="">
                                </span>
                                <span class="box-temp"><?php echo($temperatura) ?>°C</span> 
                            </div>
                            <div>
                                <span class="description"><?php echo($descripcion) ?></span>
                            </div>
                        </div>   
                        <div class="box-block">
                            <span class="box-country"><?php echo($pais) ?></span>
                            <span class="box-weather"><?php echo($tiempo_main) ?></span>
                        </div>                    
                   </div>
                   <!-- Box Footer -->
                   <div class="box-footer">
                       <div class="box-block">
                           <span class="box-humidity">Humidity: <?php echo($humedad) ?>%</span>
                       </div>
                       <div class="box-block">
                           <span class="box-temp-min">Min: <?php echo($temperatura_minima) ?>°C</span>
                           <span class="box-temp-max">Min: <?php echo($temperatura_maxima) ?>°C</span>
                       </div>
                   </div>
               </div>
            </div>
        <?php } ?>
    </div>
    <script src="./js/app.js"></script>
</body>
</html>

<?PHP session_destroy(); ?>