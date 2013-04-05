<?php

class User extends Eloquent
{    
    public static $connection = 'mysql';
    
    public function messages()
    {
        return $this->has_many('UserMessage');
    }
}