<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\ProductLines;
require_once 'productline.php';
use Mohamed\ClassicModels\ProductLines\ProductLine;

class PDOProductLineRepository{
    function __construct(private \PDO $conn){}

    function getAll(): array{
        $stm = $this->conn->query("SELECT productLine as name, textDescription, htmlDescription FROM productlines");
        $stm->execute();
        return $stm->fetchAll();
    }

    function get(string $name): ProductLine | null{
        $stm = $this->conn->prepare("SELECT  productline as name, textDescription, htmlDescription 
                                    FROM productlines WHERE productline = :name");
        $stm->execute(array(':name' => $name));

        $result = $stm->fetch();
        if($result){
            return new ProductLine($result['name'], $result['textDescription'], $result['htmlDescription']);
        }else{
            return null;
        }
    }

    function getImage(string $name): string | null{
        $stm = $this->conn->prepare("SELECT  image 
                                    FROM productlines WHERE productLine = :name");
        $stm->execute(array(':name' => $name));

        $result = $stm->fetch();
        if($result){
            return $result['image'];
        }else{
            return null;
        }
    }

    function update(string $currentName, ProductLine $productLine, string | null $image): void{
        if(is_null($image)){
            $setImage = '';
        }else{
            $setImage = ',image=:image';
        }
        $stm = $this->conn->prepare("UPDATE productLines SET 
                                                        productline=:name,
                                                        textDescription=:textDescription, 
                                                        htmlDescription=:htmlDescription
                                                        ${setImage}
                                    WHERE productLine=:currentName");
        $stm->bindParam(':name', $productLine->name);
        $stm->bindParam(':textDescription', $productLine->textDescription);
        $stm->bindParam(':htmlDescription', $productLine->htmlDescription);
        $stm->bindParam(':currentName', $currentName);

        if(!is_null($image)){
            $stm->bindParam(':image', $image, \PDO::PARAM_LOB);
        }

        $stm->execute();
    }

    

    function insert(ProductLine $productLine, $image): void{
        $stm = $this->conn->prepare("INSERT INTO productLines (productLine, textDescription, htmlDescription, image) 
                                                    VALUES(:name, :textDescription, :htmlDescription, :image)");
        $stm->execute(array(":name" => $productLine->name, 
                            ":textDescription" => $productLine->textDescription, 
                            ":htmlDescription" => $productLine->htmlDescription,
                            ":image" => $image));
    }

    function delete(string $name): void{
        $stm = $this->conn->prepare("DELETE FROM productlines WHERE productline=:name");
        $stm->execute(array(':name'=>$name));
    }
}

?>