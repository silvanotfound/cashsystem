<?php

class DataBase{
    private $host = "localhost";
    private $port = "5432";
    private $baseConnection = "cashsystem";
    private $user = "postgres";
    private $password = "root";

    public function getHost(){
        return $this->host;
    }

    public function getPort(){
        return $this->port;
    }

    public function getBaseConnection(){
        return $this->baseConnection;
    }

    public function getUser(){
        return $this->user;
    }

    public function getPassword(){
        return $this->password;
    }
}
