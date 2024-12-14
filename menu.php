<?php
session_start();
    if(isset($_SESSION['usuario'])){
        echo "Bienvenido/a  ". $_SESSION['usuario']."  seleccione la opcion deseada." ;
    }else{
        header('Location:index.php');
    }
    
    setcookie('mostrarMoto', '', time() + -3600, '/');
    setcookie('mostrarCoche', '', time() + -3600, '/');
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

?>
<body>
    <form action="" method="POST">
        <input type="submit" name="estilo" value="estilos">
        <input type="submit" name="introducirCoche" value="IntroducirCoche">
        <input type="submit" name="introducirMoto" value="IntroducirMoto">
        <input type="submit" name="mostrarCoche" value="MostrarCoche">
        <input type="submit" name="mostrarMoto" value="MostrarMoto">
        <input type="submit" name="cerrarSesion" value="CerrarSesion">
    </form>
</body>


<?php
    if(isset($_POST['estilo'])){

        header("Location: estilos.php");
        exit();
    }
    if (isset($_POST['introducirMoto'])) {
        header("Location: introduccion.php?vehiculo=moto");
        exit();
    } elseif (isset($_POST['introducirCoche'])) {
        header("Location: introduccion.php?vehiculo=coche");
        exit();
    }
    if(isset($_POST['mostrarCoche'])){
        setcookie('mostrarCoche', 'true', time() + 3600, '/');
        header("Location: obtencion.php");
        exit();
    }
    if(isset($_POST['mostrarMoto'])){
        setcookie('mostrarMoto', 'true', time() + 3600, '/');
        header("Location: obtencion.php");
        exit();
    }
    ?>
