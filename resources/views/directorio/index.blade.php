   
   @extends('layouts.app') 
    @section('content')
   <div class="contenedor">
        <h1>Directorio de Empleados</h1>
        <a href="/directorio/create" class="btn-nuevo">+ Nuevo Empleado</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Departamento</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado['nombre'] }}</td>
                    <td>{{ $empleado['puesto'] }}</td>
                    <td>{{ $empleado['departamento'] }}</td>
                    <td><span class="badge badge-{{ $empleado['estatus'] }}">{{ $empleado['estatus'] }}</span></td>
                    <td>
                        <a href="/directorio/{{ $empleado['id'] }}">Ver</a>
                        <a href="/directorio/{{ $empleado['id'] }}/edit">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection