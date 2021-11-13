<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Products;
require_once 'Product.php';
use Mohamed\ClassicModels\Products\Product;

class PDOProductRepository{
    function __construct(private \PDO $conn){}

    function getAll(): array{
        $stm = $this->conn->query("SELECT * FROM products
                                  ORDER BY productName");
        $stm->execute();
        return $stm->fetchAll();
    }

    function get(string $code): Product | null{
        $stm = $this->conn->prepare("SELECT * 
                                    FROM products 
                                    where productCode = :code");
        $stm->execute(array(':code' => $code));

        $result = $stm->fetch();
        if($result){
            return new Product($result['productCode'], $result['productName'], $result['productLine'], $result['productScale'], $result['productVendor'], $result['productDescription'], intval($result['quantityInStock']), floatval($result['buyPrice']), floatval($result['MSRP']));
        }else{
            return null;
        }
    }

    function update(Product $product): void{
        $stm = $this->conn->prepare("UPDATE products SET  productName=:name,
                                                          productLine=:line,
                                                          productScale=:scale,
                                                          productVendor=:vendor,
                                                          productDescription=:description,
                                                          quantityInStock=:stock,
                                                          buyPrice=:price,
                                                          MSRP=:msrp
                                    WHERE productCode=:code");
        $stm->execute(array(':code' => $product->code,
                            ':name' => $product->name, 
                            ':line' => $product->line, 
                            ':scale' => $product->scale,
                            ':vendor' => $product->vendor,
                            ':description' => $product->description,
                            ':stock' => $product->stock,
                            ':price' => $product->price,
                            ':msrp' => $product->msrp
                            )
                    );
    }
    
    function getLines(): array{
        $stm = $this->conn->prepare('SELECT productLine FROM productLines');

        $stm->execute();

        return $stm->fetchAll();
    }

    function insert(Product $product): void{
        $stm = $this->conn->prepare("INSERT INTO products(productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
                                                    VALUES(:code,
                                                        :name,
                                                        :line,
                                                        :scale,
                                                        :vendor,
                                                        :description,
                                                        :stock,
                                                        :price,
                                                        :msrp)");
        
        $stm->execute(array(':code' => $product->code,
                            ':name' => $product->name, 
                            ':line' => $product->line, 
                            ':scale' => $product->scale,
                            ':vendor' => $product->vendor,
                            ':description' => $product->description,
                            ':stock' => $product->stock,
                            ':price' => $product->price,
                            ':msrp' => $product->msrp
                            )
                    );
    }

    function delete(string $code): void{
        $stm = $this->conn->prepare("DELETE FROM products WHERE productCode=:code");
        $stm->execute(array(':code'=>$code));
    }
}

?>