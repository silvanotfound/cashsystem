<?php

  class CashSystemModel{
    private $flt_product_type;
    private $flt_product_description;
    private $flt_product_value;
    private $flt_product_tax;

    public function getProductType(){
      return $this->flt_product_type;
    }
    public function setProductType($flt_product_type){
      $this->flt_product_type = $flt_product_type;
    }
    public function getProductDescription(){
      return $this->flt_product_description;
    }
    public function setProductDescription($flt_product_description){
      $this->flt_product_description = $flt_product_description;
    }
    public function getProductValue(){
      return $this->flt_product_value;
    }
    public function setProductValue($flt_product_value){
      $this->flt_product_value = $flt_product_value;
    }
    public function getProductTax(){
      return $this->flt_product_tax;
    }
    public function setProductTax($flt_product_tax){
      $this->flt_product_tax = $flt_product_tax;
    }

    private function newConnection(){
      $connection = new ConnectionFactory();
      return $dbConect = $connection->createNewConnetion();
    }

    public function findProduct($int_product_code){
      $query = "SELECT PRODUCT_DESCRIPTION FROM PRODUCT WHERE PRODUCT_CODE = ".$int_product_code;
      $connection = $this->newConnection();
      $product_result = pg_query($connection, $query);
      pg_close($connection);

      while ($product = pg_fetch_array($product_result)) {
        return $product['product_description'];
      }
    }

    private function queySelectProduct($int_product_code){

      $query = "SELECT PRODUCT.PRODUCT_DESCRIPTION, PRODUCT.PRODUCT_VALUE, TAX.PRODUCT_TAX_VALUE";
      $query = $query." FROM PRODUCT, PRODUCT_TAX AS TAX";
      $query = $query." WHERE PRODUCT.PRODUCT_TYPE = TAX.PRODUCT_TAX_TYPE";
      $query = $query." AND PRODUCT.PRODUCT_CODE = ".$int_product_code;

      $connection = $this->newConnection();
      $product_result = pg_query($connection, $query);
      pg_close($connection);

      return $product_result;
    }

    public function calculateValues($int_product_code, $int_product_count){
      $product_result = $this->queySelectProduct($int_product_code);

      while ($product = pg_fetch_array($product_result)) {
        $this->setProductValue($product['product_value'] * $int_product_count);
        $this->setProductDescription($product['product_description']);
        $this->setProductTax((($this->getProductValue() * $product['product_tax_value'])));
      }
    }
  }

?>
