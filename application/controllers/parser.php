<?php

class Parser_Controller extends Base_Controller
{
    public $layout = 'base.column2_left';
    
    public function action_index()
    {
        $this->layout->content = file_get_contents('http://www.avito.ru/moskva/kvartiry/1-k_kvartira_50_m_143397127');
    }
}