<?php
  require_once "models/CashSystemModel.php";

  class CashSystemController{

    public function renderAction(){
      $o_view = new ViewsRender('views/Cashsystem.php');
      $o_view->showContents();
    }
    public function findProductAction(){
      $o_model =  new CashSystemModel();
      $str_result = $o_model->findProduct($_GET['product-code']);
      echo $str_result;
    }

    public function processAction(){
      header('Cache-Control: no-cache, must-revalidate');
      header('Content-Type: application/json; charset=utf-8');

      $int_product_code = $_GET['product-code'];
      $int_product_count = $_GET['count-product'];

      $o_model = new CashSystemModel();
      $o_model->calculateValues($int_product_code, $int_product_count);

      echo json_encode(array("prodructDescription" => trim($o_model->getProductDescription()), "prodructValue" => $o_model->getProductValue(), "productTax" => $o_model->getProductTax()));
    }
  }

?>
