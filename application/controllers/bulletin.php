<?php

class Bulletin_Controller extends Base_Controller {
    
    public $title = 'Проекты';
    
    public $layout = 'base.column_7x5';
    
    public function before()
    {
        parent::before();
        
        $this->layout->side_content = View::make('base.bulletin.side_content');
    }

    public function action_index()
    {
        $items = Advert::where('status', '=', 3)->take(20)->get();
        
        $this->layout->content = View::make('base.bulletin.content', array('items' => $items));
        
    }
    
    

}