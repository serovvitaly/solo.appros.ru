<?php

abstract class Ajax_Controller extends Controller
{    
    protected $_output  = array();
    
    protected $USER = NULL; 
    
    
    public function before()
    {
        $this->USER = Auth::user();
    }

    
    public function __set($name, $value)
    {
        $this->_output[$name] = $value;
    }
    
    
    public function after($response)
    {
        if (!$this->USER) {
            
            echo Response::json( array(
                'success' => false,
                'error' => 'Access denied'
            ) );
            
            return;
        }
        
        echo Response::json( $this->_output );
    }
    
}