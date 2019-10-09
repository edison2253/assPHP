<?php
namespace controller\reptile;
use \system\core\controller;
use \GuzzleHttp\Client;

class zhihu extends controller{
	public function index() {

		$client = new \GuzzleHttp\Client(['verify' => false]);
		$response = $client->get('http://www.zhihu.com/');
		$response = $response->getBody();
		var_dump((string)$response);
	}
}