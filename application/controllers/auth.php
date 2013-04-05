<?php

class Auth_Controller extends Controller
{
    protected $_rules = array(
        'email'    => 'required|email|unique:users',
        'password' => 'required|max:16|min:6',
    );
    
    public function action_login()
    {
        $input = Input::all();
        
        $this->_rules['email'] = 'required|email';
        
        $validation = Validator::make($input, $this->_rules);

        $messages = array();
        
        if ($validation->fails())
        {
            $messages = $validation->errors->messages;
        }
        elseif (Auth::attempt(array('username' => $input['email'], 'password' => $input['password'])))
        {            
            return Redirect::to('user/profile');
        }
        
        
        return View::make('base.auth.login', array('messages' => $messages));
    }                                      
    
    
    
    public function action_registration()
    {
        $input = Input::all();
        
        $validation = Validator::make($input, $this->_rules);

        $messages = array();
        
        if ($validation->fails())
        {
            $messages = $validation->errors->messages;
        }
        else
        {            
            $user = new User;
            
            $user->email    = $input['email'];
            $user->password = Hash::make($input['password']);
            
            $user->save();
        }
        
        
        return View::make('base.auth.registration', array('messages' => $messages));
    }
}