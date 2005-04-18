<?php
/**
 * Licence?
 */
/**
 * Ini parser
 */
class ParserINI {
    /**
     * @var array with params
     */
    var $config;

    /**
     * @param $name config name
     * @return ParserINI
     * @static
     */
    function getConfig($name) {
        static $configs = array();
        if(!array_key_exists($name, $configs)) {
            $configs[$name] = new ParserINI($name);
        }
        return $configs[$name];
    }

    /**
     * Constructor
     * @param $name config name
     */
    function ParserINI($name) {
        return $this->parse($name);
    }

    /**
     * Parses ini file
     * @param config name
     */
    function parse($name) {
        $this->config = parse_ini_file('settings/' . $name . '.ini.php', true);
        return $this->config;
    }

    /**
     * @return variable|false
     */
    function getVariable($section, $name) {
        if(isset($this->config[$section][$name])) {
            return $this->config[$section][$name];
        } else {
            return false;
        }
    }
    /**
     * @return array section
     */
    function getSection($section) {
        return $this->config[$section];
    }
}
?>
