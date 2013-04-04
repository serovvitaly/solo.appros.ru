<?php

abstract class Ajax_Controller extends Controller
{    
    protected $_output  = array(); 
    

    
    public function __set($name, $value)
    {
        $this->_output[$name] = $value;
    }
    
    
    public function after($response)
    {
        echo Response::json( $this->_output );
    }
    
}