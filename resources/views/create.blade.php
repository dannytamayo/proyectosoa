<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header ">
                <h3 class="text-center">INGRESO DE ESTUDIANTE</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('estudiantes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Ingresa tu cédula">
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group mt-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido">
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono">
                    </div>
                    <div class="form-group mt-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                </form>


            </div>


        </div>
    </div>

</body>

</html>
