<?php

abstract class Ajax_Controller extends Controller
{
    protected $success = true;
    
    protected $result  = NULL;
    
    protected $errors  = array();
    
    protected function _set_error()
    {
        //
    }
    
    protected function _output()
    {
        $output = array(
            'success' => $this->success,
            'result'  => $this->result,
            'errors'  => $this->errors
        );
        
        return $output;
    }
    
    public function after($response)
    {
        echo Response::json( $this->_output() );
    }
    
}