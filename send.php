<?php

include("conexion.php");

if (isset($_POST['send'])) {

    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['password']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['phone']) >= 1
    ) {

        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $fecha = date("d/m/y");

        // Consulta para insertar los datos en la base de datos
        $consulta = "INSERT INTO datos(nombre, contraseña, email, telefono, fecha)
                     VALUES ('$name', '$password', '$email', '$phone', '$fecha')";

        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            // Registro exitoso, redirigir a la página deseada
            header('Location: /pagina/index.html');
            exit(); // Importante para detener el script después de la redirección
        } else {
            ?>
            <h3 class="error">Ocurrió un error al registrar los datos</h3>
            <?php
        }
    } else {
        ?>
        <h3 class="error">Por favor, llena todos los campos</h3>
        <?php
    }
}
?>