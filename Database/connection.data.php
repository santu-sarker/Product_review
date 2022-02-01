<?php

class Connection
{

    private $server_name = "localhost";
    private $user_name = "root";
    private $password = "";
    private $db_name = "product_review";

    protected function connect()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $connection = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
        $connection->set_charset("utf8mb4");
        return $connection;
    }

}
