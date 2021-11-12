<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Employees;

class Employee{
    function __construct(public int | null $number, public string $lastName, 
                         public string $firstName, public string $extension,
                         public string $email, public string $officeCode,
                         public int | null $reportsTo, public string $jobTitle){}

    function validate(): array{
        $errores = [];
        if(!isset($this->officeCode) || strlen($this->officeCode) < 1){
            $errores['officeCode'] = "El empleado debe tener asignado una oficina";
        }

        if(!isset($this->firstName) || strlen($this->firstName) < 3){
            $errores['firstName'] = "El empleado debe tener un nombre de al menos 3 letras";
        }

        return $errores;
    }
}
?>