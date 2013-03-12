<?php

class ParserProxy extends Eloquent
{
    public static $table = 'parser_proxy';
    
    
    /**
    * Возвращает список рабочих прокси
    * 
    * @param mixed $count
    */
    public static function get_proxy_list($count = 20)
    {
        $list = self::where('status', '=', 200)->take($count)->get();
        
        $out = array();
        
        if ($list) {
            foreach ($list AS $proxy) {
                $out[$proxy->id] = trim($proxy->proxy);
            }
        }
        
        return $out;
    }
}