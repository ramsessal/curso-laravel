@extends('layouts.app')

@section('title', 'Estadísticas de Empleados')

@section('content')
    <h1 class="page-title">Estadísticas de Empleados</h1>
    <p class="page-subtitle">Resumen general del estado del directorio.</p>

    <section class="stats-grid">
        <article class="panel profile-card">
            <h2>Total de Empleados</h2>
            <p class="stat-value">{{ $totalEmpleados }}</p>
        </article>

        <article class="panel profile-card">
            <h2>Empleados Activos</h2>
            <p class="stat-value" style="color: var(--success);">{{ $empleadosActivos }}</p>
        </article>

        <article class="panel profile-card">
            <h2>Empleados Inactivos</h2>
            <p class="stat-value" style="color: var(--danger);">{{ $totalEmpleados - $empleadosActivos }}</p>
        </article>
    </section>
@endsection
