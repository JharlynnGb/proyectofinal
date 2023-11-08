<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## SISTEMA DE BOLETAS INSTITUCION EDUCATIVA ALFONSO UGARTE

Proyecto de mejora e innovacion Carrera de Ingenieria de Software con IA - SENATI 2023

## RECURSOS NECESARIOS
- Laragon Full (64-bit): Apache 2.4, Nginx, MySQL 8, PHP 8, Redis, Memcached, Node.js 18, npm, git https://laragon.org/download/index.html
  
## Entorno de desarrollo
- Instalacion de laragon en el equipo
  
- Iniciallizar los servicios de laragon
  
- Instalacion de laravel desde la consola de laragon https://laravel.com/docs/4.2#install-laravel
```
composer global require "laravel/installer=~1.1"
```
- Clonar el repositorio de GitHub en la carpeta base www de laragon
- RUTA
```
C:\laragon\www
```
- REPOSITORIO
```
git clone https://github.com/JharlynnGb/proyectofinal.git
```
- Desde la consola de laragon abrir el repositorio clonado
```
cd proyectofinal
```
- limpiar la cache del proyecto C:\laragon\www\AlfonsoUgarte(main -> origin)
```
php artisan cache:clear
```
- remplazar el .env.example por el .env desde la consola 
```
mv .env.example .env
```
- Generar una nueva key para el proyecto en el .env
```
php artisan key:generate
```

  
### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
