<?php

class Stats_Controller extends Base_Controller
{
    public $layout = 'base.column1';
    
    public function action_index()
    {
        $this->layout->content = View::make('base.bulletin.grid');
    }
    
}