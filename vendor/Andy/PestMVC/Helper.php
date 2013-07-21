<?php
namespace PestMVC;

class Helper {
	public static function route_param($controller, $action, $prefix = '') {
		return array (
				'controller' => $controller,
				'action' => $action,
				'prefix' => $prefix
		);
	}

	public static function get_route_key($route) {
		if('' == $route->prefix ){
			return $route->rule;
		}else {
			return '/' . $route->prefix . $route->rule;
		}
	}
}
