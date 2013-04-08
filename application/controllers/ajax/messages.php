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
    
    
    public function action_send()
    {
        if (!$this->USER) {
            return;
        }
        
        $input = Input::get();
        
        $rules = array(
            'title' => 'required',
            'text'  => 'required',
        );
        
        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            $this->success = false;
            $this->errors  = $validation->errors->messages;
        }
        else {
            $message = new UserMessage;
            
            $message->title = $input['title'];
            $message->text  = $input['text'];
            
            $message->save();
            
            $this->success = true;
            $this->msg     = 'send_ok';
        }
    }
}