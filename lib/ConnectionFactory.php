<?php

  class ConnectionFactory{
    protected $o_data_base;

    public function createNewConnetion(){

      $this->o_data_base = new DataBase();

      $host = $this->o_data_base->getHost();
      $port = $this->o_data_base->getPort();
      $baseConnection = $this->o_data_base->getBaseConnection();
      $user = $this->o_data_base->getUser();
      $password = $this->o_data_base->getPassword();

      $connectionString = "host=$host port=$port dbname=$baseConnection user=$user password=$password";
      return pg_connect($connectionString);
    }
 }

?>
