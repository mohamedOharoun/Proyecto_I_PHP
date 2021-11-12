<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\ProductLines;

class ProductLine{
    function __construct(public string $name, public string | null $textDescription, public string | null $htmlDescription){}

    function validate(): array{
        $errores = [];
        if(!isset($this->name) || strlen($this->name) < 1){
            $errores['name'] = "La línea de productos debe tener asignado un nombre";
        }

        return $errores;
    }
}
?>