<?php


class Ajax_Bulletin_Controller extends Ajax_Controller
{
    public function action_get()
    {
        $this->result = 200;
    }
        
    
    public function action_save()
    {
        $input = Input::all();
        
        $rules = array(
            'folder_id'   => 'numeric',
            'folder_name' => 'required|max:120',
        );
        
        $validation = Validator::make($input, $rules);
        
        if ($validation->fails())
        {
            $this->errors['form'] = $validation->errors->messages;
            return;
        }
        
        
        if ($input['folder_id'] > 0) {
            $project = Project::find($input['folder_id']);
        } else {
            $project = new Project;
        }
        
        $project->name    = $input['folder_name'];
        $project->user_id = 1;
        
        $this->result = $project->save();
        
    }
}