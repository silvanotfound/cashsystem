<?php

  class ViewsRender{

    private $_view;
    private $_contents;
    private $_params;
    private $_params_type;

    function __construct($view = null, $params=null, $params_type=null){
      $this->setView($view);
      $this->_params = $params;
      $this->_params_type - $params_type;
    }

    public function getParams(){
      return $this->_params;
    }
    public function setParams($params){
      $this->_params = $params;
    }
    public function getParamsType(){
      return $this->_params_type;
    }
    public function setParamsType($params_type){
      $this->_params_type = $params_type;
    }
    public function getView(){
      return $this->_view;
    }

    public function setView($view){
      if (file_exists($view)) {
        $this->_view = $view;
      }
      else {
        throw new Exception("View ".$view." não encontrada.");
      }
    }

    public function getContents(){
      ob_start();
      require_once $this->_view;
      $this->_contents = ob_get_contents();
      ob_end_clean();
      return $this->_contents;
    }

    public function showContents(){
      echo $this->getContents();
      exit;
    }
  }

?>
