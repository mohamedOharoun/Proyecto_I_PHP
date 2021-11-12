<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Offices;

class Office{
    function __construct(public string $code, public string $city, public string $state, public string $country, public string $postalCode, public string $territory, public string $phone, public string $addressLine1, public string $addressLine2){}

    function validate(): array{
        $errores = [];
        if(!isset($this->city) || strlen($this->city) < 1){
            $errores['city'] = "La oficina debe estar ubicada en una ciudad";
        }

        return $errores;
    }
}
?>