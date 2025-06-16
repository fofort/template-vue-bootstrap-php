<?php

namespace app\controllers;

use flight\Engine;

class ApiUserController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function getUsers() {
		// You could actually pull data from the database if you had one set up
		$users = $this->app->db()->fetchAll("SELECT * FROM user");
		
		// You actually could overwrite the json() method if you just wanted to
		// to ->json($users); and it would auto set pretty print for you.
		// https://flightphp.com/learn#overriding
		$this->app->json($users, 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function getUser() {
		// You could actually pull data from the database if you had one set up
		$id = $this->app->request()->query['id'];
		//var_dump($this->app->request()->query);
		//echo $id;
		//$id = 3;

		$user = $this->app->db()->fetchRow("SELECT * FROM user WHERE id_user = ?", [ $id ]);
		
		$this->app->json($user, 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function updateUser($id) {
		$id = $this->app->request()->data['id'];
		// You could actually update data from the database if you had one set up
		// $statement = $this->app->db()->runQuery("UPDATE users SET email = ? WHERE id = ?", [ $this->app->data['email'], $id ]);
		$this->app->json([ 'success' => true, 'id' => $id ], 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}
}