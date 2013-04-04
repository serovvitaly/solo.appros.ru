<?php


class Ajax_Announcements_Controller extends Ajax_Controller
{
    public function action_list()
    {
        $limit = 100;
        
        $page  = Input::get('page', 1);
        $start = Input::get('start', 0);
        $limit = Input::get('limit', 25);
        
        $filter = Input::get('filter', NULL);
        
        $totla = Advert::count();
        
        $data  = Advert::take($limit)->skip($start)->order_by('time_added', 'desc')->get();
        
        $rows = array();
        if (count($data) > 0) {
            foreach ($data AS $row) {
                $rows[] = array(
                    'id'    => $row->uid,
                    'title' => $row->atitle,
                    'date'  => $row->time_added,
                    'price' => $row->price,
                    'link'  => 'http://avito.ru' . $row->ahref,
                    'description'  => $row->description,
                );
            }
        }
        
        $this->rows = $rows;
        
        $this->success = true;
        $this->total   = $totla;
        
    }
    
}
