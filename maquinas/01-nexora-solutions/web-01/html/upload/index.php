<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {

        $filename = basename($_FILES["file"]["name"]);
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Bloqueo específico de archivos PHP.
        if ($extension === "php") {

            $message = "Error: los archivos PHP no están permitidos.";

        } else {

            $destination = __DIR__ . "/../uploads/" . $filename;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $destination)) {
                $message = "Archivo subido correctamente.";
            } else {
                $message = "Error al guardar el archivo.";
            }

        }

    } else {

        $message = "No se ha seleccionado ningún archivo válido.";

    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Documentos - Nexora Solutions</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>

    <h1>Portal de documentos</h1>

    <p>
        Utiliza este formulario para subir documentos al servidor.
    </p>

    <?php if ($message !== ""): ?>
        <p>
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">

        <input type="file" name="file">

        <button type="submit">
            Subir archivo
        </button>

    </form>

    <br>

    <a href="/">Volver al inicio</a>

</body>

</html>