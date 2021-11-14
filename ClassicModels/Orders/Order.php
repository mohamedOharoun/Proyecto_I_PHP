<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Orders;

class Order {
    function __construct(public int | null $number = null, 
                         public string | null $orderDate = null,
                         public String | null $requiredDate = null,
                         public string | null $shippedDate = null,
                         public string | null $status = null,
                         public string | null $comments = null,
                         public int | null $customerNumber = null,
                         public string | null $customerName = null) { 
    }

    function validate(): array {
        $errores = [];

        return $errores;
    }
}