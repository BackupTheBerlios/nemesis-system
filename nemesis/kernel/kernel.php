<?php
/**
 * Licence?
 */
 
/**
 * Main class
 * Here starts (and ends ;) everything
 */
class Kernel {
    var $router;
    var $sAction;
    var $errors = array();
    
    /**
     * Constructor
     * Here starts
     */
    function Kernel() {
        if($this->setup() && $this->checkAccess()) {
            $this->run();
        } else {
            ErrorProcessor::generateError($this->errors);
        }
    }
    
    /**
     * Setups basic components
     * @return boolean
     */
    function setup() {
        $this->ini = ParserINI::getConfig('site');
        $this->router = Router::getInstance();
        $this->sAction = $this->router->getData();
        $this->user = User::loadFromSession();
        return true;
    }
    
    /**
     * Checks permission to perform action
     * @return boolean
     */
    function checkAccess() {
        if(AuthManager::checkAccess($this->user, $this->sAction)) {
            return true;
        } else {
            $this->errors[] = 'Access Denied ;)';
            return false;
        }
    }
    
    /**
     * Runs action
     * @return boolean
     */
    function run() {
        if(file_exists('actions/' . $this->sAction['action'] . '.php')) {
            require_once('actions/' . $this->sAction['action'] . '.php');
        } else {
            ErrorProcessor::generateError('Action Not Found ;]');
            return false;
        }
        $name = explode('/', $this->sAction['action']);
        $action = new $name[1];
        return ViewManager::makeView($action->perform(), $this->sAction);
    }
    
    
}

function dump($stack) {
    print '<pre>';
    var_dump($stack);
    print '</pre>';
}
?>
