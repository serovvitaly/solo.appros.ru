<?php

class Base_Controller extends Controller {

    public $layout = 'base.column1';
    
	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}
    
    public function after($response)
    {        
        $this->layout->curctr = Request::route()->controller;
        
        parent::after($response);
    }
    
    public function layout()
    {
        if (starts_with($this->layout, 'name: '))
        {
            return View::of(substr($this->layout, 6));
        }

        return View::make($this->layout);
    }

}