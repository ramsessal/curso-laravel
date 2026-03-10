@extends('layouts.app')

@section('title', $empleado['nombre'] . ' - Detalles')

@section('content')
    <div class="container">
        <a href="{{ route('empleados.index') }}" class="btn btn-muted" style="display:inline-flex;align-items:center;gap:8px;margin-bottom:18px;">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Volver al directorio
        </a>

        <div class="profile-card card" style="padding:28px;">
            <div class="profile-header" style="display:flex;gap:20px;align-items:center;border-bottom:1px solid var(--border);padding-bottom:20px;margin-bottom:16px;">
                <div class="avatar-wrap">
                    <div class="avatar-ring" style="width:110px;height:110px;padding:4px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent-soft));">
                        <img src="{{ $empleado['img'] }}" alt="Foto de {{ $empleado['nombre'] }}" style="width:100%;height:100%;border-radius:50%;object-fit:cover;border:4px solid var(--surface);">
                    </div>
                    <div class="status-dot {{ $empleado['activo'] ? 'activo' : 'vacaciones' }}" style="position:absolute;bottom:6px;right:6px;width:16px;height:16px;border-radius:50%;border:3px solid var(--surface);"></div>
                </div>

                <div class="profile-info">
                    <h1 style="font-family:'Syne',sans-serif;font-size:24px;margin-bottom:6px;">{{ $empleado['nombre'] }}</h1>
                    <div class="role" style="display:inline-block;padding:6px 12px;border-radius:999px;background:rgba(124,92,252,0.12);border:1px solid rgba(124,92,252,0.25);color:var(--accent);margin-bottom:8px;">{{ $empleado['puesto'] }}</div>
                    @if($empleado['activo'])
                        <div class="badge activo" style="display:inline-flex;align-items:center;padding:6px 10px;border-radius:999px;background:rgba(34,197,94,0.08);border:1px solid rgba(34,197,94,0.2);color:var(--green);">Activo</div>
                    @else
                        <div class="badge vacaciones" style="display:inline-flex;align-items:center;padding:6px 10px;border-radius:999px;background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.2);color:var(--red);">Vacaciones</div>
                    @endif
                </div>
            </div>

            <div class="details-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;margin-bottom:16px;">
                <div class="detail-item card" style="padding:14px;">
                    <div class="detail-label">Email</div>
                    <div class="detail-value"><a href="mailto:{{ $empleado['email'] }}" style="color:var(--accent);text-decoration:none;">{{ $empleado['email'] }}</a></div>
                </div>

                <div class="detail-item card" style="padding:14px;">
                    <div class="detail-label">Teléfono</div>
                    <div class="detail-value">{{ $empleado['telefono'] }}</div>
                </div>

                <div class="detail-item card" style="padding:14px;">
                    <div class="detail-label">Departamento</div>
                    <div class="detail-value">{{ $empleado['departamento'] }}</div>
                </div>

                <div class="detail-item card" style="padding:14px;">
                    <div class="detail-label">ID Empleado</div>
                    <div class="detail-value">#{{ $empleado['id'] }}</div>
                </div>
            </div>

            <div class="action-buttons" style="display:flex;gap:12px;flex-wrap:wrap;">
                <a href="{{ route('empleados.edit', $empleado['id']) }}" class="btn btn-muted" style="flex:1;min-width:150px;">Editar Empleado</a>
                <a href="mailto:{{ $empleado['email'] }}" class="btn btn-primary" style="flex:1;min-width:150px;">Enviar Email</a>
                <form action="{{ route('empleados.destroy', $empleado['id']) }}" method="POST" style="flex:1;min-width:150px;" onsubmit="return confirm('¿Estás seguro de eliminar este empleado?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-muted" style="width:100%;background:linear-gradient(135deg,#ef4444,#fb7185);color:#fff;">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
