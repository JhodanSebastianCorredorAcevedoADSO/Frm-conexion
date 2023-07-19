<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="bg-green p-4 rounded">
            <h1 class="text-center m-4">
                Formulario Conexión
            </h1>

            <form action="controller/controllerguardar.php" method="post" id="formulario" class="row text-center">
                <div class="col-md-6 offset-md-3">
                    <label class="form-label">Primer Nombre</label>
                    <input type="text" name="firs_name" id="firs_name" class="form-control">
                </div>

                <div class="col-md-6 offset-md-3">
                    <label class="form-label">Segundo Nombre</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>

                <div class="col-md-6 offset-md-3">
                    <label class="form-label">Cédula</label>
                    <input type="text" name="cedula" id="cedula" class="form-control">
                </div>

                <div class="col-md-6 offset-md-3">
                    <label class="form-label">Correo</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary m-2" id="enviar" name="enviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
