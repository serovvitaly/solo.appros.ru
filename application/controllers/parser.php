<?php

class Parser_Controller extends Controller
{
    public function action_index()
    {
        # Setting time and memory limits
        ini_set('max_execution_time',0);
        ini_set('memory_limit', '128M');
        
        $parser = new Parser\Parser;
        
        $parser->parse();
        
    }
    
    public function action_proxy()
    {
        $parser = new Parser\Parser;
        
        $parser->check_proxy_list();
    }
}