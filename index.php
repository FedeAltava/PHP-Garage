<?php
session_start();
?>
<h1>Introduzca un usuario y contraseña</h1>
<form action="" method="Post">
    <label for="name">Usuario</label>
    <input type="text" id="name" name="name" required>
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>

<?php
$file = 'pwd.txt';
$valid = false;

if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Abrir el archivo
    $openedFile = fopen($file, 'r');
    if ($openedFile) {
        while (($linea = fgets($openedFile)) !== false) {
            list($user, $userPassword) = explode(':', trim($linea));
            
            if ($name === $user && $password === $userPassword) {
               
                $_SESSION['usuario'] = $name;
                fclose($openedFile);
                header('Location: menu.php');
                exit();
            }
        }
        fclose($openedFile);
    }


    echo "<script language='javascript'>alert('Usuario o contraseña incorrecto/a'); window.location.href = 'index.php';</script>";
}
?>
