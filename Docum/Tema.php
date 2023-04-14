<?php

/**
 * Clase Tema
 * 
 * Para aplicación DOCMA (documentación markdown)
 * Programado por José Manuel Rosado Hurtado
 * 
 * http://ejerciciosmesa.com
 * 
 * Clase de apoyo para la generación del índice de los contenidos, generación de botones 
 * "Tema Siguiente" y "Tema Anterior", así como conexión con la librería de conversión Michelf
 * de texto Markdown en HTML.
 * 
 * https://github.com/michelf/php-markdown
 * 
 */





namespace Docum;

use Michelf\MarkdownExtra;

class Tema implements TemaInterface {

    private string $contenidos;

    public function __construct($path)
    {
        $this->contenidos = $path;
    }

    public function nombreFicheroTema(string $prefijo): string
    {
        $arrFiles = $this->filesContents();
        foreach ($arrFiles as $f)
            if (strpos($f, $prefijo . "_") === strlen($this->contenidos)) return $f;
        return $arrFiles[0];
    }

    public function filesContents(): array
    {
        return glob($this->contenidos.'*.md');
    }

    public function markdownToHtml(string $prefijo): string
    {
        $text = file_get_contents($this->nombreFicheroTema($prefijo, $this->contenidos));
        $html = MarkdownExtra::defaultTransform($text);
        $html .= $this->navAnteriorSiguiente($prefijo);
        return $html;
    }

    private function navAnteriorSiguiente(string $prefijo): string
    {
        $fAnt = $this->ficheroAnterior($prefijo);
        $fSig = $this->ficheroSiguiente($prefijo);
        $prefAnt = $this->prefijo($fAnt);
        $prefSig = $this->prefijo($fSig);
        $nombreAnt = $this->tituloTema($fAnt);
        $nombreSig = $this->tituloTema($fSig);

        $enlaceAnt = ($fAnt!=null) ? '<a href="index.php?cnt='.$prefAnt.'" class="btn btn-outline-dark">'.$nombreAnt.'</a>' : '&nbsp;';
        $enlaceSig = ($fSig!=null) ? '<a href="index.php?cnt='.$prefSig.'" class="btn btn-outline-dark">'.$nombreSig.'</a>' : '&nbsp;';

        $navegacion = '<div class="row sigant"><div class="col-6 text-start">';
        $navegacion .= $enlaceAnt;
        $navegacion .= '</div><div class="col-6 text-end">';
        $navegacion .= $enlaceSig;
        $navegacion .= '</div></div>';

        return $navegacion;

    }

    private function ficheroAnterior($prefijo): ?string
    {
        $arrFiles = $this->filesContents();
        $tam = count($arrFiles);
        for($i=1;$i<$tam;$i++) 
            if (strpos($arrFiles[$i], $prefijo . "_") === strlen($this->contenidos)) return $arrFiles[$i-1];

        return null;
    }

    private function ficheroSiguiente($prefijo): ?string
    {
        $arrFiles = $this->filesContents();
        $tam = count($arrFiles)-1;
        for($i=0;$i<$tam;$i++) 
            if (strpos($arrFiles[$i], $prefijo . "_") === strlen($this->contenidos)) return $arrFiles[$i+1];

        return null;
    }

    public function tituloTema(?string $file): string
    {
        if($file==null) return "";
        $fichero = fopen($file, "r");
        return substr(fgets($fichero),1);
    }

    
    public function esquemaLateral(): string
    {
        $arrFiles = $this->filesContents();
        if(count($arrFiles)==0) return "";

        $esquema = "<ol class='nivel1'>";
        $inicio = true;
        $nivel = 1;
        foreach($arrFiles as $f) {
            $enlace = "<a href='index.php?cnt=".$this->prefijo($f)."'>";
            if($inicio) {
                $esquema .= "<li>".$enlace.$this->tituloTema($f)."</a>";
                $inicio = false;
                continue;
            }
            $nivelTema = $this->nivel($f);
            if($nivelTema == $nivel) 
                $esquema .= "</li><li>";
            else if($nivelTema > $nivel) 
                $esquema .= "<ol type='i'><li>";
            else if($nivelTema < $nivel) 
                $esquema .= "</ol></li><li>";
            
            $nivel = $nivelTema;
            $esquema .= $enlace.$this->tituloTema($f)."</a>";
        }
        $esquema .= "</li></ol>";
    
        return $esquema;
            
    }

    private function nivel(string $nombreFichero): int
    {
        $prefijo = $this->prefijo($nombreFichero);
        $niveles = explode("-",$prefijo);
        $n=0;
        foreach($niveles as $niv) 
            if(intval($niv)>0) $n++;
        return $n;
    }

    private function prefijo(?string $nombreFichero): string
    {
        if($nombreFichero==null) return "";
        $soloNombreFichero = substr($nombreFichero,strlen($this->contenidos));
        $prefijo = explode("_",$soloNombreFichero)[0];
        return $prefijo;
    }


}