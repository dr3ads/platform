<?php namespace Platform\Http\Controllers;

use Theme;
use Platform\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $theme = null;
    public $layout = 'default';
    public $theme_name = 'platform';
    public $data = array();

    protected function setupLayout()
    {
        $this->theme = Theme::uses($this->theme_name)->layout($this->layout);
    }

    public function callAction($method, $parameters)
    {
        $this->setupLayout();
        return call_user_func_array(array($this, $method), $parameters);

    }
}