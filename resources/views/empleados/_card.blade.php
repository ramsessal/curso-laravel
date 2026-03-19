@php
    // partial: tarjeta del empleado (usado por @include desde index.blade.php)
    $accent = $accent ?? '#7c5cfc';
    $soft = $soft ?? '#a78bfa';
    $bg = $bg ?? 'rgba(124,92,252,0.12)';
    $border = $border ?? 'rgba(124,92,252,0.25)';
    $glow = $glow ?? 'rgba(124,92,252,0.28)';
    $delay = $delay ?? 0;
    $iteration = $iteration ?? 1;
@endphp

<div class="card" style="
    --card-accent: {{ $accent }};
    --card-accent-soft: {{ $soft }};
    --card-accent-bg: {{ $bg }};
    --card-accent-border: {{ $border }};
    --card-glow: {{ $glow }};
    animation-delay: {{ $delay }}s;
">

    <span class="loop-index">#{{ $iteration }}</span>

    <div class="avatar-wrap">
        <div class="avatar-ring">
            <img src="{{ $empleado['img'] }}" alt="Foto de {{ $empleado['nombre'] }}">
        </div>
        <div class="status-dot {{ $empleado['activo'] ? 'activo' : 'vacaciones' }}"></div>
    </div>

    <h2 class="name">{{ $empleado['nombre'] }}</h2>
    <div class="role">{{ $empleado['puesto'] }}</div>

    <div class="divider"></div>

    <div class="info-list">
        <div class="info-row">
            <div class="info-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                </svg>
            </div>
            <div class="info-text">
                {{ $empleado['telefono'] }}
                <span>Teléfono</span>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5h18M3 12h12M3 16.5h18" />
                </svg>
            </div>
            <div class="info-text">
                {{ $empleado['departamento'] }}
                <span>Departamento</span>
            </div>
        </div>
    </div>

    @if($empleado['activo'])
        <div class="badge activo">
            <span class="badge-pulse"></span>
            Activo
        </div>
    @else
        <div class="badge vacaciones">
            <span class="badge-pulse"></span>
            Vacaciones
        </div>
    @endif

    <div style="width: 100%; display: flex; flex-direction: column; gap: 8px;">
        <a href="{{ route('empleados.show', $empleado['id']) }}" class="btn" style="background: linear-gradient(135deg, #0ea5e9, #38bdf8);">Ver Detalles</a>
        <div style="display: flex; gap: 8px;">
            <a href="{{ route('empleados.edit', $empleado['id']) }}" class="btn" style="background: linear-gradient(135deg, #f59e0b, #fbbf24); flex: 1;">Editar</a>
            <form action="{{ route('empleados.destroy', $empleado['id']) }}" method="POST" style="flex: 1;" onsubmit="return confirm('¿Estás seguro de eliminar este empleado?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="width: 100%; background: linear-gradient(135deg, #ef4444, #fb7185);">Eliminar</button>
            </form>
        </div>
    </div>

</div>
