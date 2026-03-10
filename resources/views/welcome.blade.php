@extends('layouts.app')

@section('title', 'Mis Waifus')

@section('styles')
    <style>
        .waifu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .waifu-card {
            padding: 1rem;
            text-align: center;
        }

        .waifu-card img {
            width: 100%;
            border-radius: 12px;
            margin: 0.8rem 0;
            aspect-ratio: 4 / 5;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <h1 class="page-title">Waifus</h1>
    <p class="page-subtitle">Galería principal.</p>

    <section class="waifu-grid">
        <article class="panel waifu-card">
            <h3>Waifu #1</h3>
            <img src="https://i.pinimg.com/736x/7a/86/1d/7a861d696bf58033449b108173dc2958.jpg" alt="Waifu #1">
            <p>Tu favorita</p>
        </article>
        <article class="panel waifu-card">
            <h3>Waifu #2</h3>
            <img src="https://i.pinimg.com/736x/24/e2/06/24e20628973be5b85da5ff9c9542064e.jpg" alt="Waifu #2">
            <p>La legendaria</p>
        </article>
        <article class="panel waifu-card">
            <h3>Waifu #3</h3>
            <img src="https://i.pinimg.com/736x/08/4a/91/084a918b29d5bc06ead39f4a9f98e64d.jpg" alt="Waifu #3">
            <p>La increible</p>
        </article>
        <article class="panel waifu-card">
            <h3>Waifu #4</h3>
            <img src="https://i.pinimg.com/736x/16/03/6c/16036c48b87cbcd236ac169d82b7d469.jpg" alt="Waifu #4">
            <p>La chida</p>
        </article>
    </section>
@endsection