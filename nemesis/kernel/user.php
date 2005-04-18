<?php
/**
 * Licence?
 */
/**
 * User class
 * Creates, modifies user ;]
 */
class User {
    /**
     * Constructor
     */
    function User() {
    }
    
    /**
     * Returns User object from session
     * @return User
     * @static
     */
    function loadFromSession() {
        // TODO do sth normal ;)
        return new User();
    }
}
?>
