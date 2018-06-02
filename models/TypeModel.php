<?php

  class TypeModel{
    private $int_product_type_code;
    private $str_product_type_description;

    public function getProductTypeCode(){
      return $this->int_product_type_code;
    }
    public function setProductTypeCode($int_product_type_code){
      $this->int_product_type_code = $int_product_type_code;
    }
    public function getProductTypeDescription(){
      return $this->str_product_type_description;
    }
    public function setProductTypeDescription($str_product_type_description){
      $this->str_product_type_description = $str_product_type_description;
    }

    private function newConnection(){
      $connection = new ConnectionFactory();
      return $dbConect = $connection->createNewConnetion();
    }

    public function listProductType(){
      $query = "SELECT TYPE.PRODUCT_TYPE_CODE, TYPE.PRODUCT_TYPE_DESCRIPTION FROM PRODUCT_TYPE AS TYPE";
      $result = pg_query($this->newConnection(), $query);

      return $result;
    }

    public function saveProductType(){
      $dbConect = $this->newConnection();
      $query = "INSERT INTO PRODUCT_TYPE VALUES($1, $2)";
      $result = pg_prepare($dbConect, "save_types", $query);
      $result = pg_execute($dbConect, "save_types", array($this->getProductTypeCode(), $this->getProductTypeDescription()));
    }

    public function validateCode($int_code){
      $dbConect = $this->newConnection();
      $query = "SELECT COUNT(1) AS OCCURRENCE FROM PRODUCT_TYPE WHERE PRODUCT_TYPE_CODE = ".$int_code;
      $result = pg_query($dbConect, $query);

      while ($type_occurrence = pg_fetch_array($result)) {
        return (int)$type_occurrence['occurrence'];
      }
    }
  }

?>
