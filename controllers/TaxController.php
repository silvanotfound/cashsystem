<?php
  require_once "models/TaxModel.php";

  class TaxController{

    public function renderAction(){
      $o_product_tax = new TaxModel();
      $list_product_tax = $o_product_tax->listProductTax();
      $list_product_type_tax = $o_product_tax->listProductTaxType();

      $o_view = new ViewsRender('views/TaxProduct.php');
      $o_view->setParams($list_product_tax);
      $o_view->setParamsType($list_product_type_tax);
      $o_view->showContents();
    }

    public function saveAction(){
      $o_product_tax = new TaxModel();
      $o_product_tax->setProductTaxCode($_POST['tax-code']);
      $o_product_tax->setProductTaxType($_POST['tax-type']);
      $o_product_tax->setProductTaxValue($_POST['tax-value']);

      $list_product_tax = $o_product_tax->saveProductTax();
    }
  }

?>
