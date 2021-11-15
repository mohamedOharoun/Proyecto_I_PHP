<?php
    namespace Mohamed\ClassicModels\Auth;
    session_start();
    
    require_once "../factoryConnection.php";
    use Mohamed\ClassicModels\FactoryConnection;
    require_once "PDOAuthRepository.php";
    use Mohamed\ClassicModels\Auth\PDOAuthRepository;
    
    $login = $_POST['nick'];
    $pass = $_POST['passw'];

    $config = require_once "../config.php";

    try{
        $factory = new FactoryConnection($config);
        $repository = new PDOProductRepository($factory->get());
        $res = $repository->checkUser($login, $pass);
        if($res){
            $_SESSION['login'] = true;
            $_SESSION['name'] = $res;
            $res = null;
            header('Location: ../Customers/Controllers/Read/listCustomers_controller.php');
        }else{
            header('Location: login.php?err=1');
        }
    }catch(PDOException $e){
        print '¡Error!: ' . $e->getMessage() . '<br/>';
        die();
    }finally{
        $repository = null;
    }
    
    
?>