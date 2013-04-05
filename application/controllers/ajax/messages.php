<?php

class Ajax_Messages_Controller extends Ajax_Controller
{
    public function action_list()
    {
        $messages = array();
        
        if ($this->USER) {
            
            $user_messages = $this->USER->messages;
            
            if (count($user_messages)) {
                foreach ($user_messages AS $message) {
                    $messages[] = $message->to_array();
                }
            }
            
        }
        
        $this->rows = $messages;
        
        $this->success = true;
    }
}