<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>
                    ESTUDIANTES
                </h3>
                <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">Nuevo estudiante</a>
            </div>
            <div class="card-body">


                    <form action="{{ route('estudiantes.index') }}" method="get" class="d-flex mb-3">
                        <input type="number" name="query" class="form-control w-25 m-1">
                        <button type="submit" class="btn btn-primary m-1">Buscar</button>
                    </form>
                    

                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>TELEFONO</th>
                            <th>DIRECCION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                            @php
                                $id = $estudiante['id'];
                            @endphp
                            <tr>
                                <td>{{ $estudiante['cedula'] }}</td>
                                <td>{{ $estudiante['nombre'] }}</td>
                                <td>{{ $estudiante['apellido'] }}</td>
                                <td>{{ $estudiante['telefono'] }}</td>
                                <td>{{ $estudiante['direccion'] }}</td>

                                <td class="d-flex">
                                    <a href="{{ route('estudiantes.edit', $id) }}"
                                        class="btn btn-primary m-1">Editar</a>
                                    <form action="{{ route('estudiantes.destroy', $id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger m-1">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>



</body>

</html>
