<!DOCTYPE html>
<html>
<head>
    <title>Directorio de Empleados</title>
    <style>
        body {
            background: #306c94;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #f2f5f2;
            text-align: center;
        }
        .contenedor {
            max-width: 900px;
            margin: 0 auto;
        }
        .btn-nuevo {
            display: inline-block;
            background: #02162b;
            color: white;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgb(213, 219, 216);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th {
            background: #070233;
            color: rgb(241, 231, 231);
            padding: 12px 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:hover {
            background: #f0f4f8;
        }
        a {
            color: #05182c;
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
        main { max-width: 900px; margin: 20px auto; padding: 0 15px; }
        .alert-success { background: #c6f6d5; color: #22543d;
            padding: 12px 20px; border-radius: 6px; margin: 15px auto;
            max-width: 900px; }
        .alert-error { background: #fed7d7; color: #742a2a;
            padding: 12px 20px; border-radius: 6px; margin: 15px auto;
            max-width: 900px; }
        .tarjeta { background: white; max-width: 500px; margin: 20px auto; padding: 30px;
            border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);}
        p { margin: 8px 0; color: #4a5568; }

        label { display: block; font-weight: bold; margin-top: 12px; }

        input, select { padding: 8px; width: 100%; margin-top: 4px; 
            border: 1px solid #cbd5e0; border-radius: 4px; }
        /* button { background: #2b6cb0; color: white; padding: 10px 24px;
            border: none; border-radius: 4px; cursor: pointer; margin-top: 16px; } */

        .acciones {margin-top: 25px;display: flex;justify-content: center;
            align-items: center;gap: 10px;}

            

        .btn-secundario, .btn-danger {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            line-height: normal;
            vertical-align: middle;
            border: 1px solid transparent;
            box-sizing: border-box;
        }
        
        .btn-base {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            line-height: normal;
            vertical-align: middle;
            border: 1px solid transparent;
            box-sizing: border-box;
            text-align: center;
        }

        .btn-principal {
            background-color: #2b6cb0;
            color: white;
        }
        .btn-principal:hover { background-color: #2c5282; }

        .btn-secundario {
            border-color: #cbd5e0;
            color: #4a5568;
            background-color: white;
        }
        .btn-secundario:hover { background-color: #f7fafc; }

        .btn-danger {
            background: #e53e3e;
            color: white;
            border: none;
        }
        .btn-danger:hover { background: #c53030; }
        
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
    <main>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

    </main>
</body>
</html>
