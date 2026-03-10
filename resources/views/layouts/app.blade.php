<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Directorio')</title>
    <style>
        :root {
            --bg-main: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            --surface: rgba(255, 255, 255, 0.8);
            --surface-border: rgba(229, 231, 235, 0.6);
            --text-main: #1f2937;
            --text-soft: #6b7280;
            --accent: #2563eb;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: var(--bg-main);
            color: var(--text-main);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            padding: 28px 18px;
        }

        .page-shell {
            width: min(1180px, 100%);
            margin: 0 auto;
        }

        .page-title {
            text-align: center;
            font-size: clamp(1.75rem, 5vw, 2.5rem);
            letter-spacing: 0.02em;
            margin-bottom: 0.6rem;
            color: var(--text-main);
            font-weight: 700;
        }

        .page-subtitle {
            text-align: center;
            color: var(--text-soft);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--surface-border);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .profile-card {
            text-align: center;
            transition: transform 0.22s ease, border-color 0.22s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-card:hover {
            transform: translateY(-6px);
            border-color: rgba(0, 212, 255, 0.7);
        }

        .profile-card h2,
        .profile-card h3 {
            width: 100%;
            margin: 0 0 0.85rem 0;
            font-size: 1.15rem;
            color: var(--text-main);
            font-weight: 700;
        }

        .avatar {
            width: 170px;
            height: 170px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.35);
            margin: 0 auto 1.1rem;
            flex-shrink: 0;
        }

        .profile-card .status {
            margin: 0.6rem 0 1rem 0;
            font-size: 0.95rem;
        }

        .avatar {
            width: 170px;
            height: 170px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #e5e7eb;
            margin: 0 auto 1.1rem;
            flex-shrink: 0;
        }

        .status {
            font-weight: 600;
            margin: 0.6rem 0 1rem 0;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .status.activo {
            color: var(--success);
        }

        .status.inactivo {
            color: var(--danger);
        }

        .inline-data {
            margin-bottom: 0.45rem;
            color: var(--text-soft);
            font-size: 0.9rem;
        }

        .alert {
            margin-bottom: 1.3rem;
            padding: 1rem 1.2rem;
            border-radius: 8px;
            border-left: 4px solid;
            font-size: 0.95rem;
        }

        .alert.success {
            background: #ecfdf5;
            border-color: var(--success);
            color: #065f46;
        }

        .alert.error {
            background: #fef2f2;
            border-color: var(--danger);
            color: #7f1d1d;
        }

        .btn {
            display: inline-block;
            border: 1px solid transparent;
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            color: #fff;
            background: var(--accent);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-success {
            background: var(--success);
            color: #fff;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-neutral {
            background: #d1d5db;
            color: #1f2937;
        }

        .btn-neutral:hover {
            background: #9ca3af;
        }

        .actions {
            display: flex;
            gap: 0.65rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .profile-card .actions {
            gap: 0.8rem;
            margin-top: 1.45rem;
        }

        .profile-card .actions .btn {
            padding: 0.8rem 1.35rem;
            font-size: 0.95rem;
            flex: 1;
            min-width: 130px;
            max-width: 180px;
        }

        .profile-card .actions form {
            display: flex;
            flex: 1;
            min-width: 130px;
            max-width: 180px;
        }

        .profile-card .actions form .btn {
            width: 100%;
            margin: 0;
        }

        .form-card {
            width: min(680px, 100%);
            margin: 0 auto;
        }

        .field {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.9rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0.75rem;
            background: #fff;
            color: var(--text-main);
            font-size: 0.9rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="tel"]::placeholder {
            color: #9ca3af;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-top: 0.3rem;
        }

        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--accent);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .stat-value {
            font-size: clamp(2rem, 6vw, 3.2rem);
            font-weight: 800;
            color: var(--accent);
            margin: 0.5rem 0;
        }

        .centered {
            width: min(760px, 100%);
            margin: 0 auto;
        }

        @media (max-width: 640px) {
            body {
                padding: 20px 12px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <header style="width: 100%; background: var(--surface); border-bottom: 1px solid var(--surface-border); padding: 2rem 0; margin-bottom: 2.5rem;">
        <div class="page-shell">
            <h1 class="page-title" style="margin-bottom: 0.2rem;">Mi Empresa</h1>
            <p class="page-subtitle" style="margin-bottom: 1.2rem;">Gestión de Empleados Simplificada</p>
            <nav style="display: flex; gap: 1rem;">
                <a href="{{ route('directorio.index') }}" class="btn btn-neutral">Directorio</a>
            </nav>
        </div>
    </header>
    <main class="page-shell">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>