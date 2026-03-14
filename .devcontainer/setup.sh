#!/bin/bash
# ============================================================
# Setup — Sesion 7: Base de datos y Eloquent
# Se ejecuta automaticamente al crear el devcontainer
# ============================================================

# Optimizaciones de rendimiento
export XDEBUG_MODE=off
sudo phpdismod xdebug 2>/dev/null || true

echo ""
echo "Configurando entorno Laravel — Sesion 7..."
echo ""

# 1. Instalar SQLite + OPcache
echo "[1/5] Instalando dependencias..."
sudo apt-get update -qq && sudo apt-get install -y -qq php8.2-sqlite3 > /dev/null 2>&1 || true

echo "opcache.enable=1
opcache.enable_cli=1
opcache.memory_consumption=128
opcache.max_accelerated_files=10000
opcache.validate_timestamps=1
opcache.revalidate_freq=0" | sudo tee /etc/php/8.2/mods-available/opcache-dev.ini > /dev/null 2>&1
sudo phpenmod opcache-dev 2>/dev/null || true

# 2. Verificar composer
if ! command -v composer &> /dev/null; then
    echo "ERROR: composer no esta instalado."
    exit 1
fi

# 3. Instalar o restaurar Laravel
if [ -f "artisan" ]; then
    echo "[2/5] Proyecto Laravel ya existe, reinstalando dependencias..."
    composer install --no-interaction 2>&1
else
    echo "[2/5] Creando proyecto Laravel 12..."

    if ! composer create-project laravel/laravel:^12.0 /tmp/laravel-install --no-interaction 2>&1; then
        echo ""
        echo "ERROR: No se pudo crear el proyecto Laravel."
        echo "  Intenta reconstruir el contenedor con conexion a internet."
        exit 1
    fi

    echo "Moviendo archivos al workspace..."
    cp -rn /tmp/laravel-install/. . 2>/dev/null || true
    cp -r /tmp/laravel-install/. . 2>/dev/null || true
    rm -rf /tmp/laravel-install

    # 4. Configurar SQLite
    echo "[3/5] Configurando base de datos SQLite..."
    touch database/database.sqlite

    sed -i 's/DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env
    sed -i '/^#.*DB_HOST/d' .env
    sed -i '/^#.*DB_PORT/d' .env
    sed -i '/^#.*DB_DATABASE/d' .env
    sed -i '/^#.*DB_USERNAME/d' .env
    sed -i '/^#.*DB_PASSWORD/d' .env
    sed -i '/^DB_HOST=/d' .env
    sed -i '/^DB_PORT=/d' .env
    sed -i '/^DB_DATABASE=/d' .env
    sed -i '/^DB_USERNAME=/d' .env
    sed -i '/^DB_PASSWORD=/d' .env

    WORKSPACE_DIR=$(pwd)
    sed -i "s|DB_CONNECTION=sqlite|DB_CONNECTION=sqlite\nDB_DATABASE=${WORKSPACE_DIR}/database/database.sqlite|" .env
fi

# 5. Copiar archivos del proyecto directorio
echo "[4/5] Instalando proyecto Directorio..."
PROYECTO_DIR="proyecto"

if [ -d "$PROYECTO_DIR" ]; then
    # Controller
    cp "$PROYECTO_DIR/DirectorioController.php" app/Http/Controllers/DirectorioController.php

    # Rutas
    cp "$PROYECTO_DIR/web.php" routes/web.php

    # Vistas
    mkdir -p resources/views/directorio
    cp "$PROYECTO_DIR/views/directorio/index.blade.php" resources/views/directorio/
    cp "$PROYECTO_DIR/views/directorio/show.blade.php" resources/views/directorio/
    cp "$PROYECTO_DIR/views/directorio/create.blade.php" resources/views/directorio/
    cp "$PROYECTO_DIR/views/directorio/edit.blade.php" resources/views/directorio/

    echo "  Controller, rutas y vistas copiados correctamente"
else
    echo "  AVISO: carpeta 'proyecto/' no encontrada — los archivos no se copiaron"
fi

# 6. Migraciones (solo las default de Laravel, NO la de empleados)
echo "[5/5] Ejecutando migraciones base..."
touch database/database.sqlite
php artisan migrate --force 2>&1 || echo "Migraciones fallaron — ejecuta: php artisan migrate"

# 7. Verificacion
echo ""
echo "============================================"
echo "  Entorno Sesion 7 configurado con exito"
echo "============================================"
echo ""
echo "  Laravel: $(php artisan --version 2>/dev/null || echo 'no detectado')"
echo "  PHP:     $(php -v | head -1 | cut -d' ' -f2)"
echo "  SQLite:  configurado"
echo ""
echo "  El directorio ya funciona con datos de ejemplo."
echo "  Hoy lo migraremos a base de datos real."
echo ""
echo "  El servidor se inicia automaticamente."
echo "  Codespace abrira la pagina en una nueva pestana."
echo "  Si no se abre, ve a la pestana PORTS y haz clic en el puerto 8000."
echo ""
