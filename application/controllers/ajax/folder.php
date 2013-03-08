<?php


class Ajax_Folder_Controller extends Ajax_Controller
{
    public function action_index()
    {
        //
    }
        
    
    public function action_save()
    {
        $input = Input::all();
        
        $rules = array(
            'folder_name'  => 'required|max:120',
            'folder_note'  => 'required|max:120',
        );
        
        $validation = Validator::make($input, $rules);
        
        if ($validation->fails())
        {
            $this->errors['form'] = $validation->errors->messages;
            return;
        }
        
        //
        
    }
}