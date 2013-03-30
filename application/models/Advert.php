<?php

class Advert extends Eloquent
{
    public static $table = 'spider_avito_store1';
    
    public function metro()
    {
        return $this->metro;
    }
    
    public function price()
    {
        return $this->metro;
    }
}