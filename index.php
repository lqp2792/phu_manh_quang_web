<?php
    $pageURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    if(strcmp($pageURL, "localhost/web_programming/") == 0) {
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $url .= "/Homepage/";
        header("Location: $url");
    }
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, '/');
    $uri = ltrim($uri, '/');
    $data = explode("/", $uri);

   $controller = $data[1].'Controller';
   if(isset($data[2])) $action=$data[2];
   if(isset($data[3])) {
       $params = array();
       for($i=3; $i<count($data); $i++) {
           $params[] = $data[$i];
       }
   }
   include_once('controller/'.$controller.'.php');
   $c = new $controller();
   if(isset($action)) {
       $c->set_action($action);
   }
   if(!empty($params)) {
       $c->set_params($params);
   }
   $c->invoke();
?>
