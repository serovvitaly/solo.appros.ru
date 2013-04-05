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
        
        $totla = Advert::where('status', '=', 3)->count();
        
        $data  = Advert::where('status', '=', 3)->take($limit)->skip($start)->order_by('time_added', 'desc')->get();
        
        $rows = array();
        if (count($data) > 0) {
            foreach ($data AS $row) {
                $rows[] = array(
                    'id'      => $row->uid,
                    'title'   => $row->atitle,
                    'date'    => $row->time_added,
                    'price'   => $row->price,
                    'link'    => 'http://avito.ru' . $row->ahref,
                    'description'  => $row->description,
                    'type'    => $row->type,
                    'metro'   => $row->metro,
                    'address' => $row->address,
                    'imgs'    => json_decode($row->imgs),
                    'map'     => array(
                        'zoom'      => $row->mapzoom,
                        'latitude'  => $row->maplatitude,
                        'longitude' => $row->maplongitude,
                    )
                );
            }
        }
        
        $this->rows = $rows;
        
        $this->success = true;
        $this->total   = $totla;
        
    }
    
    
    public function action_filters()
    {   
        return;
        $data  = UsetFilter::where('user_id', '=', 2)->order_by('name', 'asc')->get();
        
        $items = array();
        if (count($data) > 0) {
            foreach ($data AS $item) {
                $items[] = array(
                    'id'   => $item->id,
                    'text' => $item->name,
                    'name' => $item->name,
                    'leaf' => true
                );
            }
        }
        
        $this->items = $items;
        
        $this->success = true;
        
    }
    
}
