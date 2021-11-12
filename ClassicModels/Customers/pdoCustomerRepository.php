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
                                    FROM employees 
                                    where employeeNumber = :number");
        $stm->execute(array(':number' => $number));

        $result = $stm->fetch();
        if($result){
            //return $result;
            return new Customer(intval($result['employeeNumber']), $result['lastName'], $result['firstName'], $result['extension'], $result['email'], $result['officeCode'], intval($result['reportsTo']), $result['jobTitle']);
        }else{
            return null;
        }
    }

    function update(Customer $employee): void{
        $stm = $this->conn->prepare("UPDATE employees SET firstName=:firstName,
                                                          lastName=:lastName,
                                                          firstName=:firstName,
                                                          extension=:extension,
                                                          email=:email,
                                                          officeCode=:officeCode,
                                                          reportsTo=:reportsTo,
                                                          jobTitle=:jobTitle
                                    WHERE employeeNumber=:number");
        $stm->execute(array(':number' => $employee->number, 
                            ':lastName' => $employee->lastName, 
                            ':firstName' => $employee->firstName,
                            ':extension' => $employee->extension,
                            ':email' => $employee->email,
                            ':officeCode' => $employee->officeCode,
                            ':reportsTo' => $employee->reportsTo,
                            ':jobTitle' => $employee->jobTitle
                        )
                    );
    }

    public function getOfficeCodesCities(): array{
        $stm = $this->conn->prepare('SELECT officeCode, city FROM offices');

        $stm->execute();

        return $stm->fetchAll();
    }

    public function getNumbersNames(): array{
        $stm = $this->conn->prepare('SELECT employeeNumber, lastName, firstName FROM employees');

        $stm->execute();

        return $stm->fetchAll();
    }

    private function getNextNumber(): int {
        $stm = $this->conn->query("SELECT max(employeeNumber) as maxNumber 
                                 FROM employees");

        $stm->execute();

        return intval($stm->fetch()['maxNumber']) + 1;
    }
    
    function getEmployees(): array{
        $stm = $this->conn->prepare('SELECT employeeNumber FROM employees');

        $stm->execute();

        return $stm->fetchAll();
    }

    function insert(Customer $employee): void{
        $stm = $this->conn->prepare("INSERT INTO employees(employeeNumber, lastName,firstName, extension, email, officeCode, reportsTo, jobTitle) 
                                                    VALUES(:employeeNumber,
                                                        :lastName,
                                                        :firstName,
                                                        :extension,
                                                        :email,
                                                        :officeCode,
                                                        :reportsTo,
                                                        :jobTitle)");
        
        $stm->execute(array(':employeeNumber' => $this->getNextNumber(),
                            ':lastName' => $employee->lastName, 
                            ':firstName' => $employee->firstName,
                            ':extension' => $employee->extension,
                            ':email' => $employee->email,
                            ':officeCode' => $employee->officeCode,
                            ':reportsTo' => $employee->reportsTo,
                            ':jobTitle' => $employee->jobTitle)
                    );
    }

    function delete(int $number): void{
        $stm = $this->conn->prepare("DELETE FROM employees WHERE employeeNumber=:number");
        $stm->execute(array(':number'=>$number));
    }
}

?>