<?php
  require_once "models/ProductModel.php";

  class ProductController{

    public function renderAction(){
      $o_product = new ProductModel();
      $list_product = $o_product->listProduct();
      $list_product_type = $o_product->listProductType();

      $o_view = new ViewsRender('views/Product.php');
      $o_view->setParams($list_product);
      $o_view->setParamsType($list_product_type);
      $o_view->showContents();
    }

    public function saveAction(){
      $o_product = new ProductModel();
      $o_product->setProductCode($_POST['product-code']);
      $o_product->setProductDescription($_POST['product-description']);
      $o_product->setProductType($_POST['product-type']);
      $o_product->setProductValue($_POST['product-value']);
      $list_product = $o_product->saveProduct();
    }
  }

?>
