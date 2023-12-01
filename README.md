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
- limpiar la cache del proyecto C:\laragon\www\proyectofinal(main -> origin)
```
php artisan cache:clear
```
- Instalar paquetes composer autoload
```
composer install
```
- remplazar el .env.example por el .env desde la consola 
```
mv .env.example .env
```
- 
- Generar una nueva key para el proyecto en el .env
```
php artisan key:generate
```
Luego de eso remplazar cierto contenido del .env generado, por los siguientes
```
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyectofinal
DB_USERNAME=root
DB_PASSWORD=

DIALOGFLOW_PROJECT_ID=alfonso-ugarte-tvqm
DIALOGFLOW_KEY_FILE=alfonso-ugarte-tvqm-7bc1f05c738e.json
```
  
### BASE DE DATOS
- En el panel de laragon iniciar el servicio de base de datos
- iniciar una sesion con el host/IP
```
127.0.0.1
```
- Crear la base de datos y todos sus tablas (usar el script)
```
CREATE DATABASE proyectofinal
USE proyectofinal

--crear la tabla usuarios
CREATE TABLE `usuarios` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) COLLATE 'utf8mb4_0900_ai_ci',
    `correo` VARCHAR(100) COLLATE 'utf8mb4_0900_ai_ci',
    `password` VARCHAR(100) COLLATE 'utf8mb4_0900_ai_ci',
    `rol` ENUM('Estudiante','Docente','Admin') COLLATE 'utf8mb4_0900_ai_ci',
    `remember_token` VARCHAR(225) COLLATE 'utf8mb4_0900_ai_ci',
    `estado` INT(10) DEFAULT '1',
    `created_at` TIMESTAMP,
    `updated_at` TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--crear la tabla grados
CREATE TABLE `grados` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(50) COLLATE 'utf8mb4_0900_ai_ci',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--crear la tabla secciones
CREATE TABLE `secciones` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(10) COLLATE 'utf8mb4_0900_ai_ci',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--crear la tabla bloques
CREATE TABLE `bloques` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(50) COLLATE 'utf8mb4_0900_ai_ci',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--crear la tabla bimestres
CREATE TABLE `bimestres` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(50) COLLATE 'utf8mb4_0900_ai_ci',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--crear la tabla estudiantes
CREATE TABLE `estudiantes` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `User_id` INT(10) NULL,
    `dni` VARCHAR(20),
    `Nombres` VARCHAR(200) COLLATE 'utf8mb4_0900_ai_ci',
    `Apellidos` VARCHAR(200) COLLATE 'utf8mb4_0900_ai_ci',
    `Correo` VARCHAR(200) COLLATE 'utf8mb4_0900_ai_ci',
    `Telefono` VARCHAR(20),
    `Direccion` VARCHAR(200) COLLATE 'utf8mb4_0900_ai_ci',
    `Bloque` INT(10) NULL,
    `Grado` INT(10) NULL,
    `Seccion` INT(10) NULL,
    `FechaNacimiento` DATE NOT NULL,
    `created_at` TIMESTAMP,
    `updated_at` TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_estudiantes_grados` FOREIGN KEY (`Grado`) REFERENCES `grados` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
    CONSTRAINT `FK_estudiantes_secciones` FOREIGN KEY (`Seccion`) REFERENCES `secciones` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
    CONSTRAINT `FK_estudiantes_usuarios` FOREIGN KEY (`User_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT `FK_estudiante_bloque` FOREIGN KEY (`Bloque`) REFERENCES `bloques` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--crear la tabla profesores
CREATE TABLE `profesores` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `User_id` INT(10) NULL,
    `dni` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `Nombres` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `Apellidos` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `Correo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `Telefono` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `Direccion` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `FechaNacimiento` DATE NOT NULL,
    `Bloque` INT(10) NULL,
    `created_at` TIMESTAMP,
    `updated_at` TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_bloque_profesor` FOREIGN KEY (`Bloque`) REFERENCES `bloques` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
    CONSTRAINT `FK_usuario_profesor` FOREIGN KEY (`User_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--crear la tabla boletas
CREATE TABLE `boletas` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `idEstudiante` INT(10) NOT NULL,
    `idProfesor` INT(10) NOT NULL,
    `idBimestre` INT(10) NOT NULL,
    `Boleta` TEXT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `created_at` TIMESTAMP,
    `updated_at` TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_notas_estudiantes` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
    CONSTRAINT `FK-profesor_nota` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
    CONSTRAINT `FK_notas_bimestre` FOREIGN KEY (`idBimestre`) REFERENCES `bimestres` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--insertamos registros predeterminados

--tabla bloques
INSERT INTO `bloques` (`id`, `descripcion`) VALUES (1, 'primaria');
INSERT INTO `bloques` (`id`, `descripcion`) VALUES (2, 'secundaria');


--tabla grados 
INSERT INTO `grados` (`id`, `descripcion`) VALUES (1, 'primero');
INSERT INTO `grados` (`id`, `descripcion`) VALUES (2, 'segundo');
INSERT INTO `grados` (`id`, `descripcion`) VALUES (3, 'tercero');
INSERT INTO `grados` (`id`, `descripcion`) VALUES (4, 'cuarto');
INSERT INTO `grados` (`id`, `descripcion`) VALUES (5, 'quinto');
INSERT INTO `grados` (`id`, `descripcion`) VALUES (6, 'sexto');

--tabla secciones 
INSERT INTO `secciones` (`id`, `descripcion`) VALUES (1, 'A');
INSERT INTO `secciones` (`id`, `descripcion`) VALUES (2, 'B');
INSERT INTO `secciones` (`id`, `descripcion`) VALUES (3, 'C');
INSERT INTO `secciones` (`id`, `descripcion`) VALUES (4, 'D');

--tabla bimestres
INSERT INTO `bimestres` (`id`, `descripcion`) VALUES (4, '4 bimestre');
INSERT INTO `bimestres` (`id`, `descripcion`) VALUES (3, '3 bimestre');
INSERT INTO `bimestres` (`id`, `descripcion`) VALUES (2, '2 bimestre');
INSERT INTO `bimestres` (`id`, `descripcion`) VALUES (1, '1 bimestre');

--para esta opotunidad de prueba se creara un usuario ADMIN para gestionar el resto
--PASSWORD administrador (bcrypt) convertir https://www.browserling.com/tools/bcrypt

INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (3, 'administrador', 'admin@gmail.com', '{password encriptado}', 'Admin', NULL, 1, '2023-10-19 16:12:48', '2023-11-05 07:28:43');

--las tablas estudiante y docente se trabajan desde el sistema
```
## DATOS DE PRUEBA
```
-- TABLA ESTUDIANTES
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (63, 89, '12345678A', 'Juan Carlos', 'Perez Gomez', 'juan.perez@example.com', '912345678', 'Calle 123, Ciudad A', 1, 1, 1, '2005-07-15', '2023-12-01 00:54:07', '2023-12-01 00:54:07');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (64, 90, '23456789B', 'Maria Fernanda', 'Rodriguez Herrera', 'maria.fernanda@example.com', '923456789', 'Avenida XYZ, Pueblo B', 1, 1, 1, '2006-04-02', '2023-12-01 00:56:11', '2023-12-01 00:56:11');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (65, 91, '34567890C', 'Pedro Alejandro', 'Martinez Lopez', 'pedro.alejandro@example.com', '934567890', 'Pasaje ABC, Villa C', 1, 1, 1, '2007-11-19', '2023-12-01 00:58:05', '2023-12-01 00:58:05');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (66, 92, '45678901D', 'Laura Victoria', 'Garcia Fernandez', 'laura.victoria@example.com', '945678901', 'Carrera 789, Pueblo D', 1, 1, 1, '2008-08-03', '2023-12-01 00:59:28', '2023-12-01 00:59:28');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (67, 93, '56789012E', 'Luis Enrique', 'Hernandez Ramirez', 'luis.enrique@example.com', '956789012', 'Plaza 456, Ciudad E', 1, 2, 2, '2009-02-28', '2023-12-01 01:00:43', '2023-12-01 01:00:43');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (69, 95, '67890123F', 'Ana Sofia', 'Sanchez Torres', 'ana.sofia@example.com', '967890123', 'Calle 789, Pueblo F', 1, 2, 2, '2010-06-14', '2023-12-01 01:02:52', '2023-12-01 01:02:52');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (70, 96, '78901234G', 'Ricardo Antonio', 'Lopez Diaz', 'ricardo.antonio@example.com', '978901234', 'Avenida 123, Ciudad G', 1, 2, 2, '2011-09-07', '2023-12-01 01:05:28', '2023-12-01 01:05:28');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (71, 97, '89012345H', 'Gabriela Isabel', 'Gonzalez Vargas', 'gabriela.isabel@example.com', '989012345', 'Pasaje LMN, Villa H', 1, 2, 2, '2012-11-22', '2023-12-01 01:07:36', '2023-12-01 01:07:36');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (72, 98, '90123456I', 'Javier Eduardo', 'Castro Alvarez', 'javier.eduardo@example.com', '990123456', 'Carrera 567, Pueblo I', 1, 3, 3, '2013-10-09', '2023-12-01 01:08:58', '2023-12-01 01:08:58');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (73, 99, '01234567J', 'Carolina Alejandra', 'Torres Pardo', 'carolina.alejandra@example.com', '901234567', 'Plaza 789, Ciudad J', 1, 3, 3, '2014-07-18', '2023-12-01 01:10:39', '2023-12-01 01:10:39');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (74, 100, '12345678K', 'Daniel Alberto', 'Ramirez Soto', 'daniel.alberto@example.com', '911345678', 'Calle 456, Pueblo K', 1, 3, 3, '2015-03-05', '2023-12-01 01:11:58', '2023-12-01 01:11:58');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (75, 101, '23456789L', 'Valeria Camila', 'Flores Guzman', 'valeria.camila@example.com', '922456789', 'Avenida UVW, Ciudad L', 1, 3, 3, '2016-09-29', '2023-12-01 01:13:01', '2023-12-01 01:13:01');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (76, 102, '34567890M', 'Oscar Arturo', 'Ruiz Moreno', 'oscar.arturo@example.com', '933567890', 'Pasaje DEF, Villa M', 1, 4, 4, '2017-04-12', '2023-12-01 01:14:15', '2023-12-01 01:14:15');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (77, 103, '45678901N', 'Natalia Andrea', 'Castro Rios', 'natalia.andrea@example.com', '944678901', 'Carrera 234, Pueblo N', 1, 4, 4, '2018-11-06', '2023-12-01 01:15:27', '2023-12-01 01:15:27');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (78, 104, '56789012O', 'Martin Ignacio', 'Chavez Nunez', 'martin.ignacio@example.com', '955789012', 'Plaza 567, Ciudad O', 1, 4, 4, '2019-05-20', '2023-12-01 01:16:24', '2023-12-01 01:16:24');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (79, 105, '67890123P', 'Paula Eugenia', 'Molina Castillo', 'paula.eugenia@example.com', '966890123', 'Calle 890, Pueblo P', 1, 4, 4, '2020-12-03', '2023-12-01 01:17:43', '2023-12-01 01:17:43');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (80, 106, '78901234Q', 'Alejandro David', 'Vargas Medina', 'alejandro.david@example.com', '977901234', 'Avenida GHI, Ciudad Q', 1, 5, 1, '2021-08-25', '2023-12-01 01:19:09', '2023-12-01 01:19:09');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (81, 107, '89012345R', 'Sofia Valentina', 'Guerrero Reyes', 'sofia.valentina@example.com', '988012345', 'Pasaje JKL, Villa R', 1, 5, 1, '2012-02-11', '2023-12-01 01:20:55', '2023-12-01 01:20:55');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (82, 108, '90123456S', 'Fernando Javier', 'Ramos Jimenez', 'fernando.javier@example.com', '999123456', 'Carrera 345, Pueblo S', 1, 5, 1, '2023-10-08', '2023-12-01 01:22:11', '2023-12-01 01:22:11');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (83, 109, '01234567T', 'Camila Isabella', 'Mendoza Ortega', 'camila.isabella@example.com', '900234567', 'Plaza 678, Ciudad T', 1, 5, 1, '2024-04-16', '2023-12-01 01:23:12', '2023-12-01 01:23:12');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (84, 110, '12345678U', 'Jose Miguel', 'Medina Silva', 'jose.miguel@example.com', '910345678', 'Calle MNO, Pueblo U', 1, 6, 2, '2025-11-30', '2023-12-01 01:25:04', '2023-12-01 01:25:04');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (85, 111, '23456789V', 'Daniela Michelle', 'Morales Rojas', 'daniela.michelle@example.com', '921456789', 'Avenida 345, Ciudad V', 1, 6, 2, '2006-07-19', '2023-12-01 01:25:57', '2023-12-01 01:25:57');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (86, 112, '34567890W', 'Victor Manuel', 'Castillo Miranda', 'victor.manuel@example.com', '932567890', 'Pasaje STU, Villa W', 1, 6, 2, '2007-04-23', '2023-12-01 01:27:01', '2023-12-01 01:27:01');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (87, 113, '45678901X', 'Adriana Marcela', 'Jimenez Guerrero', 'adriana.marcela@example.com', '943678901', 'Carrera 456, Pueblo X', 1, 6, 2, '2008-11-09', '2023-12-01 01:28:22', '2023-12-01 01:28:22');
INSERT INTO `estudiantes` (`id`, `User_id`, `dni`, `Nombres`, `Apellidos`, `Correo`, `Telefono`, `Direccion`, `Bloque`, `Grado`, `Seccion`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES (88, 114, '56789012Y', 'Carlos Eduardo', 'Nunez Molina', 'carlos.eduardo@example.com', '954789012', 'Plaza 789, Ciudad Y', 1, 6, 2, '2009-08-18', '2023-12-01 01:29:26', '2023-12-01 01:29:26');
```
-- TABLA USUARIOS

INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (89, 'Juan', 'juan.perez@example.com', '$2y$10$mqtiRKYikdgihT4NntXNhO4umtPZplPMX07ImBn3LaH43vMlGRiJS', 'Estudiante', NULL, 1, '2023-12-01 00:54:07', '2023-12-01 00:54:07');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (90, 'Maria', 'maria.fernanda@example.com', '$2y$10$TTFAXFf3UZvWHhIJM50s8u/B6xL41ns409DV6I9tT4LHDUY2V6n4u', 'Estudiante', NULL, 1, '2023-12-01 00:56:11', '2023-12-01 00:56:11');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (91, 'Pedro', 'pedro.alejandro@example.com', '$2y$10$9Vsb05wcuMgjbNX.iBqUzeqI6jvqJidee9u8AS/00nDM1Nssq3R6S', 'Estudiante', NULL, 1, '2023-12-01 00:58:05', '2023-12-01 00:58:05');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (92, 'Laura', 'laura.victoria@example.com', '$2y$10$5dzmGtJ5joG31TG4MY5pLev2vBliMgcS05u5MahpDJnhvHkTtyJm.', 'Estudiante', NULL, 1, '2023-12-01 00:59:28', '2023-12-01 00:59:28');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (93, 'Luis', 'luis.enrique@example.com', '$2y$10$kcmNiB/hwA70bz45MUoCNuPoIwvPHB/8Mmi8rePBBnulaHhGyI7OC', 'Estudiante', NULL, 1, '2023-12-01 01:00:43', '2023-12-01 01:00:43');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (95, 'Ana', 'ana.sofia@example.com', '$2y$10$C4Wn8Yp2h3sQtouuXKd6kuaGQz6muWbMc1Wl1tFeV53aiUINBBMI.', 'Estudiante', NULL, 1, '2023-12-01 01:02:52', '2023-12-01 01:02:52');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (96, 'Ricardo', 'ricardo.antonio@example.com', '$2y$10$lTXocTBXIRk1JZDTxZMC6.i1YJqQBMa0QzRegiFN7/9bBWu3TrDPq', 'Estudiante', NULL, 1, '2023-12-01 01:05:28', '2023-12-01 01:05:28');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (97, 'Gabriela', 'gabriela.isabel@example.com', '$2y$10$BqcOLZhN.P5UNWwkLqQp2uZFI2H/B6ip/h8xZsezq8rCI2dMG5Bh.', 'Estudiante', NULL, 1, '2023-12-01 01:07:36', '2023-12-01 01:07:36');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (98, 'Javier', 'javier.eduardo@example.com', '$2y$10$f02OzyT0EfcH734rtLvILOs2nAHlhmPki7xsgR2NUZcZHFR.iQ2Gu', 'Estudiante', NULL, 1, '2023-12-01 01:08:58', '2023-12-01 01:08:58');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (99, 'Carolina', 'carolina.alejandra@example.com', '$2y$10$SnmLUSOGE83ZZWah5ElPPOCPtqu5EoWMERAy1ZCa0pzrkw.cWU186', 'Estudiante', NULL, 1, '2023-12-01 01:10:39', '2023-12-01 01:10:39');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (100, 'Daniel', 'daniel.alberto@example.com', '$2y$10$LZ6OUgsj05chDCJ266r.deC1/U2RwwCuUVHMXI6U980yx1KSr.VIa', 'Estudiante', NULL, 1, '2023-12-01 01:11:58', '2023-12-01 01:11:58');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (101, 'Valeria', 'valeria.camila@example.com', '$2y$10$35csNqQyb66wtNfZTRHYN.x8yipzbpKkFK/zGU6G3ov/9CJl/3utG', 'Estudiante', NULL, 1, '2023-12-01 01:13:00', '2023-12-01 01:13:00');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (102, 'Oscar', 'oscar.arturo@example.com', '$2y$10$f3huo7vYpCvDefR/tjb9Ru0bkk565MH7Vny9mjdyabmm0kTRFovc2', 'Estudiante', NULL, 1, '2023-12-01 01:14:15', '2023-12-01 01:14:15');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (103, 'Natalia', 'natalia.andrea@example.com', '$2y$10$8WBxAcjRwpqBQfQSvei5kehQuRG7I3Nl5omyTg0yrtSHoj/uFEA9S', 'Estudiante', NULL, 1, '2023-12-01 01:15:27', '2023-12-01 01:15:27');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (104, 'Martin', 'martin.ignacio@example.com', '$2y$10$xOqtRp2JPlKoeoY/m/leTefqrwM6sfWQNMTRW5nm6UIzMWGpfMvQW', 'Estudiante', NULL, 1, '2023-12-01 01:16:24', '2023-12-01 01:16:24');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (105, 'Paula', 'paula.eugenia@example.com', '$2y$10$ThoLPzWhZKo2hGHIbDX.KedD9za9n8ZUMvghzsxIW1b0TUoNlcK1K', 'Estudiante', NULL, 1, '2023-12-01 01:17:43', '2023-12-01 01:17:43');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (106, 'Alejandro', 'alejandro.david@example.com', '$2y$10$KVODikAY9OIaXD5QI578XuCucyTERDsB9c2vvt0PjMSfuNZRmZ8hu', 'Estudiante', NULL, 1, '2023-12-01 01:19:09', '2023-12-01 01:19:09');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (107, 'Sofia', 'sofia.valentina@example.com', '$2y$10$T/wdaPJSwjGJ5s/cp1wac.QvPuIwt5MgYM/unKvV0wf4FnuUHn5bu', 'Estudiante', NULL, 1, '2023-12-01 01:20:55', '2023-12-01 01:20:55');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (108, 'Fernando', 'fernando.javier@example.com', '$2y$10$lfFc5OW8nKXMupRlmG92xOkX0RPcygPDhuZOaBSsRCweRK4COmHFi', 'Estudiante', NULL, 1, '2023-12-01 01:22:11', '2023-12-01 01:22:11');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (109, 'Camila', 'camila.isabella@example.com', '$2y$10$Vp1P.PwlpLVldDkXDm1B7udDrvg87EEohe69w1hosyfMGcrJJBPlO', 'Estudiante', NULL, 1, '2023-12-01 01:23:12', '2023-12-01 01:23:12');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (110, 'Jose', 'jose.miguel@example.com', '$2y$10$JmTKb1KD6nBbi8llbH9KT.HdBoiSW.xSVMl2lCOUs0fP1QjMuQboy', 'Estudiante', NULL, 1, '2023-12-01 01:25:04', '2023-12-01 01:25:04');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (111, 'Daniela', 'daniela.michelle@example.com', '$2y$10$B7lKRdSqbl2b/mBEYaBqVurciApPAtHRHFCsCK7CfSY5KSy50UgfS', 'Estudiante', NULL, 1, '2023-12-01 01:25:57', '2023-12-01 01:25:57');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (112, 'Victor', 'victor.manuel@example.com', '$2y$10$A6bFjjpCe82MGxfunWLpQekK9m1KsXjw3gdAiyxc1lpEiaoXhHb92', 'Estudiante', NULL, 1, '2023-12-01 01:27:01', '2023-12-01 01:27:01');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (113, 'Adriana', 'adriana.marcela@example.com', '$2y$10$cHcDvQzjWgXYMPLPrdTLz.a/dEpogTYeUDjRpxSszjqd7ETnyBR/u', 'Estudiante', NULL, 1, '2023-12-01 01:28:22', '2023-12-01 01:28:22');
INSERT INTO `usuarios` (`id`, `username`, `correo`, `password`, `rol`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES (114, 'Carlos', 'carlos.eduardo@example.com', '$2y$10$vhoqlBtgZILYqDi3fb3WP.XP5gmIhRqV3WROCIXKHNeO9Qu9N3l.G', 'Estudiante', NULL, 1, '2023-12-01 01:29:26', '2023-12-01 01:29:26');

## EJECUCION 
Si los pasos anteriores se completaron sin problemas correr el programa
```
php artisan serv
```
Esta seria la respuesta de la consola si todo esta okey 
```
C:\laragon\www\proyectofinal(main -> origin)
λ php artisan serv

   INFO  Server running on [http://127.0.0.1:8000].

  Press Ctrl+C to stop the server
```
Pegar el servidor http://127.0.0.1:8000 en el navegador y probar la demo 

## PRUEBA
<img src="public/screens/inicio.png" alt="Texto alternativo" width="700" heignt="700" />

