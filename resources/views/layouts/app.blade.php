<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App')</title>

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        /* Shared design for empleado views */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --surface: #13131a;
            --border: rgba(255,255,255,0.07);
            --accent: #7c5cfc;
            --accent-soft: #a78bfa;
            --accent-glow: rgba(124, 92, 252, 0.3);
            --green: #22c55e;
            --red: #ef4444;
            --text: #f0f0f5;
            --muted: #8b8b9e;
        }

        html,body { height: 100%; }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            min-height: 100vh;
            padding: 32px 18px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        .container { max-width: 1200px; margin: 0 auto; position: relative; z-index:1; }

        .site-nav { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:20px; }
        .brand { font-family: 'Syne', sans-serif; font-weight:800; font-size:18px; color:var(--text); text-decoration:none; }
        .nav-actions { display:flex; gap:8px; }
        .nav-actions a { text-decoration:none; padding:10px 14px; border-radius:10px; background:rgba(255,255,255,0.03); color:var(--text); border:1px solid var(--border); font-weight:600; }

        /* Page header */
        .page-header { text-align:center; margin-bottom:28px; }
        .page-header h1 { font-family:'Syne',sans-serif; font-weight:800; font-size:clamp(22px,4vw,36px); color:var(--text); }
        .page-header p { margin-top:6px; color:var(--muted); }

        /* Cards, buttons and general utilities (shared) */
        .card { background:var(--surface); border:1px solid var(--border); border-radius:18px; padding:18px; }
        .btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; border:none; border-radius:12px; padding:10px 14px; cursor:pointer; text-decoration:none; color:#fff; font-weight:700; }
        .btn-primary { background: linear-gradient(135deg,var(--accent),var(--accent-soft)); }
        .btn-muted { background: rgba(255,255,255,0.04); color:var(--text); border:1px solid var(--border); }

        /* Grid and card components used in index and card partial */
        .grid { display:grid; grid-template-columns: repeat(auto-fill, minmax(300px,1fr)); gap:24px; }
        .loop-index { position:absolute; top:12px; right:12px; font-family:'Syne',sans-serif; font-size:11px; font-weight:700; color:var(--accent); background:rgba(255,255,255,0.03); border-radius:999px; padding:4px 8px; }

        /* Form container (create/edit) */
        .form-container { background:var(--surface); border:1px solid var(--border); border-radius:18px; padding:30px; max-width:720px; margin:0 auto; }
        .form-group { margin-bottom:18px; }
        label { display:block; margin-bottom:8px; color:var(--text); font-weight:600; }
        input, select, textarea { width:100%; padding:12px 14px; border-radius:10px; border:1px solid var(--border); background:rgba(255,255,255,0.02); color:var(--text); }

        /* Floating action button */
        .fab { position:fixed; right:28px; bottom:28px; width:60px; height:60px; border-radius:50%; display:grid; place-items:center; color:#fff; font-size:28px; text-decoration:none; box-shadow: 0 10px 30px rgba(0,0,0,0.4); }

        /* small helpers */
        .stats { display:flex; gap:12px; flex-wrap:wrap; justify-content:center; margin-bottom:18px; }

        @keyframes fadeUp { from { opacity:0; transform: translateY(16px); } to { opacity:1; transform:translateY(0);} }

        /* palette variables shared for card accents */
        :root { --c0: #7c5cfc; --g0: rgba(124,92,252,0.28); --c1: #0ea5e9; --g1: rgba(14,165,233,0.25); --c2: #f59e0b; --g2: rgba(245,158,11,0.25); --c3: #10b981; --g3: rgba(16,185,129,0.25); --c4: #f43f5e; --g4: rgba(244,63,94,0.25); --c5: #8b5cf6; --g5: rgba(139,92,246,0.28); }

        @media (max-width:640px) {
            body { padding:18px 12px; }
            .site-nav { flex-direction:column; align-items:flex-start; }
        }
        
        /* Full card/button styles (from original index) - keep here so partials work */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 32px 28px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
            position: relative;
            animation: fadeUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
            transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
        }

        .avatar-wrap { position: relative; margin-bottom: 20px; }
        .avatar-ring { width: 88px; height: 88px; border-radius: 50%; padding: 3px; background: linear-gradient(135deg, var(--card-accent, var(--accent)), var(--card-accent-soft, #a78bfa)); animation: spin-slow 10s linear infinite; }
        .avatar-ring img { width:100%; height:100%; border-radius:50%; object-fit:cover; display:block; border:3px solid var(--surface); }

        .status-dot { position:absolute; bottom:3px; right:3px; width:15px; height:15px; border-radius:50%; border:3px solid var(--surface); }
        .status-dot.activo { background: var(--green); box-shadow:0 0 8px var(--green); }
        .status-dot.vacaciones { background: var(--red); box-shadow:0 0 8px var(--red); }

        .name { font-family:'Syne',sans-serif; font-size:20px; font-weight:800; color:var(--text); letter-spacing:-0.3px; text-align:center; margin-bottom:6px; }
        .role { font-size:12px; font-weight:500; color:var(--card-accent, var(--accent)); padding:4px 12px; border-radius:999px; margin-bottom:20px; border-color: var(--card-accent-border, rgba(124,92,252,0.25)); background-color: var(--card-accent-bg, rgba(124,92,252,0.12)); }

        .divider { width:100%; height:1px; background:var(--border); margin-bottom:16px; }

        .info-list { width:100%; display:flex; flex-direction:column; gap:10px; margin-bottom:18px; }
        .info-row { display:flex; align-items:center; gap:10px; }
        .info-icon { width:32px; height:32px; border-radius:9px; background: rgba(255,255,255,0.04); border:1px solid var(--border); display:grid; place-items:center; flex-shrink:0; }
        .info-icon svg { width:15px; height:15px; stroke:var(--muted); }
        .info-text { font-size:13.5px; color:var(--text); line-height:1.2; }
        .info-text span { display:block; font-size:11px; color:rgba(255,255,255,0.28); font-weight:300; margin-top:1px; }

        .badge { display:inline-flex; align-items:center; gap:6px; padding:5px 12px; border-radius:999px; font-size:11px; font-weight:700; letter-spacing:0.6px; text-transform:uppercase; margin-bottom:18px; }
        .badge.activo { background: rgba(34,197,94,0.1); border:1px solid rgba(34,197,94,0.25); color:var(--green); }
        .badge.vacaciones { background: rgba(239,68,68,0.1); border:1px solid rgba(239,68,68,0.25); color:var(--red); }
        .badge-pulse { width:6px; height:6px; border-radius:50%; background:currentColor; animation:pulse 2s ease infinite; }

        .btn { width:100%; padding:12px; background: linear-gradient(135deg, var(--card-accent, var(--accent)), var(--card-accent-soft, #9d7bf7)); color:#fff; font-family:'Syne',sans-serif; font-size:13.5px; font-weight:700; border:none; border-radius:14px; text-decoration:none; text-align:center; display:block; cursor:pointer; transition: opacity 0.2s, transform 0.15s; letter-spacing:0.2px; }
        .btn:hover { opacity:0.88; transform:translateY(-1px); }

        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1);} 50%{opacity:0.35;transform:scale(0.8);} }
        @keyframes spin-slow { from{transform:rotate(0deg);} to{transform:rotate(360deg);} }
    </style>

    @stack('styles')
</head>
<body>
    <div class="container">
        <nav class="site-nav">
            <a href="/" class="brand">Mi Empresa</a>
            <div class="nav-actions">
                <a href="{{ route('empleados.index') }}" class="btn btn-muted">Directorio</a>
                <a href="{{ route('empleados.create') }}" class="btn btn-primary">Nuevo</a>
            </div>
        </nav>

        @if(session('success'))
            <div class="card" style="margin-bottom:12px; padding:12px; border-left:4px solid var(--green); background: linear-gradient(90deg, rgba(34,197,94,0.04), transparent);">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>