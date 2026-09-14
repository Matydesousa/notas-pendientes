# Notas y Pendientes

[![Laravel CI](https://github.com/Matydesousa/notas-pendientes/actions/workflows/laravel.yml/badge.svg)](https://github.com/Matydesousa/notas-pendientes/actions/workflows/laravel.yml)

Aplicación web para organizar notas y tareas pendientes desde un panel administrativo simple. El proyecto reúne dos CRUD independientes y permite clasificar las tareas según estén por cumplir o completadas.

## Funcionalidades

- Crear, consultar, editar y eliminar notas.
- Crear, consultar, editar y eliminar pendientes.
- Marcar una tarea como cumplida o volverla a estado pendiente.
- Filtrar tareas cumplidas y tareas por cumplir.
- Validar los datos de todos los formularios.
- Mostrar una interfaz adaptable basada en AdminLTE.

## Tecnologías

- PHP 8.3
- Laravel 13
- MySQL o SQLite
- AdminLTE 3
- PHPUnit 12

## Instalación local

Requisitos: PHP 8.3 o superior, Composer y las extensiones de PHP requeridas por Laravel.

```bash
git clone https://github.com/Matydesousa/notas-pendientes.git
cd notas-pendientes
composer install
cp .env.example .env
php artisan key:generate
php artisan adminlte:install --only=assets --force
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate
php artisan serve
```

La configuración de ejemplo utiliza SQLite para que el proyecto pueda probarse sin preparar un servidor de base de datos. La aplicación quedará disponible, por defecto, en `http://127.0.0.1:8000`.

## Pruebas

```bash
php artisan test
vendor/bin/pint --test
```

Las pruebas funcionales cubren el CRUD de notas, el CRUD de pendientes, sus validaciones, el cambio de estado y los filtros. GitHub Actions también valida el archivo de dependencias, el formato y las vulnerabilidades conocidas en cada cambio.

## Estructura principal

- `app/Http/Controllers`: flujo de notas y pendientes.
- `app/Http/Requests`: validación de formularios.
- `app/Models`: modelos Eloquent.
- `resources/views/AdminLte`: vistas del panel.
- `database/migrations`: estructura de la base de datos.
- `tests/Feature`: pruebas funcionales de ambos módulos.

## Estado

Proyecto funcional y preparado como aplicación demostrativa de Laravel. No incluye autenticación ni está pensado como sistema multiusuario.

## Licencia

Este proyecto se distribuye bajo la licencia MIT.
