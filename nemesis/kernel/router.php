<?php
class Router {
    function getInstance() {
        static $instance;
        if($instance == null) {
            $instance = new Router();
        }
        return $instance;
    }
    
    function Router() {
    }
    
    function getData() {
        return array('action' => 'content/view', 'params' => '');
    }
}
?>
