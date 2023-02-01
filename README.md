Ejemplo Laravel
Sitio web de muestra de Laravel con recuperación de contenido de prismic.io

Este proyecto se ejecuta con Laravel versión 9.48.0

Empezar
Suponiendo que ya ha instalado en su máquina: PHP (> = 7.0.0), Laravel, Composer.

# install dependencies
1 - composer install

2 - composer require laravelcollective/html

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate


php artisan serve
¡El proyecto de ejemplo de Laravel ya está en funcionamiento! Acceda a él en http://localhost:8000.





