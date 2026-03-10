@extends('layouts.app')

@section('title', 'Directorio de Empleados')

@section('content')

    <header class="page-header">
        <h1>Directorio de Empleados</h1>
        <p>Equipo activo y disponibilidad actual</p>
    </header>

    <div class="stats" style="margin-bottom:18px;">
        <div class="card" style="padding:12px 16px;border-radius:12px;min-width:140px;">
            <div style="font-size:13px;color:var(--muted);">Total</div>
            <div style="font-family:'Syne',sans-serif;font-size:18px;font-weight:800;color:var(--text);">{{ $totalEmpleados ?? count($empleados) }}</div>
        </div>

        <div class="card" style="padding:12px 16px;border-radius:12px;min-width:140px;">
            <div style="font-size:13px;color:var(--muted);">Activos</div>
            <div style="font-family:'Syne',sans-serif;font-size:18px;font-weight:800;color:var(--text);">{{ $empleadosActivos ?? collect($empleados)->where('activo', true)->count() }}</div>
        </div>

        <div class="card" style="padding:12px 16px;border-radius:12px;min-width:140px;">
            <div style="font-size:13px;color:var(--muted);">Inactivos</div>
            <div style="font-family:'Syne',sans-serif;font-size:18px;font-weight:800;color:var(--text);">{{ $empleadosInactivos ?? (count($empleados) - (collect($empleados)->where('activo', true)->count())) }}</div>
        </div>
    </div>

    <div class="grid">

        {{-- Paleta de colores: accent, soft (gradient), bg, border, glow --}}
        @php
            $palette = [
                ['#7c5cfc', '#a78bfa', 'rgba(124,92,252,0.12)', 'rgba(124,92,252,0.25)', 'rgba(124,92,252,0.28)'],
                ['#0ea5e9', '#38bdf8', 'rgba(14,165,233,0.12)',  'rgba(14,165,233,0.25)',  'rgba(14,165,233,0.25)'],
                ['#f59e0b', '#fbbf24', 'rgba(245,158,11,0.12)',  'rgba(245,158,11,0.25)',  'rgba(245,158,11,0.22)'],
                ['#10b981', '#34d399', 'rgba(16,185,129,0.12)',  'rgba(16,185,129,0.25)',  'rgba(16,185,129,0.22)'],
                ['#f43f5e', '#fb7185', 'rgba(244,63,94,0.12)',   'rgba(244,63,94,0.25)',   'rgba(244,63,94,0.22)'],
                ['#8b5cf6', '#c084fc', 'rgba(139,92,246,0.12)',  'rgba(139,92,246,0.25)',  'rgba(139,92,246,0.25)'],
            ];
        @endphp

        @forelse ($empleados as $empleado)

            @php
                [$accent, $soft, $bg, $border, $glow] = $palette[$loop->index % count($palette)];
                $delay = round(($loop->index + 1) * 0.07, 2);
            @endphp

            @include('empleados._card', [
                'empleado' => $empleado,
                'accent' => $accent,
                'soft' => $soft,
                'bg' => $bg,
                'border' => $border,
                'glow' => $glow,
                'delay' => $delay,
                'iteration' => $loop->iteration,
            ])

        @empty

            <div class="card" style="grid-column: 1 / -1; text-align:center; padding:28px;">
                <div style="font-size:18px; font-weight:700; margin-bottom:8px;">Sin empleados registrados</div>
                <p style="color:var(--muted)">Todavía no hay empleados en el directorio. Agrega uno para que aparezca aquí.</p>
            </div>

        @endforelse

    </div>

    <a href="{{ route('empleados.create') }}" class="fab" style="background:linear-gradient(135deg,#7c5cfc,#9d7bf7);">+</a>

@endsection

    </div>

    <!-- Botón flotante para agregar nuevo empleado -->
    <a href="{{ route('empleados.create') }}" class="fab" title="Agregar empleado">+</a>

</body>
</html>
