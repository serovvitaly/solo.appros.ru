<?php

class Projects_Controller extends Base_Controller {
    
    public $title = 'Проекты';
    
    public $layout = 'base.column1';

    public function action_index()
    {
        
        $this->layout->content = 'gogo';
        
    }
    
    

}