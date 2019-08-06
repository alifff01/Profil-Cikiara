<?php 
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// ------------------------------------------------------------------------------------------------------------------------------

namespace app\Core;

// -----------------------------------------------------------------------------------------------------------------------------=
class Route
{
	private $session 		= sessionstatus;
	protected $controller 	= 'HomeController';
	protected $method 		= 'index';
	protected $params 		= [];
	function __construct()
	{
		if ($this->session == TRUE) {
			session_start();
		}

		$url 	= $this->parseURL();
		
		// controller
		if (file_exists('../app/Controllers/' . $url[0] . 'Controller.php')) {
			$this->controller = $url[0].'Controller';	
			unset($url[0]);
		}

		require_once '../app/Controllers/'. $this->controller.'.php';

		$this->controller 	= 'app\Controllers\\' . $this->controller;
		$this->controller 	= new $this->controller;

		// method 
		if ( isset($url[1]) ) {
			if ( method_exists($this->controller, $url[1]) ) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// param
		if (!empty($url)) {
			$this->params = array_values($url);
		}

		// execute controller, method and params
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if ( isset($_GET['url']) ) {
			$url 	= rtrim($_GET['url'],'/');
			$url 	= filter_var(trim($url), FILTER_SANITIZE_URL);
			$url 	= explode('/', $url);
			return $url;
		}
	}
}