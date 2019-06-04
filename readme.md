# Test Emanuel Castillo

### Aspectos Tecnicos

Framework y librerias usadas en el test:

* [Laravel] - version 5.8
* [MySQL]
* [jQuery]
* [HTML]
* [Leaflet.js]
* [OpenStreetMap]
* [Laravel Collective]
* [Materialize CSS]
* [font-awesome]
* [Daterangepicker.js]
* [DataTables.js]
* [Moment.js]

### Installation

Clonar Proyecto
```
$ git clone https://github.com/emanueljcc/testBBQ.git
```
Instalar dependencias.

```
$ npm install
$ composer install
```
### Configurar .env del proyecto con los datos de la BD.

Luego de configurado el .env

```
$ php artisan key:generate
$ php artisan migrate
```
De igual manera dejare una copia de mi BD local en la raiz del proyecto.

### Porqie Leaflet.js y no Google Maps
Use Leaflet.js para los mapas ya que es opensources junto con openstreetmap ya que permite relaizar muchas mas peticiones de manera gratuita, en cambio google maps es de version paga.

### Vistas previas de la aplicacion

https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.46.55.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.47.11.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.47.37.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.47.56.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.48.22.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.48.56.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.49.06.png
https://raw.githubusercontent.com/emanueljcc/testBBQ/master/preview/Captura realizada el 2019-06-04 04.49.34.png

License
----

MIT
