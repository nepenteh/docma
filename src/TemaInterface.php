<?php

namespace Nepenteh\Docma;

interface TemaInterface {

    public  function nombreFicheroTema(string $prefijo): string;
    public  function filesContents(): array;
    public  function markdownToHtml(string $prefijo): string;
    public  function tituloTema(string $file): string;
    public  function esquemaLateral(): string;

}