<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Concesionario


## Tecnologías Utilizadas

- ![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?logo=laravel&logoColor=white)
- ![Livewire](https://img.shields.io/badge/Livewire-3-4E56A6?logo=laravel&logoColor=white)
- ![Node](https://img.shields.io/badge/Node.js-20.11.0-339933?logo=node.js&logoColor=white)
- ![PHP](https://img.shields.io/badge/PHP-8.2.15-777BB4?logo=php&logoColor=white)

## Instrucciones para Levantar el Proyecto

1. Clonar el repositorio:
    sh
    git clone https://github.com/Jaiveruz/concesionario.git
    

2. Entrar a la carpeta del proyecto:
    cd concesionario
    

3. Instalar las dependencias:
    composer install && npm install
    

4. Copiar las variables de entorno:
    cp .env.example .env
    

5. Generar la clave de la aplicación:
    php artisan key:generate
    

6. Configurar y crear una base de datos según el .env.

7. Ejecutar las migraciones y seeders:
    php artisan migrate --seed
    

8. Iniciar el servidor:
    php artisan serve