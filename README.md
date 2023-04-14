# DOCMA (Documentación MarkDown)

José Manuel Rosado Hurtado 2023 - [ejerciciosmesa.com](http://ejerciciosmesa.com)

## Descripción

**DOCMA** es un visor de documentación creada con texto en formato MarkDown. 
Permite crear una documentación interactiva rápida usando este tipo de documentos. 
La navegación en la documentación creada es fácil gracias a la creación de un índice, y el acceso a los temas resulta rápido e intuitivo.
Por otro lado la documentación creada con DOCMA puede ser publicada en un servidor para el acceso de todo aquél que necesite consultarla.

La creación de una documentación usando DOCMA es un proceso sencillo que apenas necesita conocimientos de programación, lo que permite al 
usuario crear una documentación de calidad en poco tiempo.

## Sistema Solar

En este repositorio puede conseguir el visor de documentación DOCMA con un ejemplo de documentación consistente en información sobre el Sistema Solar.
(La información de ejemplo incluida en esta demo ha sido extraída de Wikipedia)

![Ejemplo DOCMA](https://ejerciciosmesa.com/images/docma/docma_ejemplo.png)

Puede acceder a un ejemplo de documentación publicada con DOCMA en el siguiente enlace:

[Documentación Generador de Código DUENDE](https://ejerciciosmesa.com/duende)

## Proceso de creación de documentación con DOCMA

### Creación de archivos con los contenidos.

Escriba cada tema en un archivo markdown siguiendo las reglas de este lenguaje de marcado. 
Estos archivos deben tener un nombre que empiece por el número de tema y el número de apartado separado por un guión. 
A continuación indique un nombre para el archivo separándolo con un guión bajo.

Aquí tiene un ejemplo de archivos nombrados con la especificación para DOCMA:

* 01-00_Europa.md
* 01-01_España.md
* 01-02_Italia.md
* 01-03_Francia.md
* 01-04_Alemania.md
* 02-00_Africa.md
* 02-01_Nigeria.md
* 02-02_Camerún.md
* 02-03_Marruecos.md
* 03_00_Asia.md
* 03_01_China.md
* 03_02_India.md


Estos archivos definen tres temas principales: Europa, África y Asia, y dentro de cada estos temas hay distintos apartados correspondientes a varios países de
cada continente. Si los nombres están creados de forma correcta, el visor DOCMA será capaz de crear automáticamente un índice en la parte izquierda de la pantalla 
con los temas y apartados, así como unos botones de navegación al final de cada tema que permiten pasar al tema siguiente o anterior.

Todos los archivos markdown creados de esta forma deben estar dentro de una carpeta que puede llamarse de la forma que quiera. (En el repositorio se llama *Contents*)

La carpeta *Contents* puede además contener una subcarpeta imágenes donde se almacenen imágenes que se usarán en la documentación.

### Estilos CSS

La carpeta del proyecto DOCMA contiene un arhivo CSS llamado **visordoc.css** dentro de una carpeta *CSS*. Este archivo define los estilos básicos 
para el funcionamiento del visor.
Sin embargo, es posible añadir otro archivo CSS en la carpeta que defina estilos personalizados para la documentación.

### Configuración

La carpeta del proyecto DOCMA contiene un archivo **config.php**. En este archivo podrá configurar tres variables:

* El título del documento. Este título aparecerá en la parte superior de la documentación.
* El nombre de la carpeta de contenidos. Indique aquí el nombre que tiene la carpeta que contiene los archivos markdown de la documentación.
* Archivo CSS específico. Indique aquí el nombre del CSS específico para la visualización personalizada de la documentación.

### Librería PHP-Markdown (Michelf) - Conversión de MarkDown en HTML

Este proyecto usa la librería PHP Michelf para la conversión de archivos markdown en HTML, que permite la visualización de dichos archivos en el navegador.
Puede encontrar más información sobre esta librería en:

[PHP Markdown - https://github.com/michelf/php-markdown](https://github.com/michelf/php-markdown)

### Licencia

Este proyecto es de libre uso.

Se agradece mención al autor y enlace al repositorio.

[José Manuel Rosado Hurtado - ejerciciosmesa.com](https://ejerciciosmesa.com)









