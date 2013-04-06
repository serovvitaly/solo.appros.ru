<?php

class Auth_Controller extends Controller
{
    protected $_is_post = false;
    
    protected $_output  = array();
    
    protected $_rules = array(
        'email'    => 'required|email',
        'password' => 'required|max:16|min:6',
    );
    
    
    public function before()
    {
        if (Request::method() == 'POST') {
            $this->_is_post = true;
        }
    }
    
    
    public function after($response)
    {
        if ($this->_is_post === true) {
            echo Response::json( $this->_output );
            return;
        }
    }
    
    
    public function action_login()
    {
        $input = Input::all();
        
        $validation = Validator::make($input, $this->_rules);

        $messages = array();
        
        if ($validation->fails())
        {
            $this->_output['success'] = false;
            $this->_output['errors']  = $validation->errors->messages;
        }
        elseif (Auth::attempt(array('username' => $input['email'], 'password' => $input['password'])))
        {            
            $this->_output['success'] = true;
            $this->_output['msg']     = 'login_ok';
        } else {
            $this->_output['success'] = true;
            $this->_output['errors']  = array('all' => 'Неверный логин или пароль.');
        }
        
        
        //return View::make('base.auth.login', array('messages' => $messages));
    }                                      
    
    
    
    public function action_registration()
    {
        $input = Input::all();
        
        $this->_rules['email'] .= '|unique:users';
        
        $validation = Validator::make($input, $this->_rules);

        $messages = array();
        
        if ($validation->fails())
        {
            $this->_output['success'] = false;
            $this->_output['errors']  = $validation->errors->messages;
        }
        else
        {            
            $user = new User;
            
            $user->email    = $input['email'];
            $user->password = Hash::make($input['password']);
            
            $user->save();
            
            $this->_output['success'] = true;
            $this->_output['result']  = 'registration_ok';
        }
        
        
        //return View::make('base.auth.registration', array('messages' => $messages));
    }
    
    
    public function action_logout()
    {
        Auth::logout();
    }
}