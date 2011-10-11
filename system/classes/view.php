<?php defined('SYSTEM_PATH') or exit('No direct script access allowed');

class View {
	
	protected $twig;
	
	protected $path = '';
	
	protected $globals = array();
	
	protected $data = array();
  
   	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem( array( SITE_PATH, PT_COMPONENTS_PATH ) );
		$this->twig = new Twig_Environment($loader, array(
           	'debug'       	=> Config::get('debug'),
           	'auto_reload' 	=> Config::get('auto_reload'),
           	'charset'     	=> Config::get('charset'),
			'cache'			=> TEMPLATE_CACHE,
		));
	}
	
	public function set_path( $path )
	{
		$this->path = $path;
	}
	
	public function add_global( $name, $global )
	{
		$this->twig->addGlobal( $name, $global );
	}
	
	public function add_data( $name, $data )
	{
		$this->data[$key] = $data;
	}
    
	public function render()
	{		
		$template = $this->twig->loadTemplate($this->path);
		return $template->render( $this->data );
	}

}

/* End of file classes/view.php */