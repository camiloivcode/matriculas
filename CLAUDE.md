# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Qué es este proyecto

Aplicación Laravel 10 (PHP ^8.1) para el registro de matrícula de aprendices del SENA (fichas y programas de formación). Hay dos tipos de usuario:

- **Aprendices**: entran sin cuenta. Se identifican con `tipo_documento` + `numero_documento` en `/` (`AprendizController::login`). Si el aprendiz existe y aún no tiene registros en `archivos`, ve el formulario de carga de documentos (`resources/views/inicioUsuario.blade.php`) que envía a `POST /archivo` (`ArchivoController::storeArchivo`).
- **Administrativos**: login en `/administrativos` con los campos `documento` y `password` contra la tabla `users` (`UsuarioController::login`, guard `web` con modelo `App\Models\User`). Las rutas de gestión llevan middleware `auth`.

Los textos, nombres de campos, rutas y tablas están en español. Mantén esa convención.

## Comandos

Entorno local (en la máquina actual no hay `php` ni `composer` instalados, y no existe `vendor/`; hay que instalarlos antes de correr nada):

```bash
composer install
cp .env.example .env && php artisan key:generate
# Configurar DB_* en .env: DB_CONNECTION=mysql, base "inscripciones"
php artisan migrate
php artisan serve
```

Frontend (Vite):

```bash
npm install
npm run dev     # o npm run build
```

Ojo: las vistas actuales no usan `@vite`; cargan Bootstrap, jQuery y DataTables desde `public/` (`public/css`, `public/js`, `public/DataTables`). `resources/js` y `resources/css` existen pero no están conectados a las vistas.

Tests y estilo:

```bash
php artisan test                                  # todos (Unit + Feature)
php artisan test --filter=ExampleTest             # una clase
php artisan test --filter=test_the_application_returns_a_successful_response   # un método
vendor/bin/phpunit tests/Feature/ExampleTest.php  # un archivo
vendor/bin/pint                                   # formateo (Laravel Pint)
```

Los tests son el ejemplo por defecto de Laravel; no hay cobertura real de la lógica de negocio. `phpunit.xml` fuerza `CACHE_DRIVER=array`, `SESSION_DRIVER=array`, `QUEUE_CONNECTION=sync` y `MAIL_MAILER=array`.

## Arquitectura (lo que no se ve de un vistazo)

**Modelo de datos** (migraciones en `database/migrations/`):

- `fichas` (`Ficha`): una ficha por grupo/programa. Campo `ficha` es el número visible; `id` es la PK. Sin timestamps.
- `aprendizs` (`Aprendiz`): pertenece a una ficha (`ficha_id`). `numero_documento` es único (migración `2023_03_11`). Sin timestamps. El campo `estado` existe pero la lógica de "ya envió documentos" se deduce de la existencia de una fila en `archivos`, no de `estado`.
- `archivos` (`Archivo`): una fila por aprendiz con las rutas de sus documentos (`documento_identidad`, `diploma_acta_bachiller`, `certificado_eps`, `icfes`, `compromiso_aprendiz`, `tratamientos_datos`, `documento_acudiente`). Es la marca de "aprendiz ya registrado": `AprendizController::index` y `login` la usan para mostrar estado y bloquear reenvíos.

**Almacenamiento de archivos**: todo va al disco `local` (`storage/app/`) bajo `Archivos/{numero_ficha}/{numero_documento}/`. Esa convención está repetida en `ArchivoController`, `FichaController` (crea la carpeta al crear la ficha; la mueve al editar el número) y `ZipController` (lee de `storage_path('app/Archivos/...')`). Si cambias la estructura de carpetas, cambia los tres a la vez.

**Descargas ZIP** (`ZipController`): generan el ZIP dentro de `public/` (por aprendiz: `{numeroDocumento}.zip`; por ficha: `{ficha}.zip`) y lo devuelven con `response()->download`. Nunca se borran: los archivos se acumulan en `public/`.

**Importación masiva**: `AprendizController::store` usa `App\Imports\AprendicesImport` (maatwebsite/excel 3.1.47). Espera encabezados `tipo_documento`, `numero_documento`, `nombre`, `estado`, `ficha`; resuelve la ficha por su número mediante `Ficha::pluck('id', 'ficha')`, así que una ficha inexistente rompe la fila.

**Rutas**: todo está en `routes/web.php`; `routes/api.php` solo expone `/user` con Sanctum y no se usa. Hay rutas duplicadas (`POST /inicio` aparece dos veces) y mezcla de nombres en español e inglés (`aprendices`, `homeAdmin`, `inicioAdmin`, `indexAprendiz`).

**Frontend**: Blade sin SPA. Las tablas usan DataTables y los modales son Bootstrap; los scripts de página están en `public/js/script.js` y `public/js/formValidate.js`.

## Puntos a tener en cuenta al editar

- Código muerto o incompleto que parece funcional: `ArchivoController::index`, `loadView`, `downloadArchivo` están vacíos; `UsuarioController::desacarga` usa `Storage` sin importarlo y no tiene ruta; `UsuarioController::register` está comentado; `AprendizController::update` y `destroy` no comprueban si el aprendiz existe.
- `FichaController` usa `DB::select` dentro de bucles por ficha para contar aprendices y archivos (N+1). Aceptable con pocas fichas.
- `README.md` es el de Laravel sin cambios; no describe el proyecto.
- `.env.example` apunta a `MAIL_HOST=mailpit` y `DB_DATABASE=inscripciones`; no copies credenciales reales al repo (`.env` está ignorado).
