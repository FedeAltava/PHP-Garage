<?php
session_start();

if(isset($_SESSION['usuario'])){
    echo "Bienvenido/a  a sus vehiculos  ". $_SESSION['usuario']." ." ;
}else{
    header('Location:index.php');
}
$archivo = 'vehiculos.csv';  // Nombre del archivo CSV

// Abrir el archivo en modo lectura
if (($archivoCSV = fopen($archivo, 'r')) !== false) {
    // Inicializar arrays para almacenar las motos y los coches
    $motos = [];
    $coches = [];

    // Leer todas las líneas del archivo
    while (($linea = fgetcsv($archivoCSV)) !== false) {
        // Si la primera columna es "moto", se agrega a las motos
        if (isset($linea[0]) && $linea[0] == 'moto') {
            $motos[] = $linea;
        }
        // Si la primera columna es "coche", se agrega a los coches
        elseif (isset($linea[0]) && $linea[0] == 'coche') {
            $coches[] = $linea;
        }
    }

    // Mostrar las motos
    if(isset($_COOKIE['mostrarMoto'])){
        if (count($motos) > 0) {
            echo "<h3>Lista de Motos:</h3>";
            foreach ($motos as $moto) {
                echo "<p>Marca: {$moto[1]}, Modelo: {$moto[2]}, Año: {$moto[3]}, Combustible: {$moto[4]}, Consumo: {$moto[5]}, Cilindrada: {$moto[6]}</p>";
            }
        } else {
            echo "<p>No se encontraron motos en el archivo.</p>";
        }
    }

    // Mostrar los coches
    if(isset($_COOKIE['mostrarCoche'])){
        if (count($coches) > 0) {
            echo "<h3>Lista de Coches:</h3>";
            foreach ($coches as $coche) {
                echo "<p>Marca: {$coche[1]}, Modelo: {$coche[2]}, Año: {$coche[3]}, Combustible: {$coche[4]}, Consumo: {$coche[5]}, Puertas: {$coche[6]}</p>";
            }
        } else {
            echo "<p>No se encontraron coches en el archivo.</p>";
        }
    }
    // Cerrar el archivo CSV
    fclose($archivoCSV);
} else {
    echo "No se pudo abrir el archivo CSV.";
}



if(isset($_COOKIE['colorbackGround'])){
    $backGroundColor = $_COOKIE['colorbackGround'];
    echo "<script>document.body.style.backgroundColor = '$backGroundColor';</script>";
}
if(isset($_COOKIE['colorText'])){
    $colorText = $_COOKIE['colorText'];
    echo "<script>document.body.style.color = '$colorText';</script>";
}
if(isset($_COOKIE['sizeText'])){
    $textSize = $_COOKIE['sizeText'];
    echo "<script>document.body.style.fontSize = '$textSize';</script>";
}
if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
    setcookie('colorbackGround', '', time() - 3600, '/');
    setcookie('colorText', '', time() - 3600, '/');
    setcookie('sizeText', '', time() - 3600, '/');
    header("Location: index.php");
    exit();
}
if(isset($_POST['menu'])){

    header("Location: menu.php");
}
?>
<body>
    <form action="" method="POST">

        <input type="submit" name="menu" value="menu">
        <input type="submit" name="cerrarSesion" value="CerrarSesion">
    </form>
</body>