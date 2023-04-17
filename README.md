# DOCMA (Documentación MarkDown)

José Manuel Rosado Hurtado 2023 - [ejerciciosmesa.com](http://ejerciciosmesa.com)

## Descripción

**DOCMA** es un visor de documentación creada con texto en formato MarkDown. 
Permite crear una documentación interactiva rápida usando este tipo de documentos. 
La navegación en la documentación creada es fácil gracias a la creación automática de un índice, y el acceso a los temas resulta rápido e intuitivo.
Por otro lado la documentación creada con DOCMA puede ser publicada en un servidor para el acceso de todo aquél que necesite consultarla.

## Creación de un proyecto de documentación

Para crear un proyecto de documentación ejecute el siguiente comando en la consola:

```bash
composer create-project nepenteh/docma
```

Esto creará una carpeta *docma* y dentro de ella debe prestar especial atención a los siguientes elementos:

**Carpeta: /public/Contents**

Esta carpeta contendrá los distintos archivos markdown que formarán la documentación que quiere mostrar. Como ejemplo se incluye en el proyecto instalado una documentación sobre el Sistema Solar. Estos archivos deben ser eliminados y sustituidos por los suyos propios.

**Archivo .env**

Este archivo tiene tres datos configurables: el título de su documentación, el nombre de la carpeta con los contenidos y el archivo CSS de estilos propios de su documentación.

* **Título de su documentación.** Escriba el título general que quiere asignarle a su documentación. Este título aparecerá en la parte superior de la pantalla.
* **Nombre de la carpeta de contenidos.** Escriba el nombre que quiera darle a la carpeta que contiene los contenidos de su documentación. Por defecto es *Contents*. Debe tener en cuenta que si cambia este nombre debe cambiar el nombre de la carpeta *Contents* que se encuentra en la carpeta */public*.
* **Nombre del archivo CSS de estilos propios de la documentación.** Este archivo CSS se encuentra dentro de la carpeta */public/css* y puede ser personalizado para cambiar los estilos de su documentación. Indique aquí el nombre que quiere asignarle a ese archivo y asegúrese de que existe dentro de la carpeta */public/css*.

## Proceso de creación de documentación con Docma

### Creación de archivos con los contenidos.

Escriba cada tema en un archivo markdown siguiendo las reglas de este lenguaje de marcado. 
Estos archivos deben tener un nombre que empiece por el número de tema y el número de apartado separado por un guión. 
A continuación indique un nombre para el archivo separándolo con un guión bajo.

Aquí tiene un ejemplo de archivos nombrados con la especificación para Docma:

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
cada continente. Si los nombres están creados de forma correcta, el visor Docma será capaz de crear automáticamente un índice en la parte izquierda de la pantalla 
con los temas y apartados, así como unos botones de navegación al final de cada tema que permiten pasar al tema siguiente o anterior.

Todos los archivos markdown creados de esta forma deben estar dentro de una carpeta que puede llamarse de la forma que quiera, y que debe estar dentro de la carpeta */public*. Por defecto esta carpeta es la carpeta */public/Contents*

#### Imágenes y otros elementos de la documentación

La carpeta *Contents* puede además contener una subcarpeta *imagenes* donde se almacenen imágenes que se usarán en la documentación (u otras carpetas con otros contenidos que desee). Si quiere especificar una ruta a una de las imágenes de la subcarpeta *imagenes* de su documentación, use 'Contents/imagenes/fichero_de_imagen.extension' para que el acceso sea el correcto. (Puede consultar los archivos markdown de ejemplo incluidos en el proyecto)

#### Enlaces a otros temas de la documentación

El acceso a un tema concreto se hace usando el index.php con el parámetro de URL *cnt* asignado a la numeración del tema. Así por ejemplo, si quiere crear un enlace en un archivo markdown de su documentación que apunte al tema "Alemania" cuya numeración es 01_04, debe indicar lo siguiente:

[Alemania](index.php?cnt=01_04)


### Estilos CSS

La carpeta del proyecto Docma contiene un arhivo CSS llamado **visordoc.css** dentro de una carpeta */public/css*. Este archivo define los estilos básicos 
para el funcionamiento del visor y no debería tocarse. 
Sin embargo, es posible añadir otro archivo CSS en la carpeta que defina estilos personalizados para la documentación. Añada este nuevo archivo css y no olvide indicar el nombre de este archivo en la configuración del archivo de variables de entorno .env


## Documentación de Ejemplo Sistema Solar

Este proyecto incluye como ejemplo una documentación con información sobre el Sistema Solar. (La información de ejemplo incluida en esta demo ha sido extraída de Wikipedia) También incluye un archivo *planetas.css* que define estilos propios para esta documentación. 

![Ejemplo DOCMA](https://ejerciciosmesa.com/images/docma/docma_ejemplo.png)

Tanto los archivos markdown de ejemplo como el archivo css deberían ser sustituidos por la documentación propia que creará el usuario.

Puede acceder a un ejemplo de documentación publicada con Docma en el siguiente enlace:

[Documentación Generador de Código DUENDE](https://ejerciciosmesa.com/duende)











