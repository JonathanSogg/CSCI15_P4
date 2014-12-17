<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
    
    public function __construct()
    {
        $class = get_called_class();
        switch($class) {
            case 'HomeController':
                $this->beforeFilter('nonauth');
                break;
             
            case 'UserController':
                $this->beforeFilter('nonauth', ['only' => ['authenticate']]);
                $this->beforeFilter('auth', ['only' => ['logout']]);
                break;
                 
            default:
                $this->beforeFilter('auth');
                break;
        }
    }
}
