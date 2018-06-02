<?php

  class TaxModel{
    private $int_product_tax_code;
    private $int_product_tax_type;
    private $flt_product_tax_value;

    public function getProductTaxCode(){
      return $this->int_product_tax_code;
    }
    public function setProductTaxCode($int_product_tax_code){
      $this->int_product_tax_code = $int_product_tax_code;
    }
    public function getProductTaxType(){
      return $this->int_product_tax_type;
    }
    public function setProductTaxType($int_product_tax_type){
      $this->int_product_tax_type = $int_product_tax_type;
    }
    public function getProductTaxValue(){
      return $this->flt_product_tax_value;
    }
    public function setProductTaxValue($flt_product_tax_value){
      $this->flt_product_tax_value = $flt_product_tax_value;
    }

    private function newConnection(){
      $connection = new ConnectionFactory();
      return $dbConect = $connection->createNewConnetion();
    }

    public function listProductTax(){
      $query = "SELECT TAX.PRODUCT_TAX_CODE,TYPE.PRODUCT_TYPE_DESCRIPTION,TAX.PRODUCT_TAX_VALUE FROM PRODUCT_TAX AS TAX, PRODUCT_TYPE AS TYPE WHERE TAX.PRODUCT_TAX_TYPE = TYPE.PRODUCT_TYPE_CODE";
      $result = pg_query($this->newConnection(), $query);
      return $result;
    }

    public function listProductTaxType(){
      $query = "SELECT TYPE.PRODUCT_TYPE_CODE, TYPE.PRODUCT_TYPE_DESCRIPTION FROM PRODUCT_TYPE AS TYPE";
      $result = pg_query($this->newConnection(), $query);
      return $result;
    }

    public function saveProductTax(){
      $dbConect = $this->newConnection();

      $tax_convert = number_format((float)($this->getProductTaxValue() / 100), 2, '.', ',');

      $query = "INSERT INTO PRODUCT_TAX(PRODUCT_TAX_CODE, PRODUCT_TAX_TYPE, PRODUCT_TAX_VALUE) VALUES($1, $2, $3)";
      $result = pg_prepare($dbConect, "save_Taxs", $query);
      $result = pg_execute($dbConect, "save_Taxs", array($this->getProductTaxCode(), $this->getProductTaxType(), (float)$tax_convert));
    }
  }

?>
