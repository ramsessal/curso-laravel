<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Acceso') - Mi Blog</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Simple CSS (Tailwind is available in the project) -->
    <link rel="stylesheet" href="/resources/css/app.css">
    @stack('styles')
    <style>
        /* Inline fallback for quick styling */
        body.auth-page {
            background: linear-gradient(135deg,#f5f7fb 0%,#e6eef8 100%);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            font-family: 'Source Sans Pro', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
        .auth-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(20,40,80,0.12);
            width: 100%;
            max-width: 420px;
            padding: 28px;
        }
        .auth-brand {
            text-align:center;
            margin-bottom:18px;
        }
        .auth-brand h1 { margin:0; font-size:20px; color:#1f4b8f; }
        .auth-help { text-align:center; margin-top:12px; color: #6b7280; font-size:0.95rem }
    </style>
</head>
<body class="auth-page">
    <div class="auth-card">
        <div class="auth-brand">
            <h1>Mi Blog</h1>
        </div>

        @yield('content')

        <div class="auth-help">
            <small>¿Necesitas una cuenta? <a href="{{ route('register') }}">Regístrate</a></small>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
