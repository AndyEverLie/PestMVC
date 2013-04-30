<?php
namespace PestMVC;

class Helper {
	public static function route_param($controller, $action) {
		return array (
				'controller' => $controller,
				'action' => $action 
		);
	}
}
