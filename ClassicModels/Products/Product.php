<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Products;

class Product{
    function __construct(public string $code, public string $name, 
                         public string $line, public string $scale,
                         public string $vendor, public string $description, 
                         public int | null $stock, public float | null $price, 
                         public float | null $msrp){}

    function validate(): array{
        $errores = [];
        if(!isset($this->line)){
            $errores['productLine'] = "The product must have a product line";
        }

        if(!isset($this->code) || strlen($this->code) < 3){
            $errores['code'] = "El producto debe tener un código de al menos 3 carácteres";
        }

        if(!isset($this->name) || strlen($this->name) < 3){
            $errores['name'] = "El producto debe tener un nombre de al menos 3 carácteres";
        }

        return $errores;
    }
}
?>