<?php

class Err extends Controller {
	
	function index()
	{
		$this->error404();
	}
	
	function error404()
	{
		global $config;
		$template = $this->loadView('404');
        $template->set('baseUrl',$config['base_url']);
        $template->render();
	}
    
}

?>
