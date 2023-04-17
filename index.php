<?php

include __DIR__ . '/vendor/autoload.php';

use Docma\Tema\Tema;

$tema = new Tema(CARPETA_CONTENIDOS);

$cnt = '01-00';
if (isset($_GET['cnt'])) $cnt = $_GET['cnt'];
$html = $tema->markdownToHtml($cnt);
$esquema = $tema->esquemaLateral();
$titulo = $tema->tituloTema($tema->nombreFicheroTema($cnt));

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/visordoc.css" rel="stylesheet">
    <link href="css/<?php CSS_PROPIO; ?>" rel="stylesheet">
</head>

<body>
    <div class="fluid-container bd-layout">
        <div class="row bg-dark text-light pt-1 pb-1 ps-3 shadow">
            <h4><?php echo TITULO; ?></h4>
        </div>
        <div class="row">
            <aside class="lateral bd-sidebar col-md-3 col-12 shadow ">
                <div class="divindice  pt-2 ps-2 pe-2 pb-2 pb-md-5">
                    <div class="indicedesp">
                        <p class="ps-1 pt-1 fw-bold d-none d-md-block">Contenidos</p>
                        <a class="btn btn-sm btn-outline-dark botonindice d-inline d-md-none" data-bs-toggle="collapse" href="#esquema" role="button" aria-expanded="false" aria-controls="esquema">Contenidos</a> 
                    </div>
                    <hr class="d-md-block d-none">
                    <div id="esquema" class="show collapse">
                    <hr class="d-md-none d-block">
                    <?php
                    echo $esquema;
                    ?>
                    </div>
                </div>
            </aside>
            <main class="nav bd-main col-md-9 col-12">
                <div class="contenido p-4">
                    <?php
                    echo $html;
                    ?>
                </div>
            </main>
        </div>
    </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script>
        (function() {
            hideShowEsquema();
            window.onresize = hideShowEsquema;
        })();

        function hideShowEsquema() {
            if(window.matchMedia("(max-width: 768px)").matches)
                document.getElementById("esquema").classList.replace("show","hide");
            else {
                document.getElementById("esquema").classList.remove("hide");
                document.getElementById("esquema").classList.add("show");
            }
               
        }
    </script>
</body>

</html>