# 🛒 Sistema Ecommerce PHP
![php](https://img.shields.io/badge/php-7+-red)
![Status](https://img.shields.io/badge/Status-En%20desarrollo-green)
![License](https://img.shields.io/badge/License-MIT-yellow)

Sistema de **comercio electrónico desarrollado en PHP y MySQL**, que permite gestionar productos, clientes y pedidos mediante una interfaz web.  
Este proyecto está orientado a **aprendizaje y demostración de desarrollo web backend**, aplicando conceptos de programación web con PHP y bases de datos relacionales.

------------------------------------------------------------------------

## 📌 Características

- 🛍️ Catálogo de productos
- 🛒 Carrito de compras
- 👤 Gestión de usuarios
- 📦 Gestión de pedidos
- 📂 Administración de productos
- 🗂️ Base de datos en MySQL
- 🌐 Interfaz web para clientes y administración

------------------------------------------------------------------------

# 🎯 Objetivo del proyecto

El objetivo de este proyecto es:

- Aprendizaje de PHP y MySQL
- Práctica de CRUD y arquitectura web
- Implementación de carrito de compras
- Construcción de un proyecto real para portafolio

------------------------------------------------------------------------

## 🧰 Tecnologías utilizadas

- **PHP**
- **MySQL**
- **HTML5**
- **CSS**
- **JavaScript**
- **Bootstrap**
- **Apache / XAMPP**

------------------------------------------------------------------------

# 📂 Estructura del proyecto

    Sistema-Ecommerce-PHP/
    ├── css/
    ├── js/
    ├── img/
    ├── includes/
    ├── admin/
    ├── database/
    ├── index.php
    └── README.md
    
El proyecto está organizado siguiendo una estructura básica que separa:

- **css** → Archivos de estilos
- **js** → Scripts JavaScript
- **includes** → Archivos de configuración y conexión
- **admin** → Panel administrativo
- **database** → Script de base de datos
- **index.php** → Página principal
------------------------------------------------------------------------

## ⚙️ Requisitos

Antes de ejecutar el proyecto necesitas:

- PHP 7.0 o superior
- MySQL / MariaDB
- Servidor Apache
- XAMPP, WAMP o LAMP (recomendado)
- Navegador web

------------------------------------------------------------------------

## 🚀 Instalación

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/Joseluis30c/Sistema-Ecommerce-PHP.git
```

### 2️⃣ Mover el proyecto al servidor local

Copiar la carpeta del proyecto en:

    xampp/htdocs/
    o
    /var/www/html/

### 3️⃣ Crear la base de datos

Copiar la carpeta del proyecto en:
1. Abrir phpMyAdmin
2. Crear una base de datos, por ejemplo:
```bash
ecommerce
```
3. Importar el archivo SQL del proyecto.

### 4️⃣ Configurar la conexión

Editar el archivo de conexión a base de datos:
```bash
config/database.php
```
Cambiar los datos:
```bash
$host = "localhost";
$user = "root";
$password = "";
$database = "ecommerce";
```

### 5️⃣ Ejecutar el proyecto

Abrir en el navegador:
```bash
http://localhost/Sistema-Ecommerce-PHP
```

------------------------------------------------------------------------

# 👨‍💻 Autor

**Jose Luis Chavesta Rivas**

GitHub\
https://github.com/Joseluis30c

------------------------------------------------------------------------

# ⭐ Apoya el proyecto

Si este proyecto te resulta útil o interesante:

⭐ Dale una estrella al repositorio en GitHub.
