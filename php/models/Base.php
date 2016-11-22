<?php
namespace models;

/**
 * Class Base
 * @package models
 * @author Erik August Johnson <erik@erikaugust.com>
 */

class Base {

    protected $db;
	protected $cache;

    public function __construct(string $database = 'default') {

		$this->database = new Database($database);
        $this->cache = new Cache();

	}
}
