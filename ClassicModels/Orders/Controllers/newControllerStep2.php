<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Orders\Controllers;
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../Auth/login.php');
    die();
}

require_once "../order.php";
use Mohamed\ClassicModels\Orders\Order;
require_once "../PDOOrderRepository.php";
use Mohamed\ClassicModels\Orders\PDOOrderRepository;
require_once "../../Products/PDOProductRepository.php";
use Mohamed\ClassicModels\Products\PDOProductRepository as ProductRepository;
require_once "../../Customers/PDOCustomerRepository.php";
use Mohamed\ClassicModels\Customers\PDOCustomerRepository as CustomerRepository;
require_once "../../Customers/Customer.php";
use Mohamed\ClassicModels\Customers\Customer;
require_once "../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;

$config = require "../../config.php";
$factory = new FactoryConnection($config);
$conn = $factory->get();

$customerNumber = intval($_POST["customerNumber"]);

if (empty($_POST["customerName"])) {
    $customerRepository = new CustomerRepository($conn);
    $customer = $customerRepository->get($customerNumber);
    $customerName = $customer->name;
} else {
    $customerName = $_POST["customerName"];
}

$orderDate = !empty($_POST["orderDate"])? $_POST["orderDate"]: "";
$requiredDate = !empty($_POST["requiredDate"])? $_POST["requiredDate"]: "";
$shippedDate = !empty($_POST["shippedDate"])? $_POST["shippedDate"]: "";

$orderDetails = !empty($_POST['orderDetails'])? $_POST['orderDetails']: [];


if (!empty($_POST['save'])) {
    $order = new Order(null, $orderDate, $requiredDate, $shippedDate, 'In process', null, $customerNumber, $customerName);

    $orderRepository = new PDOOrderRepository($conn);
    $orderRepository->insert($order, $orderDetails);
    echo "enhorabuena se ha insertado la orden";
    header('Location: listOrders_controller.php');
    die();
}

if (!empty($_POST['addOrderDetail']) && !empty($_POST['productCode'])) {
    $productRepository = new ProductRepository($conn);

    foreach ($_POST['productCode'] as $productCode) {
        if (!existOrderDetail($orderDetails, $productCode)) {
            $product = $productRepository->get($productCode);
            $orderDetails[] = array("productCode" => $product->code,
                                   "productName" =>  $product->name,
                                   "quantityOrdered" => 0,
                                   "priceEach" => $product->price
                             );
        }
    }
} 

$productRepository = new ProductRepository($conn);
$search = array_key_exists("search", $_POST)? $_POST["search"]: null;
$products = $productRepository->find($search);
require "../Views/formOrderDetails.php";





function existOrderDetail($orderDetails, $productCode): bool {
    foreach ($orderDetails as $orderDetail) {
        if ($orderDetail['productCode'] == $productCode) {
            return true;
        }
    }

    return false;
}
