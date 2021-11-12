<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers;

class Customer{
    function __construct(public int | null $number, public string $name, 
                         public string $lastName, public string $firstName,
                         public string $extension, public string $phone, 
                         public string $adrressLine1, public string $adrressLine2,
                         public string $city, public string $state,
                         public string $postalCode, public string $country,
                         public int $employee, public float $creditLimit){}

    function validate(): array{
        $errores = [];
        if(!isset($this->employee)){
            $errores['officeCode'] = "El empleado debe tener asignado una oficina";
        }

        if(!isset($this->name) || strlen($this->name) < 3){
            $errores['firstName'] = "El cliente debe tener un nombre de al menos 3 letras";
        }

        return $errores;
    }
}
?>