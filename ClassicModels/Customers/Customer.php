<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers;

class Customer{
    function __construct(public int | null $number, public string $name, 
                         public string $lastName, public string $firstName,
                         public string $phone, 
                         public string | null $addressLine1, public string | null $addressLine2,
                         public string $city, public string | null $state,
                         public string | null $postalCode, public string $country,
                         public int | null $employee, public float | null $credit){}

    function validate(): array{
        $errores = [];
        if(!isset($this->employee)){
            $errores['employee'] = "El cliente requiere tener asignado un cliente";
        }

        if(!isset($this->name) || strlen($this->name) < 3){
            $errores['firstName'] = "El cliente debe tener un nombre de al menos 3 letras";
        }

        return $errores;
    }
}
?>