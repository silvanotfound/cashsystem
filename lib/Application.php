<?php

  spl_autoload_register(function ($class_name) {
    $rootPath = $_SERVER['DOCUMENT_ROOT'].'/cashsystem/lib/';

    if (file_exists($rootPath.$class_name . '.php')) {
        require_once $rootPath. $class_name . '.php';
    }
    else {
      throw new Exception("classe ".$class_name." não encontrada");
    }
  });

  class Application {
    protected $controller;
    protected $action;

    private function loadRouter(){
      $this->controller = isset($_REQUEST['controller']) ?  $_REQUEST['controller'] : 'CashSystem';
      $this->action = isset($_REQUEST['action']) ?  $_REQUEST['action'] : 'render';
    }

    public function dispath(){
      $this->loadRouter();

      $controller_file = 'controllers/'.$this->controller.'Controller.php';

      if (file_exists($controller_file)) {
        require_once $controller_file;

        $class = $this->controller.'Controller';
        $function = $this->action."Action";

        $o_class = new $class();
        $o_class->$function();
      }
      else {
        throw new Exception('Arquivo '. $controller_file.' não encontrado.');
      }
    }
  }

?>
