<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers;
require_once 'Customer.php';
use Mohamed\ClassicModels\Customers\Customer;

class PDOCustomerRepository{
    function __construct(private \PDO $conn){}

    function getAll(): array{
        $stm = $this->conn->query("SELECT * FROM customers
                                  ORDER BY customerNumber");
        $stm->execute();
        return $stm->fetchAll();
    }

    function get(int $number): Customer | null{
        $stm = $this->conn->prepare("SELECT * 
                                    FROM customers 
                                    where customerNumber = :number");
        $stm->execute(array(':number' => $number));

        $result = $stm->fetch();
        if($result){
            //return $result;
            return new Customer(intval($result['customerNumber']), $result['customerName'], $result['contactLastName'], $result['contactFirstName'], $result['phone'], $result['addressLine1'], $result['addressLine2'], $result['city'], $result['state'], $result['postalCode'], $result['country'], intval($result['salesRepEmployeeNumber']), floatval($result['creditLimit']));
        }else{
            return null;
        }
    }

    function update(Customer $customer): void{
        $stm = $this->conn->prepare("UPDATE customers SET customerName=:name,
                                                          contactLastName=:lastName,
                                                          contactFirstName=:firstName,
                                                          phone=:phone,
                                                          addressLine1=:addressLine1,
                                                          addressLine2=:addressLine2,
                                                          city=:city,
                                                          state=:state,
                                                          postalCode=:postalCode,
                                                          country=:country,
                                                          salesRepEmployeeNumber=:employee,
                                                          creditLimit=:credit
                                    WHERE customerNumber=:number");
        $stm->execute(array(':name' => $customer->name, 
                            ':lastName' => $customer->lastName, 
                            ':firstName' => $customer->firstName,
                            ':phone' => $customer->phone,
                            ':addressLine1' => $customer->addressLine1,
                            ':addressLine2' => $customer->addressLine2,
                            ':city' => $customer->city,
                            ':state' => $customer->state,
                            ':postalCode' => $customer->postalCode,
                            ':country' => $customer->country,
                            ':employee' => $customer->employee,
                            ':credit' => $customer->credit,
                            ':number' => $customer->number
                        )
                    );
    }

    private function getNextNumber(): int {
        $stm = $this->conn->query("SELECT max(customerNumber) as maxNumber 
                                 FROM customers");

        $stm->execute();

        return intval($stm->fetch()['maxNumber']) + 1;
    }
    
    function getEmployees(): array{
        $stm = $this->conn->prepare('SELECT employeeNumber FROM employees');

        $stm->execute();

        return $stm->fetchAll();
    }

    function insert(Customer $customer): void{
        $stm = $this->conn->prepare("INSERT INTO customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
                                                    VALUES(:number,
                                                        :name,
                                                        :lastName,
                                                        :firstName,
                                                        :phone,
                                                        :addressLine1,
                                                        :addressLine2,
                                                        :city,
                                                        :state,
                                                        :postalCode,
                                                        :country,
                                                        :employee,
                                                        :credit)");
        
        $stm->execute(array(':number' => $this->getNextNumber(),
                            ':name' => $customer->name, 
                            ':lastName' => $customer->lastName, 
                            ':firstName' => $customer->firstName,
                            ':phone' => $customer->phone,
                            ':addressLine1' => $customer->addressLine1,
                            ':addressLine2' => $customer->addressLine2,
                            ':city' => $customer->city,
                            ':state' => $customer->state,
                            ':postalCode' => $customer->postalCode,
                            ':country' => $customer->country,
                            ':employee' => $customer->employee,
                            ':credit' => $customer->credit
                            )
                    );
    }

    function delete(int $number): void{
        $stm = $this->conn->prepare("DELETE FROM customers WHERE customerNumber=:number");
        $stm->execute(array(':number'=>$number));
    }
}

?>