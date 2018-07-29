<?php

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        global $config;
        $template = $this->loadView('index');
        $template->set('baseUrl', $config['base_url']);
        $template->render();
    }

    public function load_item($item = 0)
    {
        $template = $this->loadView('item3/panel_' . $item);
        $template->render();
    }

    public function load_item_2($item = 0)
    {
        $template = $this->loadView('item1/panel_' . $item);
        $template->render();
    }

    public function load_form_login()
    {
        $template = $this->loadView('item3/login_form');
        $template->render();
    }

    public function load_form_register()
    {
        $template = $this->loadView('item3/register_form');
        $template->render();
    }

    public function load_panel_3($item=1){
        $template=$this->loadView('item1/panel_profile_'.$item);
        $template->render();
    }


}

?>
