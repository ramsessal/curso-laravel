<!DOCTYPE html>
<html>
<head>
    <title>Directorio de Empleados</title>
    <style>
        body {
            background: #f7fafc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #1a365d;
            text-align: center;
        }
        .contenedor {
            max-width: 900px;
            margin: 0 auto;
        }
        .btn-nuevo {
            display: inline-block;
            background: #2b6cb0;
            color: white;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th {
            background: #1a365d;
            color: white;
            padding: 12px 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:hover {
            background: #f1f0f8;
        }
        a {
            color: #2b6cb0;
            text-decoration: none;
            margin-right: 8px;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: 600;
        }
        .badge-activo { background: #c6f6d5; color: #22543d; }
        .badge-vacaciones { background: #fed7d7; color: #742a2a; }
        .badge-licencia { background: #fefcbf; color: #744210; }

        nav { background: #1a365d; color: white; padding: 12px 24px;
              display: flex; justify-content: space-between;
              align-items: center; }
        nav a { color: white; text-decoration: none; margin-left: 15px; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
      <nav>
        <strong>Directorio de Empleados</strong>
        <div>
            <a href="/directorio">Listado</a>
            <a href="/directorio/create">Nuevo</a>
        </div>
    </nav>
    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif
    @yield('content')
    
</body>
</html>
