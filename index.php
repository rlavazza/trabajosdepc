<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

if (file_exists("archivo.txt")) {
    $jsonClientes = file_get_contents("archivo.txt");
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();
}

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if ($_POST) {
    $nombre = trim($_REQUEST["txtNombre"]);
    $dni = trim($_REQUEST["txtDni"]);
    $telefono = trim($_REQUEST["txtTel"]);
    $correo = trim($_REQUEST["txtMail"]);
    $imagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$imagen");
    }

    if ($id != "") {
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $imagen = $aClientes[$id]["imagen"];
        } else {
            unlink("imagenes/" . $aClientes[$id]["imagen"]);
        }

        $aClientes[$id] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "tel" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
    } else {
        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "tel" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
    }
    $jsonClientes = json_encode($aClientes);

    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
}

if ($id != "" && isset($_REQUEST["do"]) && $_REQUEST["do"] == "eliminar") {
    unset($aClientes[$id]);
    $jsonClientes = json_encode($aClientes);
    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Clientes</title>
</head>
</head>

<body>
    <main>
        <div class="container-fluid px-0">
        <div class="row linea bg-dark mx-0 px-0">
    <h2 class="my-3 text-center">ABM CLIENTES</h3>
</div>
            <div class="row pb-3 border">
               <div class="registro col-12 col-sm-7 mx-auto border border-3 px-5 pb-3 my-5">
                <h1 class="text-center mt-4">Registro</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group pt-1">
                            <label for="txtNombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control form-control border-dark" name="txtNombre" id="txtNombre" required value="<?php echo isset($aClientes[$id]["nombre"]) ? $aClientes[$id]["nombre"] : ""; ?>">
                        </div>
                        <div class="form-group pt-1">
                            <label for="txtDni" class="form-label">DNI:</label>
                            <input type="text" class="form-control border-dark" name="txtDni" id="txtDni" required value="<?php echo isset($aClientes[$id]["dni"]) ? $aClientes[$id]["dni"] : ""; ?>">
                        </div>
                        <div class="form-group pt-1">
                            <label for="txtTel" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control border-dark" name="txtTel" id="txtTel" required value="<?php echo isset($aClientes[$id]["tel"]) ? $aClientes[$id]["tel"] : ""; ?>">
                        </div>
                        <div class="form-group pt-1">
                            <label for="txtMail" class="form-label">Email:</label>
                            <input type="txt" class="form-control border-dark" name="txtMail" id="txtMail" required value="<?php echo isset($aClientes[$id]["correo"]) ? $aClientes[$id]["correo"] : ""; ?>">
                            <div class="form-group pt-1">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control border-dark" name="pass">
                            </div>
                            <div class="form-group pt-3">
                                <label for="archivo" class="form-label">Archivo adjunto:</label>
                                <input type="file" class="form-control-file mx-3" name="archivo" id="archivo" accept=".jpg,.jpeg,.png">
                            </div>
                            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                                <button class="btn btn-outline-dark bg-light px-5" type="submit" id="btnGuardar" name="btnGuardar">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                      
                <div class="row linea bg-dark mt-5 mx-0 px-0">
                    <h2 class="text-center my-2">Listado de clientes</h2>
                </div> 
                <div class="col-9 my-5 mx-auto">
                    <div class="row  bg-light">

                        <table class="table table-hover border border-3text-center">
                            <tr class= "table-secondary border border-dark">
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>

                            <?php foreach ($aClientes as $pos => $cliente) : ?>
                                <tr>
                                    <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail" width="100" height="56"></td>
                                    <td><?php echo $cliente["nombre"]; ?></td>
                                    <td><?php echo $cliente["dni"]; ?></td>
                                    <td><?php echo $cliente["tel"]; ?></td>
                                    <td><?php echo $cliente["correo"]; ?></td>
                                    <td style="width: 110px;">
                                        <a href="<?php echo "?id=$pos"; ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo "?id=$pos&do=eliminar"; ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <a href="index.php"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        </div>

    </main>
</body>

</html>