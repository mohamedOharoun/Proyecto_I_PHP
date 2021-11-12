<?php declare(strict_types=1);

namespace Mohamed\ClassicModels;

class FactoryConnection{
    function __construct(private $config){}
    
    function get(): \PDO{
        return new \PDO("{$this->config->database->type}:host={$this->config->database->host};dbname={$this->config->database->dbname}",
        $this->config->database->user, $this->config->database->password);
    }
}

?>