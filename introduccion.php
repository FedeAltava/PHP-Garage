
<?php
session_start();
require_once 'moto.php';
require_once 'coche.php';
$archivo = 'vehiculos.csv';

if(isset($_SESSION['usuario'])){
    echo "Bienvenido/a  ". $_SESSION['usuario']."  introduce la informacion deseada para " . $_GET['vehiculo'];
}else{
    header('Location:index.php');
}
//usar cookies 
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
//cerrar sesion
if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
    setcookie('colorbackGround', '', time() - 3600, '/');
    setcookie('colorText', '', time() - 3600, '/');
    setcookie('sizeText', '', time() - 3600, '/');
    header("Location: index.php");
    exit();
}



// Recuperar el tipo de vehículo desde la URL
$tipoVehiculo = isset($_GET['vehiculo']) ? $_GET['vehiculo'] : '';
$transporte = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos introducidos
   
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $año = $_POST['año'];
    $combustible = $_POST['combustible'];
    $consumo = $_POST['consumo'];

}
    // Comprobamos el tipo de vehículo
    if ($tipoVehiculo == 'moto') {
        if(isset($_POST['cilindrada'])){

                $cilindrada = $_POST['cilindrada'];
                $transporte = new Moto(
                $marca, 
                $modelo,
                $año, 
                $combustible,
                $consumo,
                $cilindrada,

           );
        } 
    }
  
    if ($tipoVehiculo == 'coche') {
        if(isset($_POST['puertas'])){
            $puertas = $_POST['puertas'];
            $transporte = new Coche(
                $marca, 
                $modelo,
                $año, 
                $combustible,
                $consumo,
                $puertas,
            );
        }
    }

// Guardar datos en el archivo CSV
if (isset($_POST['guardar'])) {
    if ($transporte != null) {
        if (($archivoCSV = fopen($archivo, 'a')) !== false) {
            // Obtener los datos del vehículo (Moto o Coche) como array
            $vehiculoDatos = $transporte->getDatosCSV();  // Usamos getDatosCSV para obtener los datos
            // Escribir los datos en el archivo CSV
            fputcsv($archivoCSV, $vehiculoDatos);
            fclose($archivoCSV);
            header("Location: menu.php");
        }
    }
}


?>

<body>

    <h2>Introduce los datos de tu <?php echo $tipoVehiculo; ?></h2>
    <form action="" method="POST">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required><br><br>

        <label for="año">Año:</label>
        <input type="number" name="año" id="año" required><br><br>

        <label for="combustible">Combustible:</label>
        <input type="text" name="combustible" id="combustible" required><br><br>

        <label for="consumo">Consumo (L/100km):</label>
        <input type="number" name="consumo" id="consumo" required><br><br>

        <?php if ($tipoVehiculo == 'moto') { ?>
            <label for="cilindrada">Cilindrada (cc):</label>
            <input type="number" name="cilindrada" id="cilindrada" required><br><br>
        <?php }; ?>

        <?php if ($tipoVehiculo == 'coche') { ?>
            <label for="puertas">Número de puertas:</label>
            <input type="number" name="puertas" id="puertas" required><br><br>
        <?php }; ?>

        <button type="submit" name="guardar">Guardar</button>
        <button type="submit" name="cerrarSesion">Cerrar Sesion</button>
    </form>
</body>
</html>


    
