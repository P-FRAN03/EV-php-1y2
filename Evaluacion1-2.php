
<?php

$errores = [];
$enviado = false;

$nombre = "";
$correo = "";
$mensaje = "";

if (isset($_POST["submit"])) {

    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $mensaje = trim($_POST["mensaje"]);

    if (empty($nombre)) {
        $errores[] = "Por favor ingresa un nombre.";
    }

    if (empty($correo)) {
        $errores[] = "Por favor ingresa un correo.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Por favor ingresa un CORREO VALIDO.";
    }

    if (empty($mensaje)) {
        $errores[] = "Por favor ingresa el mensaje.";
    }

    if (empty($errores)) {
        $enviado = true;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 15px;
        }

        form {
            max-width: 750px;
            margin: auto;
            padding: 30px;
            border-top: 5px solid royalblue;
            box-shadow: 0 0 5px gray;
        }

        input, textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #aaaaff;
            font-size: 16px;
        }

        textarea {
            height: 230px;
            resize: vertical;
            font-family: Arial, sans-serif;
        }

        button {
            display: block;
            margin-left: auto;
            padding: 15px 25px;
            background-color: #f4511e;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
            padding: 15px;
            margin-bottom: 20px;
        }

        .correcto {
            background-color: #4caf50;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
        }

    </style>

</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <input
            type="text"
            name="nombre"
            placeholder="Nombre:"
            value="<?php echo htmlspecialchars($nombre); ?>"
        >

        <input
            type="text"
            name="correo"
            placeholder="Correo:"
            value="<?php echo htmlspecialchars($correo); ?>"
        >

        <textarea
            name="mensaje"
            placeholder="Mensaje:"
        ><?php echo htmlspecialchars($mensaje); ?></textarea>

        <?php if (!empty($errores)) { ?>

            <div class="error">

                <?php
                foreach ($errores as $error) {
                    echo htmlspecialchars($error) . "<br>";
                }
                ?>

            </div>

        <?php } ?>

        <?php if ($enviado) { ?>

            <div class="correcto">
                Enviado Correctamente
            </div>

        <?php } ?>

        <button type="submit" name="submit">
            Enviar Correo
        </button>

    </form>

</body>
</html>
