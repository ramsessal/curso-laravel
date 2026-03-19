@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <header class="page-header">
        <h1>Editar Empleado</h1>
        <p>Actualiza la información del empleado</p>
    </header>

    <div class="form-container">
        <form action="{{ route('empleados.update', $empleado['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre Completo<span class="required">*</span></label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" value="{{ old('nombre', $empleado['nombre']) }}" required>
                @error('nombre')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="puesto">Puesto<span class="required">*</span></label>
                <input type="text" id="puesto" name="puesto" placeholder="Ej: Desarrollador Frontend" value="{{ old('puesto', $empleado['puesto']) }}" required>
                @error('puesto')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email<span class="required">*</span></label>
                <input type="email" id="email" name="email" placeholder="Ej: empleado@empresa.com" value="{{ old('email', $empleado['email']) }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono<span class="required">*</span></label>
                <input type="text" id="telefono" name="telefono" placeholder="Ej: 555-1234" value="{{ old('telefono', $empleado['telefono']) }}" required>
                @error('telefono')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="departamento">Departamento<span class="required">*</span></label>
                <input type="text" id="departamento" name="departamento" placeholder="Ej: Desarrollo" value="{{ old('departamento', $empleado['departamento']) }}" required>
                @error('departamento')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', $empleado['fecha_ingreso']) }}">
                @error('fecha_ingreso')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="img">Foto del Empleado</label>
                @if(!empty($empleado['img']))
                    <img src="{{ $empleado['img'] }}" alt="Imagen actual" class="current-image" style="max-width:160px; display:block; margin-bottom:8px;">
                    <p style="font-size: 12px; color: var(--muted); margin-top: 4px;">Imagen actual</p>
                @endif
                <div class="file-input-wrapper">
                    <input type="file" id="img" name="img" accept="image/*" onchange="updateFileName(this)">
                    <label for="img" class="file-input-label">
                        <svg style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        <span>Cambiar imagen</span>
                    </label>
                    <div class="file-name" id="file-name"></div>
                </div>
                @error('img')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="notes">Notas/Observaciones</label>
                <textarea id="notes" name="notes" placeholder="Información adicional sobre el empleado...">{{ old('notes', $empleado['notes'] ?? '') }}</textarea>
                @error('notes')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="activo" name="activo" value="1" {{ old('activo', $empleado['activo']) ? 'checked' : '' }}>
                    <label for="activo">Empleado activo</label>
                </div>
            </div>

            <div class="btn-group" style="display:flex;gap:12px;margin-top:18px;">
                <a href="{{ route('empleados.show', $empleado['id']) }}" class="btn btn-muted" style="flex:1;">Cancelar</a>
                <button type="submit" class="btn btn-primary" style="flex:1;">Actualizar Empleado</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
<script>
    function updateFileName(input) {
        const fileNameDiv = document.getElementById('file-name');
        if (input.files && input.files[0]) {
            fileNameDiv.textContent = '📎 ' + input.files[0].name;
        } else {
            fileNameDiv.textContent = '';
        }
    }
</script>
@endpush
