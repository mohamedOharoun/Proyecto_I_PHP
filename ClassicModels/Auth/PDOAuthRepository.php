<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Auth;

class PDOProductRepository{
    function __construct(private \PDO $conn){}

    function checkUser($user, $pass): string | bool{
        $stm = $this->conn->prepare("SELECT name FROM USERS WHERE login=:user and password=:pass and active=1");
        $stm->execute(array(':user'=>$user, ':pass'=>$pass));

        $result = $stm->fetch();

        if($result){
            return $result['name'];
        }else{
            return false;
        }
    }

    
}

?>