<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Offices;

class PDOOfficeRepository{
    function __construct(private \PDO $conn){}

    function getAll(): array{
        $stm = $this->conn->query("SELECT * FROM offices");
        $stm->execute();
        return $stm->fetchAll();
    }

    function get(string $code): array | null{
        $stm = $this->conn->prepare("SELECT * FROM offices where officeCode = :code");
        $stm->execute(array(':code' => $code));

        $result = $stm->fetch();
        if($result){
            return $result;
        }else{
            return null;
        }
    }

    function getEx(string $code): Office | null{
        $stm = $this->conn->prepare("SELECT * FROM offices where officeCode = :code");
        $stm->execute(array(':code' => $code));

        $result = $stm->fetch();
        if($result){
            return new Office($result['officeCode'], $result['city'], $result['state'], $result['country'],$result['postalCode'], $result['territory'],$result['phone'], $result['addressLine1'],$result['addressLine2']);
        }else{
            return null;
        }
    }

    function update(Office $oficina): void{
        $stm = $this->conn->prepare("UPDATE offices SET city=:city,
                                                        state=:state, 
                                                        country=:country,
                                                        postalCode=:postalCode,
                                                        territory=:territory,
                                                        phone=:phone,
                                                        addressLine1=:addressLine1,
                                                        addressLine2=:addressLine2
                                    WHERE officeCode=:code");
        $stm->execute(array(':code' => $oficina->code, ":city" => $oficina->city,
                            ':state' => $oficina->state, ":country" => $oficina->country,
                            ':postalCode' => $oficina->postalCode, ":territory" => $oficina->territory, ':phone' => $oficina->phone,
                            ':addressLine1' => $oficina->addressLine1, ":addressLine2" => $oficina->addressLine2));
    }

    

    function create(Office $oficina): void{
        $stm = $this->conn->prepare("INSERT INTO offices(officeCode, city, phone, addressLine1, addressLine2, state, country, postalCode, territory) 
                                                    VALUES(:code,
                                                        :city,
                                                        :phone, 
                                                        :addressLine1,
                                                        :addressLine2,
                                                        :state,
                                                        :country,
                                                        :postalCode,
                                                        :territory
                                                        )");
        $stm->execute(array(":code" => $oficina->code, ":city" => $oficina->city,':state' => $oficina->state, 
                            ":country" => $oficina->country, ':postalCode' => $oficina->postalCode, ":territory" => $oficina->territory, ':phone' => $oficina->phone,
                            ':addressLine1' => $oficina->addressLine1, ":addressLine2" => $oficina->addressLine2));
    }

    function delete(string $code): void{
        $stm = $this->conn->prepare("DELETE FROM offices WHERE officecode=:code");
        $stm->execute(array(':code'=>$code));
    }
}

?>