<?php

class Parser_Controller extends Controller
{
    public function action_index()
    {
        
        $parser = new Parser\Parser;
        
        $parser->parse();
        
    }
}