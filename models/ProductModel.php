<?php

  class ProductModel{
    private $int_product_code;
    private $str_product_description;
    private $int_product_type;
    private $flt_product_value;

    public function getProductCode(){
      return $this->int_product_code;
    }
    public function setProductCode($int_product_code){
      $this->int_product_code = $int_product_code;
    }
    public function getProductDescription(){
      return $this->str_product_description;
    }
    public function setProductDescription($str_product_description){
      $this->str_product_description = $str_product_description;
    }
    public function getProductType(){
      return $this->int_product_type;
    }
    public function setProductType($int_product_type){
      $this->int_product_type = $int_product_type;
    }
    public function getProductValue(){
      return $this->flt_product_value;
    }
    public function setProductValue($flt_product_value){
      $this->flt_product_value = $flt_product_value;
    }

    private function newConnection(){
      $connection = new ConnectionFactory();
      return $dbConect = $connection->createNewConnetion();
    }

    public function listProduct(){
      $query = "SELECT PRODUCT.PRODUCT_CODE,PRODUCT.PRODUCT_DESCRIPTION,TYPE.PRODUCT_TYPE_DESCRIPTION,PRODUCT.PRODUCT_VALUE FROM PRODUCT,PRODUCT_TYPE AS TYPE WHERE PRODUCT.PRODUCT_TYPE = TYPE.PRODUCT_TYPE_CODE";
      $result = pg_query($this->newConnection(), $query);
      return $result;
    }

    public function listProductType(){
      $query = "SELECT TYPE.PRODUCT_TYPE_CODE, TYPE.PRODUCT_TYPE_DESCRIPTION FROM PRODUCT_TYPE AS TYPE";
      $result = pg_query($this->newConnection(), $query);
      return $result;
    }

    public function saveProduct(){
      $dbConect = $this->newConnection();

      $query = "INSERT INTO PRODUCT(PRODUCT_CODE, PRODUCT_DESCRIPTION, PRODUCT_TYPE, PRODUCT_VALUE) VALUES($1,$2,$3,$4)";
      $result = pg_prepare($dbConect, "save_product", $query);
      $result = pg_execute($dbConect, "save_product", array($this->getProductCode(), $this->getProductDescription(), $this->getProductType(),(float)$this->getProductValue()));
    }
  }

?>
