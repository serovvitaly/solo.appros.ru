<?php

class Projects_Controller extends Base_Controller {
    
    public $title = 'Проекты';
    
    public $layout = 'base.column2_left';
    
    public function before()
    {
        parent::before();
        
        $this->layout->side_content = View::make('base.projects.side_content');
    }

    public function action_index()
    {
        
        $this->layout->content = View::make('base.projects.content');
        
    }
    
    

}