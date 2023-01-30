Ejemplo Laravel
Sitio web de muestra de Laravel con recuperación de contenido de prismic.io

Este proyecto se ejecuta con Laravel versión 5.5.

Empezar
Suponiendo que ya ha instalado en su máquina: PHP (> = 7.0.0), Laravel, Composer y Node.js.

# install dependencies
composer install


# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run prod
A continuación, inicie el servidor:

php artisan serve
¡El proyecto de ejemplo de Laravel ya está en funcionamiento! Acceda a él en http://localhost:8000.

Licencia
Este software está licenciado bajo la licencia Apache 2, citada a continuación.



Licenciado bajo la Licencia Apache, Versión 2.0 (la "Licencia"); no puede usar este proyecto excepto de conformidad con la Licencia. Puede obtener una copia de la Licencia en http://www.apache.org/licenses/LICENSE-2.0.

A menos que lo exija la ley aplicable o se acuerde por escrito, el software distribuido bajo la Licencia se distribuye "TAL CUAL", SIN GARANTÍAS NI CONDICIONES DE NINGÚN TIPO, ya sean expresas o implícitas. Consulte la Licencia para conocer el idioma específico que rige los permisos y limitaciones de la Licencia.

