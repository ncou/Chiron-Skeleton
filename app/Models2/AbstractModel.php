<?php

class AbstractModel {

	protected $db;

	public function __construct($app)
	{
        $this->db = $app->getContainer()->get('database');//Database::instance()->db;
	}

	public function __destruct() {
        $this->db = null;
    }
    
}
