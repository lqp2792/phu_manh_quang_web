<?php
    /*== File .htaccess kich hoat mod_rewrite uri cua apache ==*/
    /*== Tach URI thanh cac khoi: controller, action, param ==*/
    include('model/DatabaseModel.php');
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, '/');
    $uri = ltrim($uri, '/');
    $data = explode("/", $uri);
   if(count($data) == 1) {
       $controller = "Controller";
   } else {
       $controller = $data[1].'Controller';
       if(isset($data[2])) $action=$data[2];
   }
   include_once('controller/'.$controller.'.php');
   $c = new $controller();
   /*== Neu co action, param thi goi ham set ==*/
   if(isset($action)) {
       $c->set_action($action);
   }
   /*== Khoi dong controller  ==*/
   $c->invoke();
?>
