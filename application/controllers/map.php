<?php

class Map_Controller extends Base_Controller
{
    public function action_index()
    {
        $this->layout->content = View::make('base/map/content');
    }
}