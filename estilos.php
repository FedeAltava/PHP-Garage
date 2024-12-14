<?php
session_start();

if(isset($_SESSION['usuario'])){
    echo  $_SESSION['usuario']." seleccione la configuracion de estilo que prefiera." ;
}else{
    header('Location:index.php');
}
//comprobaciones inputs.
    //backgroundColor
    if(isset($_POST['backgroundColor'])){
        $colorbackGround = trim($_POST['backgroundColor']);
        if (preg_match('/^#[0-9A-Fa-f]{6}$/', $colorbackGround)) {
            setcookie("colorbackGround", $colorbackGround, time() + (86400 * 30), "/");
        } else {
            echo "El formato del color no es válido. Asegúrate de usar el formato #RRGGBB.";
        }
    }
    //textColor
    if(isset($_POST['textColor'])){
        $colorText = trim($_POST['textColor']);
        if (preg_match('/^#[0-9A-Fa-f]{6}$/', $colorText)) {
            setcookie("colorText", $colorText, time() + (86400 * 30), "/");
        } else {
            echo "El formato del color no es válido. Asegúrate de usar el formato #RRGGBB.";
        }
    }
     //texSize
    if(isset($_POST['texSize'])){
        $sizeText = $_POST['texSize'];
        setcookie("sizeText", $sizeText, time() + (86400 * 30), "/");
    }
    if (isset($_POST['borrar'])) {
        // Borrar las cookies
        setcookie('colorbackGround', '', time() - 3600, '/');
        setcookie('colorText', '', time() - 3600, '/');
        setcookie('sizeText', '', time() - 3600, '/');
        header("Location: menu.php");
        exit();
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
    if (isset($_POST['aceptar'])) {
        header("Location: menu.php");
        exit();
    }
    //comprobaciones cookies.
    if(isset($_COOKIE['colorbackGround'])){
        $backGroundColor = $_COOKIE['colorbackGround'];
        echo "<script>document.body.style.backgroundColor = '$backGroundColor';</script>";
    }
    if(isset($_COOKIE['textColor'])){
        $textColor = $_COOKIE['colorText'];
        echo "<script>document.body.style.color = '$textColor';</script>";
    }
    if(isset($_COOKIE['sizeText'])){
        $textSize = $_COOKIE['sizeText'];
        echo "<script>document.body.style.fontSize = '$textSize';</script>";
    }
    if (isset($_POST['cerrarSesion'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }

?>
<body>
    <form action="" method="Post" autocomplete="on">
        <br>
        <br>
        <?php
          if (isset($_COOKIE['colorbackGround'])) {
            $backGroundColorDiv = $_COOKIE['colorbackGround'];
            echo "
            <div style='margin-bottom: 10px;'>
                <p style='display: inline-block; margin-right: 10px;'>Color de fondo: </p>
                <div style='display: inline-block;'>
                    <div style='width: 80px; height: 40px; background-color: white; display: flex; align-items: center; justify-content: center; border: 1px solid black; margin: 5px;'>
                        <div style='width: 50px; height: 25px; background-color: $backGroundColorDiv; border: 1px solid black;'></div>
                    </div>
                </div>
            </div>";
        } else {
            echo "
            <div style='margin-bottom: 10px;'>
                <label for='backgroundColor'>Color de fondo (formato #000000):</label>
                <input type='text' id='backgroundColor' name='backgroundColor'>
            </div>";
        }
        
        if (isset($_COOKIE['colorText'])) {
            $textColorDiv = $_COOKIE['colorText'];
            echo "
            <div style='margin-bottom: 10px;'>
                <p style='display: inline-block; margin-right: 10px;'>Color de texto: </p>
                <div style='display: inline-block;'>
                    <div style='width: 80px; height: 40px; background-color: white; display: flex; align-items: center; justify-content: center; border: 1px solid black; margin: 5px;'>
                        <div style='width: 50px; height: 25px; background-color: $textColorDiv; border: 1px solid black;'></div>
                    </div>
                </div>
            </div>";
        } else {
            echo "
            <div style='margin-bottom: 10px;'>
                <label for='textColor'>Color de texto (formato #000000):</label>
                <input type='text' id='textColor' name='textColor'>
            </div>";
        }
        
        // Tamaño de texto (alineado en la misma línea que el label)
        $texSizeInput = isset($_COOKIE['texSize']) ? $_COOKIE['texSize'] : '';
        echo "
        <div style='margin-bottom: 10px;'>
            <label for='texSize' style='display: inline-block; margin-right: 10px;'>Tamaño de texto (entre 10 y 20):</label>
            <input type='number' id='texSize' name='texSize' min='10' max='20' placeholder='$texSizeInput' value='$texSizeInput' style='display: inline-block;'>
        </div>";
        
        // Botones
        if (isset($_COOKIE['colorbackGround']) || isset($_COOKIE['colorText']) || isset($_COOKIE['texSize'])) {
            echo "
            <div style='margin-top: 10px;'>
                <button name='aceptar'>Aceptar</button>
                <button name ='borrar'>Borrar</button>
                <button>Cerrar Sesión</button>
            </div>";
        } else {
            echo "
            <div style='margin-top: 10px;'>
                <button name='aceptar'>Aceptar</button>
                <button name='cerrarSesion'>Cerrar Sesión</button>
            </div>";
        }
        
        
   
        ?>
    </form>
</body>