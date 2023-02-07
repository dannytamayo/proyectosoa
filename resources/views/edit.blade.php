<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">

        <div class="card">

            <div class="card-header ">
                <h3 class="text-center">EDITAR DEL ESTUDIANTE</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" value="{{$estudiante->cedula}}" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$estudiante->nombre}}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{$estudiante->apellido}}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$estudiante->telefono}}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$estudiante->direccion}}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Editar</button>
                </form>


            </div>


        </div>
    </div>

</body>
</html>