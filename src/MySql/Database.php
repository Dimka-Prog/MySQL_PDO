<?php

namespace MySql;

use PDO;

class Database
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        $dsn = 'mysql:host=localhost;dbname=PDO_MySql';
        $this->link = new PDO($dsn, 'admin', 'password');
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql): array
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false)
            return [];

        return  $result;
    }
}


