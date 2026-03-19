<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio Empresarial - Sistema de Gestión</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --surface: #13131a;
            --border: rgba(255,255,255,0.07);
            --accent: #7c5cfc;
            --accent-soft: #a78bfa;
            --accent-glow: rgba(124, 92, 252, 0.3);
            --cyan: #0ea5e9;
            --cyan-glow: rgba(14,165,233,0.25);
            --amber: #f59e0b;
            --amber-glow: rgba(245,158,11,0.25);
            --green: #22c55e;
            --text: #f0f0f5;
            --muted: #8b8b9e;
        }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* Animated gradient orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            animation: float 20s ease-in-out infinite;
            z-index: 0;
        }

        .orb-1 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--accent), transparent);
            top: -200px;
            left: -200px;
            animation-duration: 25s;
        }

        .orb-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--cyan), transparent);
            bottom: -150px;
            right: -150px;
            animation-duration: 30s;
            animation-delay: -5s;
        }

        .orb-3 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, var(--amber), transparent);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-duration: 35s;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(50px, -50px) scale(1.1); }
            66% { transform: translate(-50px, 50px) scale(0.9); }
        }

        /* Hero section */
        .hero {
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 80px 24px;
            min-height: 100vh;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(124, 92, 252, 0.1);
            border: 1px solid rgba(124, 92, 252, 0.3);
            border-radius: 24px;
            font-size: 13px;
            font-weight: 600;
            color: var(--accent-soft);
            letter-spacing: 0.5px;
            margin-bottom: 24px;
            animation: fadeSlideDown 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .hero-badge .pulse {
            width: 8px;
            height: 8px;
            background: var(--accent-soft);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.3); }
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(48px, 8vw, 96px);
            font-weight: 800;
            line-height: 1.1;
            color: var(--text);
            letter-spacing: -2px;
            margin-bottom: 24px;
            animation: fadeSlideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.2s both;
        }

        h1 .gradient-text {
            background: linear-gradient(135deg, var(--accent), var(--cyan), var(--accent-soft));
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient-shift 8s ease infinite, fadeSlideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.2s both;
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .hero-subtitle {
            font-size: clamp(18px, 3vw, 22px);
            color: var(--muted);
            max-width: 600px;
            margin: 0 auto 48px;
            line-height: 1.6;
            animation: fadeSlideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.4s both;
        }

        .cta-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeSlideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.6s both;
        }

        .btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            font-family: 'Syne', sans-serif;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 16px;
            border: none;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: inherit;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-soft));
            color: white;
            box-shadow: 0 8px 24px var(--accent-glow);
        }

        .btn-primary:hover {
            box-shadow: 0 12px 32px var(--accent-glow);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            color: var(--text);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* Features grid */
        .features {
            position: relative;
            z-index: 1;
            padding: 80px 24px;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        .features-header {
            text-align: center;
            margin-bottom: 64px;
        }

        .features-header h2 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 800;
            color: var(--text);
            letter-spacing: -1px;
            margin-bottom: 16px;
        }

        .features-header p {
            font-size: 18px;
            color: var(--muted);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .feature-card {
            position: relative;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 40px 32px;
            transition: border-color 0.3s, transform 0.2s;
            animation: fadeUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        .feature-card:nth-child(1) { animation-delay: 0.1s; }
        .feature-card:nth-child(2) { animation-delay: 0.2s; }
        .feature-card:nth-child(3) { animation-delay: 0.3s; }

        .feature-card:hover {
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-4px);
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 24px;
        }

        .feature-card:nth-child(1) .feature-icon {
            background: linear-gradient(135deg, rgba(124, 92, 252, 0.15), rgba(124, 92, 252, 0.05));
        }

        .feature-card:nth-child(2) .feature-icon {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.15), rgba(14, 165, 233, 0.05));
        }

        .feature-card:nth-child(3) .feature-icon {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(245, 158, 11, 0.05));
        }

        .feature-card h3 {
            font-family: 'Syne', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 12px;
        }

        .feature-card p {
            font-size: 15px;
            color: var(--muted);
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            position: relative;
            z-index: 1;
            padding: 32px 24px;
            text-align: center;
            border-top: 1px solid var(--border);
        }

        .footer p {
            font-size: 14px;
            color: var(--muted);
        }

        .footer a {
            color: var(--accent-soft);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer a:hover {
            color: var(--accent);
        }

        /* Animations */
        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cta-group {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Animated orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Hero section -->
    <section class="hero">
        <div class="hero-badge">
            <span class="pulse"></span>
            Sistema en Línea
        </div>

        <h1>
            <span class="gradient-text">Directorio</span><br>
            Empresarial
        </h1>

        <p class="hero-subtitle">
            Gestiona tu equipo de forma moderna y eficiente. Sistema completo de administración de empleados con interfaz intuitiva y potente.
        </p>

        <div class="cta-group">
            <a href="{{ route('empleados.index') }}" class="btn btn-primary">
                Ver Directorio
            </a>
            <a href="{{ route('empleados.create') }}" class="btn btn-secondary">
                Nuevo Empleado
            </a>
        </div>
    </section>

    <!-- Features section -->
    <section class="features">
        <div class="features-header">
            <h2>Gestión Completa</h2>
            <p>Todo lo que necesitas para administrar tu equipo</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">●</div>
                <h3>Perfiles Completos</h3>
                <p>Visualiza y gestiona toda la información de tus empleados con perfiles detallados y actualizables.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">●</div>
                <h3>Operaciones Rápidas</h3>
                <p>Crea, edita y elimina registros de forma instantánea con una interfaz fluida y responsive.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">●</div>
                <h3>Estadísticas en Tiempo Real</h3>
                <p>Monitorea el estado de tu equipo con métricas actualizadas y visualizaciones intuitivas.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>
            Sistema de Gestión de Empleados • 
            Desarrollado con <a href="https://laravel.com" target="_blank">Laravel</a>
        </p>
    </footer>
</body>
</html>