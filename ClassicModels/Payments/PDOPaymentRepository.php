<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Payments;

class PDOPaymentRepository{
    function __construct(private \PDO $conn){}

    function getAll(): array{
        $stm = $this->conn->query("SELECT * FROM payments
                                  ORDER BY paymentDate DESC");
        $stm->execute();
        return $stm->fetchAll();
    }
}