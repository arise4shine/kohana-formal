<?php defined('SYSPATH') or die('No direct script access.');

class Formal_Field {
    private $_validation;
    private $_name;
    
    function __construct(Kohana_Validation &$validation_object, $name, Array $configuration) {
        $this->_validation = $validation_object;
        
        $this->name($name);
        $this->parse_configuration($configuration);
    }
    
    private function parse_configuration($configuration) {
        if(!is_array($configuration) || empty($configuration)) {
            throw new Kohana_Exception('Configuration not found');
        }
        
        foreach($configuration['rules'] as $callback => $parameters) {
            if(is_numeric($callback)) { // singular rule, without parameters        
                $callback = $parameters;
                $parameters = null;
            }
            $this->rule($callback, $parameters);
        }
    }
    
    public function name($name = null) {
        if(is_null($name)) return $this->_name;
        return $this->_name = $name;
    }
    
    public function rule($callback, $parameters) {
        return $this->_validation->rule($this->name(), $callback, $parameters);
    }
}