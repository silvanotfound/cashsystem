<?php
  require_once "models/TypeModel.php";

  class TypeController{

    public function renderAction(){
      $o_product_type = new TypeModel();
      $list_product_types = $o_product_type->listProductType();

      $o_view = new ViewsRender('views/TypeProduct.php');
      $o_view->setParams($list_product_types);
      $o_view->showContents();
    }

    public function saveAction(){
      $o_product_type = new TypeModel();

      $o_product_type->setProductTypeCode((int)$_POST['type-code']);
      $o_product_type->setProductTypeDescription($_POST['type-description']);

      $list_product_types = $o_product_type->saveProductType();
    }

    public function validateAction(){
      header('Cache-Control: no-cache, must-revalidate');
      header('Content-Type: application/json; charset=utf-8');

      $o_model_type = new TypeModel();
      $o_model_type->validateCode((int)$_GET['type-code']);

      echo json_encode(array("occurrence" => $o_model_type->validateCode((int)$_GET['type-code'])));
    }
  }

?>
