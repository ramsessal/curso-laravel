@extends('layouts.app')

@section('title', 'Saludos')

@section('content')
    <h1 class="page-title">Saludos</h1>
    <section class="panel centered" style="text-align: center;">
        <p class="inline-data" style="font-size: 1.15rem;">
            Hola {{ $nombre }}, hoy es <strong>{{ $fecha }}</strong>.
        </p>

        @isset($edad)
            @if ($edad < 18)
                <p class="status inactivo">Eres menor de edad. No puedes entrar.</p>
            @else
                <p class="status activo">Eres mayor de edad. Adelante.</p>
            @endif
            <p class="inline-data">Tienes {{ $edad }} años.</p>
        @endisset
    </section>
@endsection