<?php
namespace PestMVC;

class Controller {
	private $response;
	
	// public function __construct($request, $response) {
	public function __construct() {
		// $this->response = $response;
	}
	
	public function render($name, $param) {
		extract ( $param );
		
		require_once VIEW_BASE_PATH . 'admin/header.html';
		require_once VIEW_BASE_PATH . 'admin/body.html';
		require_once VIEW_BASE_PATH . 'admin/' . $name . '_body.php';
		require_once VIEW_BASE_PATH . 'admin/footer.html';
	}
	
	public static function redirect($url) {
		header ( "Location: " . $url );
	}
	
	// function index() {
	// }
	// function add() {
	// }
	// function get() {
	// }
	// function create() {
	// }
	// function edit() {
	// }
	// function update() {
	// }
	// function delete() {
	// }
}