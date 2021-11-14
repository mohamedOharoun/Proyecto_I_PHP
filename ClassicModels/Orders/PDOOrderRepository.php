<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Orders;

require_once "order.php";
use Mohamed\ClassicModels\Orders\Order;

class PDOOrderRepository{
    private const SQL = "select orders.*, customers.customerName as customerName
                         from orders inner join customers on orders.customerNumber = customers.customerNumber";
    

    function __construct(private \PDO $conn) { }

    function getAll(): array {
      $stm = $this->conn->query("SELECT orders.*, customers.customerName AS customerName
      FROM orders INNER JOIN customers ON orders.customerNumber = customers.customerNumber
      ORDER BY orders.orderDate DESC");
      $stm->execute();
      return $stm->fetchAll();
    }

    function get(int $number): Order | null {
      $stm = $this->conn->prepare($this->SQL."where orderNumber = :number");
      $stm->execute(array(':number' => $number));
      $result = $stm->fetch();
   
      if ($result) {
        return new Order($result['orderNumber'], $result['orderDate'], $result['requiredDate'], $result['shippedDate'],
                    $result['status'], $result['comments'], 
                    $result['customerNumber'], $result['customerName']);
      } else {
        return null; // no existe una order con el número indicado. seria mejor generar una excepción
      }
    }

    private function getNextNumber(): int {
      $stm = $this->conn->query("select max(orderNumber) as maxNumber 
                                 from orders;");
      $stm->execute();
      return intval($stm->fetch()['maxNumber']) +1;
    }

    function insert(Order $order, Array $orderDetails): void {
      $this->conn->beginTransaction();
      try {
        $order->number = $this->getNextNumber();

        $stm = $this->conn->prepare("insert into orders (orderNumber, orderDate, requiredDate, shippedDate,
                                                        status, comments, customerNumber)
                                    values (:number, :orderDate, :requiredDate, :shippedDate,
                                            :status, :comments, :customerNumber )"); 
        $stm->execute(array(':number'         => $order->number,
                            ':orderDate'      => $order->orderDate,
                            ':requiredDate'  => $order->requiredDate,
                            ':shippedDate'    => $order->shippedDate,
                            ':status'         => $order->status, 
                            ':comments'       => $order->comments,
                            ':customerNumber' => $order->customerNumber
                          ));

        $stm = $this->conn->prepare("insert into orderDetails (orderNumber, productCode, quantityOrdered,
                                                               priceEach, orderLineNumber)  
                                     values (:number, :productCode, :quantityOrdered,
                                             :priceEach, :orderLineNumber)"); 
        foreach ($orderDetails as $i => $orderDetail) {
          $stm->execute(array(':number' => $order->number,
                              ':productCode' => $orderDetail['productCode'],
                              ':quantityOrdered' => $orderDetail['quantityOrdered'],
                              ':priceEach' => $orderDetail['priceEach'],
                              ':orderLineNumber' => $i
                            ));
        }

        $this->conn->commit();
      } catch (\Exception $e) {
        $this->conn->rollBack();
        throw $e;
      }
    }

    function find(string | null $name): array {
        if (!isset($name) || strlen($name) == 0) {
          $stm = $this->conn->query("select customerName as name, customerNumber as number
                                    from customers
                                    order by name");
          $stm->execute();
        } else {
          $stm = $this->conn->prepare("select customerName as name, customerNumber as number
                                       from customers
                                       where customerName like :search
                                       order by name");
          $stm->execute(array(':search' => '%'.$name.'%'));
        }
      
        return $stm->fetchAll();
      }
}